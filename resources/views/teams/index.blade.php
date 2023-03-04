@extends('layouts.main')

@section('title', 'Teams')

@section('section-id', 'teams')

@section('content')


  <div class="card-title text-center">
    <h1>Teams</h1>
    <div class="d-flex justify-content-between align-items-center">
      <a href="{{ route('teams.create') }}" class="btn btn-small btn-success">Aggiungi Squadra</a>
      <form method="GET" action="{{ route('teams.index') }}">
        <div class="input-group ">
          <input type="text" class="form-control" placeholder="Nome squadra" name="search" value="{{ $search }}">
          <button class="btn btn-outline-secondary" type="submit">Cerca</button>
        </div>
      </form>

    </div>
    <hr>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Squadra</th>
          <th scope="col">Città</th>
          <th scope="col">Nome Società</th>
          <th scope="col">Serie</th>
          <th scope="col">Punti</th>
          <th scope="col">DR</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($teams as $team)
          <tr>
            <th scope="row">
              @if ($team->logo)
                <img src="{{ $team->logo }}" alt="{{ $team->name }}" width="20" class="img-fluid">
              @endif
              {{ $team->short_name }}
            </th>
            <td>{{ $team->city }}</td>
            <td>{{ $team->name }}</td>
            <td>{{ $team->serie }}</td>
            <td>{{ $team->points }}</td>
            <td>{{ $team->goal_difference }}</td>
            <td class="d-flex justify-content-end">

              <a href="{{ route('teams.show', $team->id) }}" class="btn btn-small btn-primary">Vedi</a>
              <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-small btn-warning mx-2">Modifica</a>
              <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="delete-form"
                data-name="{{ $team->short_name }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <th scope="row" class="text-center my-3 h3" colspan="7">Non ci sono squadre</th>
          </tr>
        @endforelse

      </tbody>
    </table>

    <a href="{{ route('teams.trash.index') }}" class="btn btn-secondary">Cestino</a>


    {{-- {{ $teams->links() }} --}}
  </div>

@endsection

@section('scripts')
  @vite('resources/js/delete-confirmation.js')
@endsection
