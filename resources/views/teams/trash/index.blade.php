@extends('layouts.main')

@section('title', 'Teams')

@section('section-id', 'teams')

@section('content')


  <div class="card-title text-center">
    <h1>Trashed Teams</h1>

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
              <form action="{{ route('teams.trash.restore', $team->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-small btn-success" type="submit">Ripristina</button>
              </form>
              <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-small btn-warning mx-2">Modifica</a>
              <form action="{{ route('teams.trash.drop', $team->id) }}" method="POST" class="delete-form"
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


    <div class="d-flex justify-content-end">
      <form action="{{ route('teams.trash.dropAll') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Svuota cestino</button>
      </form>
    </div>
  </div>

@endsection

@section('scripts')
  @vite('resources/js/delete-confirmation.js')
@endsection
