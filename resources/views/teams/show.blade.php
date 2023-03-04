@extends('layouts.main')

@section('title', $team->short_name)

@section('icon', $team->logo)

@section('section-id', 'team-detail')

@section('content')

  <div class="card-header text-center bg-white mb-3">
    <h1>{{ $team->short_name }}</h1>
  </div>
  <div class="card-body">
    <div class="row">
      @if ($team->logo)
        <div class="col-3 text-center">
          <img src="{{ $team->logo }}" alt="{{ $team->name }}">
        </div>
      @endif
      <div class="col">
        <h3 clasS="text-muted">{{ $team->name }}</h3>
        <div>{!! $team->description !!}</div>
        <div><strong>Punti: </strong> {{ $team->points }}</div>
        <div><strong>Differenza reti: </strong> {{ $team->goal_difference }}</div>
      </div>
    </div>
  </div>
  <div class="card-footer bg-white d-flex justify-content-end">
    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="delete-form"
      data-name="{{ $team->short_name }}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger me-2">Elimina</button>
    </form>
    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning me-2">Modifica</a>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Indietro</a>
  </div>
@endsection


@section('scripts')
  @vite('resources/js/delete-confirmation.js')
@endsection
