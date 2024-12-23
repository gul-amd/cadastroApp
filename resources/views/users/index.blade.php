@extends('layouts.admin')

@section('content')

<div class="card mt-4 mb-4 border-none shadow">
    <div class="card-header hstack gap-2">
        <span>
            Listar Todos
        </span>
        <span class="ms-auto">
        <a href="{{ route('user.list') }}" class="btn btn-light btn-sm">
            <img src="{{ asset('images/three-bars.svg') }}" alt="Ícone">
        </a>
        </span>
    </div>
</div>

<div class="card mt-4 mb-4 border-none shadow">
    <div class="card-header hstack gap-2">
        <span>
            Listar Usuarios
        </span>
        <span class="ms-auto">
        <a href="{{ route('show.users') }}" class="btn btn-light btn-sm">
            <img src="{{ asset('images/three-bars.svg') }}" alt="Ícone">
        </a>
        </span>
    </div>
</div>

<div class="card mt-4 mb-4 border-none shadow">
    <div class="card-header hstack gap-2">
        <span>
            Listar Adminstradores
        </span>
        <span class="ms-auto">
        <a href="{{ route('show.admins') }}" class="btn btn-light btn-sm">
            <img src="{{ asset('images/three-bars.svg') }}" alt="Ícone">
        </a>
        </span>
    </div>
</div>

<div class="card mt-4 mb-4 border-none shadow">
    <div class="card-header hstack gap-2">
        <span>
            Cadastrar
        </span>
        <span class="ms-auto">
        <a href="{{ route('user.create') }}" class="btn btn-light btn-sm">
            <img src="{{ asset('images/person-add.svg') }}" alt="Ícone">
        </a>
        </span>
    </div>
</div>

@endsection
