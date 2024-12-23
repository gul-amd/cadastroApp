<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;




class UserController extends Controller
{

public function index()
    {

        return view('users.index');

    }

    public function list()
    {
                // Recuperar os registos do banco de dados
                $users = User::orderByDesc('id')->get();

                // Carregar a VIEW
                return view('users.list', ['users' => $users]);
    }

    public function usuarios()
    {

         // Recuperar os registos do banco de dados e filtrar apenas o role user
        $users = User::where('role', 'user')->orderByDesc('id')->get();

         // Carregar a VIEW
        return view('users.listUsers', ['users' => $users]);

    }

public function administradores()
    {

        $users = User::where('role', 'admin')->orderByDesc('id')->get();

         // Carregar a VIEW
        return view('users.listAdmins', ['users' => $users]);

    }

    public function show(User $user)
    {

        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        // Validar o formulario
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.list')->with('success', 'Cadastrado com sucesso!');

    }

    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user]);

    }


    public function update(UserRequest $request, User $user)
    {
        //validar formulario
        $request->validated();



        //Eitar as informacoes do registro de banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.show',['user' => $user->id])->with('sucess', 'Editado com sucesso!');

    }

    public function destroy(User $user)
    {
        // apagar registro na db
        $user->delete();

        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.list')->with('sucess', 'Removido com sucesso!');
    }

}
