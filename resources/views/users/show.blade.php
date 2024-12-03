@extends('layouts.admin')

@section('content')

    <a href="{{ route('user.index')}}">Listar</a><br>
    <a href="{{ route('user.edit', ['user' => $user->id])}}">Editar</a><br>
    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('tem acerteza que deja apagar o registro?')">Apagar</button>
    </form>


    <h2>Vizualizar Estudante</h2>

    @if (session('sucess'))
    <p style="collor:#086">
        {{ session('sucess') }}
    </p>

    @endif

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Cadastrado: {{ \carbon\carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \carbon\carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>

@endsection
