<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bloco;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlocoController extends Controller
{
    public function index()
    {
        //busca pemissao de blocos        
        $bloco_permissao = Permission::where('slug','bloco')->first();

        //verifica se tem usuário logado, se é admin e se possui permissao de blocos
        if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
            $blocos = Bloco::all();
            return view('blocos.bloco-listar', compact('blocos'));
        }else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        //busca pemissao de blocos        
        $bloco_permissao = Permission::where('slug','bloco')->first();

        //verifica se tem usuário logado, se é admin e se possui permissao de blocos
        if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
            return view('blocos.bloco-cadastrar');
        }else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
       //busca pemissao de blocos        
       $bloco_permissao = Permission::where('slug','bloco')->first();

       //verifica se tem usuário logado, se é admin e se possui permissao de blocos
       if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
            Bloco::create($request->all());
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function edit(Bloco $bloco)
    {
        //busca pemissao de blocos        
        $bloco_permissao = Permission::where('slug','bloco')->first();

        //verifica se tem usuário logado, se é admin e se possui permissao de blocos
        if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
            return view('blocos.bloco-editar', compact('bloco'));
        }else{
            return redirect()->route('login');
        }

    }

    public function update(Request $request, Bloco $bloco)
    {
        //busca pemissao de blocos        
        $bloco_permissao = Permission::where('slug','bloco')->first();

        //verifica se tem usuário logado, se é admin e se possui permissao de blocos
        if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
           $bloco->update($request->all());
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }   
    }

    public function destroy(Bloco $bloco)
    {
        //busca pemissao de blocos        
        $bloco_permissao = Permission::where('slug','bloco')->first();

        //verifica se tem usuário logado, se é admin e se possui permissao de blocos
        if(Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($bloco_permissao)){
            $bloco->delete();
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }    
    }
}
