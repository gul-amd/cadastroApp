@extends('layouts.admin')


    @section('content')

    <a href="{{ route('user.create')}}">Cadastrar</a>

    <h2>Listar Estudantes</h2>

    @if (session('sucess'))
        <p style="collor:#086">
            {{ session('sucess') }}
        </p>
    @endif

   @forelse ($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user->name }}<br>
        Email: {{ $user->email }}<br>
        <a href="{{ route('user.show', ['user' => $user->id]) }}">Visualizar</a><br>
        <a href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a><br>
        {{--<a href="{{ route('user.destroy', ['user' => $user->id]) }}">Apagar</a><br><hr>--}}
        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('tem acerteza que deja apagar o registro?')">Apagar</button>
        </form><hr>

    @empty

    @endforelse

    @endsection


