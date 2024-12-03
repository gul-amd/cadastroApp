@extends('layouts.admin')

@section('content')

    <a href="{{ route('user.index')}}">Listar</a><br>
    <a href="{{ route('user.show', ['user' => $user->id])}}">Visualizar</a><br>

    <h2>Vizualizar Editar</h2>

    @if($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: #f00">
            {{ $error }}
        </p>
    @endforeach
@endif

<form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name: </label>
    <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name', $user->name) }}"><br><br>

    <label>E-mail: </label>
    <input type="email" name="email" placeholder="Seu Email" value="{{ old('email', $user->email) }}"><br><br>

    <label>Password: </label>
    <input type="password" name="password" placeholder="Password com 6 caracter minimo" value="{{ old('password')}}"><br><br>

    <button type="submit">Salvar</button>

</form>

@endsection
