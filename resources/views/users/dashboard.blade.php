@extends('layouts.admin')

@section('content')

    <h2>Dashboard</h2>


    <div class="container-sm">
    <div class="row row-cols-1 row-cols-md-3 g-8">
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/professor.svg') }}" class="card-img-top" alt="Docentes">
            <div class="card-body">
              <h5 class="card-title">Docentes</h5>
              <p class="card-text">Lista completa</p>
            </div>
          </div>
        </div>
        <div class="col" onclick="{{ route('user.index')}}">
          <div class="card h-100">
            <img src="{{ asset('images/estudante.svg') }}" class="card-img-top" alt="Estudatntes">
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('user.index')}}"> Estudantes </a>
              </h5>
              <p class="card-text">Lista completa.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-sm">
        <div class="row row-cols-1 row-cols-md-3 g-8">
            <div class="col">
              <div class="card h-100">
                <img src="{{ asset('images/professor.svg') }}" class="card-img-top" alt="Docentes">
                <div class="card-body">
                  <h5 class="card-title">Docentes</h5>
                  <p class="card-text">Lista completa</p>
                </div>
              </div>
            </div>
            <div class="col" onclick="{{ route('user.index')}}">
              <div class="card h-100">
                <img src="{{ asset('images/estudante.svg') }}" class="card-img-top" alt="Estudatntes">
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="{{ route('user.index')}}"> Estudantes </a>
                  </h5>
                  <p class="card-text">Lista completa.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
