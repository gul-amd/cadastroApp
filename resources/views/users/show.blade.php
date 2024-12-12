@extends('layouts.admin')

@section('content')


        <div class="card mt-4 mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Visualizar Estudante</span>
                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('user.list')}}" class="btn btn-secondary btn-sm me-1">Listar</a><br>
                    <a href="{{ route('user.edit', ['user' => $user->id])}}" class="btn btn-warning btn-sm me-1">Editar</a><br>
                    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('tem acerteza que deja apagar o registro?')">Apagar</button>
                    </form>
                    <a href="{{ route('user.index')}}" class="btn btn-info btn-sm">Dashboard</a><br>
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <dl class="row">
                    <dt class="col-sm-3">ID </dt>
                    <dd class="col-sm-9">{{ $user->id }}</dd>

                    <dt class="col-sm-3">Nome </dt>
                    <dd class="col-sm-9">{{ $user->name }}</dd>

                    <dt class="col-sm-3">E-mail </dt>
                    <dd class="col-sm-9">{{ $user->email }}</dd>

                    <dt class="col-sm-3">Cadastrado </dt>
                    <dd class="col-sm-9">{{ \carbon\carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-3">Editado </dt>
                    <dd class="col-sm-9">{{ \carbon\carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>
            </div>
        </div>
@endsection
