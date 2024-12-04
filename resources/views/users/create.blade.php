@extends('layouts.admin')

@section('content')


        <div class="card mt-4 mb-4 border-light shadow">

            <div class="card-header hstack gap-2">
                <span>Cadastrar Estudante</span>
                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('user.index')}}" class="btn btn-info btn-sm me-1">Listar</a><br>
                </span>
            </div>

    <x-alert />

    <form action="{{ route('user-store') }}" method="POST">
        @csrf
        @method('POST')
        <dl class="row">

            <dt class="col-sm-3">Nome </dt>
            <dd class="col-sm-9"><input type="text" name="name" placeholder="Nome Completo" value="{{ old('name') }}"></dd>

            <dt class="col-sm-3">E-mail </dt>
            <dd class="col-sm-9"><input type="email" name="email" placeholder="Seu Email" value="{{ old('email') }}"></dd>

            <dt class="col-sm-3">Password </dt>
            <dd class="col-sm-9"><input type="password" name="password" placeholder="Password com 6 caracter minimo" value="{{ old('password')}}"></dd>

            <dt class="col-sm-3"></dt>
            <dd class="col-sm-9"><button type="submit" class="btn btn-success btn-sm">Cadastrar</button></dd>
        </dl>

    </form>
        </div>

@endsection
