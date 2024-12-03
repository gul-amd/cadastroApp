@extends('layouts.admin')

@section('content')

    <a href="{{ route('user.index') }}">Home</a>

    <h2>Cadastrar Estudantes</h2>

    @if($errors->any())

        @foreach ($errors->all() as $error)
            <p style="color: #f00">
                {{ $error }}
            </p>
        @endforeach
    @endif

    <form action="{{ route('user-store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Name: </label>
        <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name') }}"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Seu Email" value="{{ old('email') }}"><br><br>

        <label>Password: </label>
        <input type="password" name="password" placeholder="Password com 6 caracter minimo" value="{{ old('password')}}"><br><br>

        <button type="submit">Cadastrar</button>

    </form>

@endsection
