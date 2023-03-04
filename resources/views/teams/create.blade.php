@extends('layouts.main')

@section('title', 'Crea Squadra')

@section('section-id', 'create-team')

@section('content')


  <div class="card-title d-flex align-items-center justify-content-between">
    <h1>Crea squadra</h1>
    <a href="{{ route('teams.index') }}" class="btn btn-small btn-secondary">Indietro</a>
  </div>
  <hr>
  <div class="card-body">
    @include('includes.teams.form')
  </div>


@endsection



@section('scripts')
  @vite('resources/js/preview.js')
@endsection
