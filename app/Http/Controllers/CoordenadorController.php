<?php

namespace App\Http\Controllers;

use App\Coordenador;
use App\Servidor;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CoordenadorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {

            $coordenadores = Coordenador::join('servidores', 'coordenadores.servidorId', '=', 'servidores.id')
                ->join('users', 'servidores.usuarioId', '=', 'users.id')
                ->select('coordenadores.id', 'coordenadores.servidorId', 'coordenadores.cargo', 'coordenadores.dataInicial', 'coordenadores.dataFinal', 'servidores.nome as nome', 'servidores.usuarioId')
                ->get();

            return view('coordenadores.coordenador-listar', compact('coordenadores'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {
            $users = User::join('servidores', 'users.id', '=', 'servidores.usuarioId')
                ->leftJoin('users_roles', 'users.id', '=', 'users_roles.user_id')
                ->leftJoin('roles', 'users_roles.role_id', '=', 'roles.id')
                ->leftJoin('coordenadores', 'servidores.id', '=', 'coordenadores.servidorId')
                ->whereIn('roles.id', ['2'])
                ->where('coordenadores.id', NULL)
                ->select('users.name', 'servidores.id')
                ->get();

            return view('coordenadores.coordenador-cadastrar', compact('users'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {
            $servidorId = Servidor::select('id')->where('id', $request->servidorId)->first();
            Coordenador::create(array_merge($request->all(), ['servidorId' => $servidorId->id]));
            return redirect()->route('coordenadores.index');
        } else {
            return redirect()->route('login');
        }
    }


    public function edit($id)
    {

        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {

            $coordenador = Coordenador::find($id);

            $servidor = Servidor::find($coordenador->servidorId);

            $users = User::join('servidores', 'users.id', '=', 'servidores.usuarioId')
                ->leftJoin('users_roles', 'users.id', '=', 'users_roles.user_id')
                ->leftJoin('roles', 'users_roles.role_id', '=', 'roles.id')
                ->leftJoin('coordenadores', 'servidores.id', '=', 'coordenadores.servidorId')
                ->whereIn('roles.id', ['2'])
                ->where('coordenadores.id', NULL)
                ->select('users.name', 'servidores.id')
                ->get();
                
            $user_atual = $servidor->usuario;
            $users->push($user_atual);

            return view('coordenadores.coordenador-editar', compact('coordenador', 'servidor', 'users'));
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, $id)
    {
        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {
            $coordenador = Coordenador::find($id);

            $servidor = Servidor::select('nome')->where('usuarioId', $request->usuarioId)->first();

            $coordenador->update(array_merge($request->all(), ['nome' => $servidor->nome]));

            return redirect()->route('coordenadores.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        $coordenador_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($coordenador_permissao)) {
            $coordenador = Coordenador::find($id);

            $coordenador->delete();

            return redirect()->route('coordenadores.index');
        } else {
            return redirect()->route('login');
        }
    }
}
