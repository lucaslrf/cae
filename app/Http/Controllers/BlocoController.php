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
        $blocos = Bloco::all();
        return view('blocos.bloco-listar', compact('blocos'));
    }

    public function create()
    {
        // if(Auth::check()){
            return view('blocos.bloco-cadastrar');
        // }else{
            //return redirect()->route('blocos.index');
        //}
    }

    public function store(Request $request)
    {
        Log::info('request', [$request]);
        //if(Auth::check()){
            Bloco::create($request->all());
        //}
        return redirect()->route('blocos.index');
    }

    public function show(Bloco $bloco)
    {
        return view('blocos.show', compact('bloco'));
    }

    public function edit(Bloco $bloco)
    {
        //if(Auth::check()){
           return view('blocos.bloco-editar', compact('bloco'));
        //}else{
           // return redirect()->route('blocos.index');
        //}        
    }

    public function update(Request $request, Bloco $bloco)
    {
        //if(Auth::check()){
           $bloco->update($request->all());
        //}else{
            return redirect()->route('blocos.index');
        //}    
    }

    public function destroy(Bloco $bloco)
    {
        //if(Auth::check()){
            $bloco->delete();
        // }else{
            return redirect()->route('blocos.index');
        // }    
    }
}
