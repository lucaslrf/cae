<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;
use App\Local;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class EquipamentoController extends Controller
{
    public function index()
    {
        
        $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

        if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {
            $equipamentos = Equipamento::all();
            return view('equipamentos.equipamento-listar', compact('equipamentos'));
            
        } else {
            return redirect()->route('login');
        }
    }
    

    public function create()
    {
        $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

        if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {

            $locais = Local::all();
            return view('equipamentos.equipamento-cadastrar', compact('locais'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request){

            $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

            if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {

                $locaisId = Local::select('id')->where('id', $request->localId)->first();
                Equipamento::create(array_merge($request->all(), ['localId' => $locaisId->id]));
                return redirect()->route('equipamentos.index');
            } else {
                return redirect()->route('login');
        }
    }

    public function show(Equipamento $equipamentos)
    {
        return view('equipamentos.show', compact('equipamentos'));
    }

    public function edit($id)
    {
        $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

        if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {

             $equipamento = Equipamento::find($id);

             $locais = Local::all();
            
             return view('equipamentos.equipamento-editar', compact('equipamento','locais'));
        } else {
            return redirect()->route('login');
        }  
    }

    public function update(Request $request,$id)
    {
        $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

        if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {

             $equipamento = Equipamento::find($id);
             $locais = Local::select('id')->where('id', $request->localId)->first();
             $equipamento->update(array_merge($request->all(), ['localId' => $locais->id]));
          
             return redirect()->route('equipamentos.index');
         } else {
             return redirect()->route('login');
         }

    }
 
    public function destroy($id)
    {
        $equipamento_permissao = Permission::where('slug', 'equipamento')->first();

        if (Auth::check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordenador')) && auth()->user()->hasPermissionThroughRole($equipamento_permissao)) {
            $equipamento = Equipamento::find($id);
            $equipamento->delete();
            return redirect()->route('equipamentos.index');
        } else {
            return redirect()->route('login');
        }
    }
}
