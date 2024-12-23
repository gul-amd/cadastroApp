<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Mail\UserAssignedToAdmin;
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
        $admins = User::where('role', 'admin')->get();

        return view('users.create', compact('admins'));
    }

    public function store(UserRequest $request)
    {
        // Validar o formulario
        $validated = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'admin_id' => $validated['admin_id'] ?? null,
        ]);

        if ($user->admin_id) {
            $admin = User::find($user->admin_id);
            Mail::to($admin->email)->send(new UserAssignedToAdmin($admin->name, $user->name));
        }

        return redirect()->route('user.list')->with('success', 'Cadastrado com sucesso!');

    }

    public function edit(User $user)
    {

        $admins = User::where('role', 'admin')->get();

        return view('users.edit', compact('user', 'admins'));

    }


    public function update(UserRequest $request, User $user)
    {
        //validar formulario
        $validated = $request->validated();



        //Eitar as informacoes do registro de banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'admin_id' => $validated['admin_id'] ?? null,
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
