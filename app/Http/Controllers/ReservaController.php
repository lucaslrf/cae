<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Bloco;
use App\Coordenador;
use App\Local;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    public function index()
    {
        
        $listar_reserva_permissao = Permission::where('slug','listar-reservas')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($listar_reserva_permissao) ){
            if(auth()->user()->servidor){
                $id_coordenador = null;
                $user = auth()->user();
                $coordenador = $user->servidor->coordenador;
                if($coordenador){
                    $id_coordenador = $coordenador->id;
                }
                $id_servidor = $user->servidor->id;
                $reservas = Reserva::where('servidorId',$id_servidor)
                        ->when($id_coordenador, function ($query) use ($id_coordenador) {
                            return $query->orWhere('coordenadorId',$id_coordenador);
                        })->get();

                return view('reservas.reserva-listar', compact('reservas','user'));
            }else{
                return redirect()->route('home')->with('toast_error', 'Seu usuário não possui servidor vinculado! Entre em contato com o admin.');
            }
        }else{
            return redirect()->route('login');
        } 
    }

    public function create()
    {        
        $cadastrar_reserva_permissao = Permission::where('slug','cadastrar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($cadastrar_reserva_permissao)){
            $coordenadores = Coordenador::all();
            $locais = Local::where('status','DISPONIVEL')->where('coordenadorId', $coordenadores[0]->id)->get();
            return view('reservas.reserva-cadastrar', compact('locais','coordenadores'));
        }else{
            return redirect()->route('login');
        } 
    }

    public function store(Request $request)
    {
        Log::info('request', [$request->request]);
        $cadastrar_reserva_permissao = Permission::where('slug','cadastrar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($cadastrar_reserva_permissao)){       
            $data_processamento = date('Y-m-d H:i:s');
            $user = auth()->user();
            $request->request->add(['servidorId' => $user->servidor->id]);
            $request->request->add(['status' => 'SOLICITADO']);

            Log::info('request', [$request]);
            
            Reserva::create($request->all());
            return redirect()->route('reservas.index');
        }else{
            return redirect()->route('login');
        } 
    }

    public function edit(Reserva $reserva)
    {
        $editar_reserva_permissao = Permission::where('slug','editar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($editar_reserva_permissao)){ 
            $coordenadores = Coordenador::all();
            $locais = Local::where('coordenadorId', $reserva->coordenadorId)->get();
            return view('reservas.reserva-editar', compact('coordenadores', 'locais','reserva'));
        }else{
            return redirect()->route('login');
        }        
    }

    public function update(Request $request, Reserva $reserva)
    {
        $editar_reserva_permissao = Permission::where('slug','editar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($editar_reserva_permissao)){ 
           $reserva->update($request->all());
            return redirect()->route('reservas.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function destroy(Reserva $reserva)
    {
        $editar_reserva_permissao = Permission::where('slug','editar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($editar_reserva_permissao)){ 
            $reserva->delete();
            return redirect()->route('reservas.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function aprovar(Reserva $reserva){    
        $autorizar_reserva_permissao = Permission::where('slug','autorizar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($autorizar_reserva_permissao)){     
            $reserva->update(['status' => 'RESERVADO']);
            return redirect()->route('reservas.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function reprovar(Reserva $reserva){       
        $autorizar_reserva_permissao = Permission::where('slug','autorizar-reserva')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($autorizar_reserva_permissao)){      
            $reserva->update(['status' => 'CANCELADO']);
            return redirect()->route('reservas.index');
        }else{
            return redirect()->route('login');
        }
    }

    
    public function buscarLocaisCoordenador($id_coordenador){

        // Fetch Employees by Departmentid
        $coordenador = Coordenador::find($id_coordenador);
        $dados['locais'] = $coordenador->locais;

        echo json_encode($dados);
        exit;
    }
}
