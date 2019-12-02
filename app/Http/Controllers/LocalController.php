<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Bloco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LocalController extends Controller
{
    public function index()
    {
        $locais = Local::all();
        return view('locais.local-listar', compact('locais'));
    }

    public function create()
    {        
        $blocos = Bloco::all();
        // if(Auth::check()){
            return view('locais.local-cadastrar', compact('blocos'));
        // }else{
            //return redirect()->route('locais.index');
        //}
    }

    public function store(Request $request)
    {
        Log::info('request', [$request]);
        //if(Auth::check()){
            Local::create($request->all());
        //}
        return redirect()->route('locais.index');
    }

    public function show(Local $local)
    {
        return view('locais.show', compact('local'));
    }

    public function edit(Local $local)
    {
        $blocos = Bloco::all();
        //if(Auth::check()){
           return view('locais.local-editar', compact('local', 'blocos'));
        //}else{
           // return redirect()->route('locais.index');
        //}        
    }

    public function update(Request $request, Local $local)
    {
        //if(Auth::check()){
           $local->update($request->all());
        //}else{
            return redirect()->route('locais.index');
        //}    
    }

    public function destroy(Local $local)
    {
        //if(Auth::check()){
            $local->delete();
        // }else{
            return redirect()->route('locais.index');
        // }    
    }
}
