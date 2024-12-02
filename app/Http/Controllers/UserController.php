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

        return redirect()->route('user.index')->with('sucess', 'Estudante Cadastrado com sucesso!');
    }

}
