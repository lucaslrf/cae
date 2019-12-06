<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Servidor;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServidorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {
            $servidores = Servidor::all();
            return view('servidores.servidor-listar', compact('servidores'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {

            $users = DB::table('users')
                ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
                ->join('roles', 'users_roles.role_id', '=', 'roles.id')
                ->whereIn('roles.id', ['2', '3'])
                ->select('users.name', 'users.id')
                ->get();

            return view('servidores.servidor-cadastrar', compact('users'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {


            $user_name = User::select('name')->where('id', $request->usuarioId)->first();
            Servidor::create(array_merge($request->all(), ['nome' => $user_name->name]));
            return redirect()->route('servidores.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function edit($id)
    {
        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {


            $servidor = Servidor::find($id);
            $users = DB::table('users')
                ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
                ->join('roles', 'users_roles.role_id', '=', 'roles.id')
                ->whereIn('roles.id', ['2', '3'])
                ->select('users.name', 'users.id')
                ->get();

            return view('servidores.servidor-editar', compact('servidor', 'users'));
        } else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, $id)
    {

        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {

            $servidor = Servidor::find($id);

            $user_name = User::select('name')->where('id', $request->usuarioId)->first();

            $servidor->update(array_merge($request->all(), ['nome' => $user_name->name]));

            return redirect()->route('servidores.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {


        $servidor = Servidor::find($id);
        $servidor_permissao = Permission::where('slug', 'servidor')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($servidor_permissao)) {
            $servidor->delete();
            return redirect()->route('servidores.index');
        } else {
            return redirect()->route('login');
        }
    }
}
