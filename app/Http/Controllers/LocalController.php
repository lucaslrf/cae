<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Bloco;
use App\Coordenador;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    public function index()
    {
       $locais = Local::all();
       $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {
    
           return view('locais.local-listar', compact('locais'));
            
        } else {
           return redirect()->route('login');
        }
    }
    

    public function create()
    {
        $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {

            $blocos = Bloco::all();

            $coordenadores = Coordenador::all();

            return view('locais.local-cadastrar', compact('blocos', 'coordenadores'));
            
        } else {
            return redirect()->route('login');
        }
        
    }

    public function store(Request $request){
        
        $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {

            $blocosId = Bloco::select('id')->where('id', $request->blocoId)->first();
            $coordenadoresId = Coordenador::select('id')->where('id', $request->coordenadorId)->first();
            Local::create(array_merge($request->all(), ['blocoId' => $blocosId->id],['coordenadorId' => $coordenadoresId->id]));
            return redirect()->route('locais.index');
            
         } else {
            return redirect()->route('login');
        }
        
    }

    public function show(Local $local)
    {
        return view('locais.show', compact('local'));
    }

    public function edit($id)
    {
        
        $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {

            $local = Local::find($id);


            $blocos = Bloco::all();

            $coordenadores = Coordenador::all();

            return view('locais.local-editar', compact('local','blocos', 'coordenadores'));
        } else {
            return redirect()->route('login');
        }       
    }

    public function update(Request $request,$id)
    {
        $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {

             $local = Local::find($id);
             $bloco = Bloco::find($request->blocoId);
             $coordenador = Coordenador::find($request->coordenadorId);
             $local->update(array_merge($request->all(), ['blocoId' => $bloco->id], ['coordenadorId' => $coordenador->id]));
             return redirect()->route('locais.index');
         } else {
             return redirect()->route('login');
        } 
        
    }
 
    public function destroy($id)
    {
        $local_permissao = Permission::where('slug', 'local')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($local_permissao)) {
            $local = Local::find($id);
            $local->delete();
            return redirect()->route('locais.index');
        } else {
            return redirect()->route('login');
        } 
    }
}
