<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
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
         $user_permissao = Permission::where('slug', 'usuario')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {
            $users = User::all();
            return view('users.user-listar', compact('users'));
        } else {
           return redirect()->route('login');
        }
    }

    public function create()
    {
         $user_permissao = Permission::where('slug', 'usuario')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {

            // $users = DB::table('users')
            //     ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
            //     ->join('roles', 'users_roles.role_id', '=', 'roles.id')
            //     ->whereIn('roles.id', ['2', '3'])
            //     ->select('users.name', 'users.id')
            //     ->get();

            return view('register');
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $user_permissao = Permission::where('slug', 'usuario')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {

            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
                
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(User $user)
    {
         $user_permissao = Permission::where('slug', 'usuario')->first();

         if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {
            $roles = Role::all();
            return view('users.user-editar', compact('user', 'roles'));
         } else {
             return redirect()->route('login');
         }
    }

    public function update(Request $request, User $user)
    {

         $user_permissao = Permission::where('slug', 'usuario')->first();

         if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {

            $user->update(array_merge($request->all()));

            return redirect()->route('users.index');
         } else {
            return redirect()->route('login');
         }
    }

    public function destroy($id)
    {


        $user = Servidor::find($id);
        $user_permissao = Permission::where('slug', 'usuario')->first();

        if (Auth::check() && auth()->user()->hasRole('admin') && auth()->user()->hasPermissionThroughRole($user_permissao)) {
            $user->delete();
            return redirect()->route('users.index');
        } else {
            return redirect()->route('login');
        }
    }
}
