<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Data;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DataController extends Controller
{
    public function index($id_reserva)
    {
        $data_permissao = Permission::where('slug','data')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($data_permissao)){
            $reserva = Reserva::find($id_reserva);
            $datas = $reserva->datas;        
            $user = auth()->user();
            return view('datas.data-listar', compact('datas','reserva','user'));
        }else{
            return redirect()->route('login');
        } 
    }

    public function create($id_reserva)
    {        
        $data_permissao = Permission::where('slug','data')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($data_permissao)){
            return view('datas.data-cadastrar', compact('id_reserva'));
        }else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request, $id_reserva)
    {
        $data_permissao = Permission::where('slug','data')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($data_permissao)){          
            $data_processamento = date('Y-m-d H:i:s');
            $request->request->add(['reservaId' => $id_reserva]);
            $request->request->add(['datahoraSolicitacao' => $data_processamento]);
            Data::create($request->all());
            return redirect()->route('reserva.datas', $id_reserva);
        }else{
            return redirect()->route('login');
        }
    }

    public function destroy(Data $data)
    {
        $data_permissao = Permission::where('slug','data')->first();
        
        if(Auth::check() && auth()->user()->hasPermissionThroughRole($data_permissao)){  
            $id_reserva = $data->reservaId;
            $data->delete();
            return redirect()->route('reserva.datas', $id_reserva);
        }else{
            return redirect()->route('login');
        }  
    }
}
