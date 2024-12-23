@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Listar Usuarios</span>
            <span class="ms-auto">
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm">Dashboard</a>
            </span>
        </div>

        <div class="card-body">

            <x-alert />

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Grupo</th>
                <th scope="col" class="text-center">Acoes</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('tem acerteza que deja apagar o registro?')">Apagar</button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum usuario encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection


