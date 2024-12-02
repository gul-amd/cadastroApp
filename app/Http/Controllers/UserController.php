<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

public function index()
    {

        // Recuperar os registos do banco de dados
        $users = User::orderByDesc('id')->get();

        // Carregar a VIEW
        return view('users.index', ['users' => $users]);
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.index')->with('sucess', 'Estudante Cadastrado com sucesso!');
    }

    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user]);

    }

    public function update(UserRequest $request, User $user)
    {
        //validar formulario
        $request->validated();



        //Eitar as informacoes do rehistro de banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.show',['user' => $user->id])->with('sucess', 'Estudante editado com sucesso!');

    }

    public function destroy(User $user)
    {
        // apagar registro na db
        $user->delete();

        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.index')->with('sucess', 'Estudante apagado com sucesso!');
    }

}
