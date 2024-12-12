@extends('layouts.admin')

@section('content')

    <div class="card mt-4 mb-4 border-none shadow">
        <div class="card-header hstack gap-2">
            <span>
                Lista de Estudantes
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
                Cadastrar Estudantes
            </span>
            <span class="ms-auto">
            <a href="{{ route('user.create') }}" class="btn btn-light btn-sm">
                <img src="{{ asset('images/person-add.svg') }}" alt="Ícone">
            </a>
            </span>
        </div>
    </div>


@endsection
