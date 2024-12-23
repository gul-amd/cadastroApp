@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span>Editar Estudante</span>
            <span class="ms-auto d-sm-flex flex-row">

                <a href="{{ route('user.index')}}" class="btn btn-secondary btn-sm me-1">Listar</a><br>
                <a href="{{ route('user.show', ['user' => $user->id])}}" class="btn btn-warning btn-sm me-1">Vizualizar</a><br>
                <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('tem acerteza que deja apagar o registro?')">Apagar</button>
                </form>
                <a href="{{ route('user.index')}}" class="btn btn-info btn-sm me-1">Dashboard</a><br>
            </span>
        </div>

        <div class="card-body">

            <x-alert />

    <form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <dl class="row">
        <dt class="col-sm-3">ID </dt>
        <dd class="col-sm-9">{{ $user->id }}</dd>

        <dt class="col-sm-3">Nome </dt>
        <dd class="col-sm-9"><input type="text" name="name" placeholder="Nome Completo" value="{{ old('name', $user->name) }}"></dd>

        <dt class="col-sm-3">Grupo </dt>
        <dd class="col-sm-9">
            <select name="role" class="col-md-4" required>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </dd>

        <dt class="col-sm-3">E-mail </dt>
        <dd class="col-sm-9"><input type="email" name="email" placeholder="Seu Email" value="{{ old('email', $user->email) }}"></dd>

        <dt class="col-sm-3">Password </dt>
        <dd class="col-sm-9"><input type="password" name="password" placeholder="Password com 6 caracter minimo" value="{{ old('password')}}"></dd>
    </dl>

    <button type="submit" class="btn btn-success btn-sm">Salvar</button>

    </form>
        </div>
    </div>


@endsection

