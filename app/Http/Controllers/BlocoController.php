<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bloco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlocoController extends Controller
{
    public function index()
    {
        Log::info('userlogado', [auth()->user()]);
        //verifica se tem usuário logado e se é admin ou coordenador
        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
            $blocos = Bloco::all();
            return view('blocos.bloco-listar', compact('blocos'));
        }else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
            return view('blocos.bloco-cadastrar');
        }else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        Log::info('request', [$request]);
        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
            Bloco::create($request->all());
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function edit(Bloco $bloco)
    {

        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
            return view('blocos.bloco-editar', compact('bloco'));
        }else{
            return redirect()->route('login');
        }

    }

    public function update(Request $request, Bloco $bloco)
    {
        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
           $bloco->update($request->all());
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }   
    }

    public function destroy(Bloco $bloco)
    {
        if(Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador'))){
            $bloco->delete();
            return redirect()->route('blocos.index');
        }else{
            return redirect()->route('login');
        }    
    }
}
