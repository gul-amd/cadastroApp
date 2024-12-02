<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{

public function index()
    {
        // Carregar a VIEW
        return view('users.index');
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

        return redirect()
    }

}
