<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NovoUsuarioMail;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Mail;




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
        ]);

        Mail::to($user->email)->send(new NovoUsuarioMail($user));
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado e e-mail enviado com sucesso!');


        // Redirecionar o usuario, enviar a menssagem de sucesso
        return redirect()->route('user.index')->with('success', 'Estudante cadastrado com sucesso!');

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
