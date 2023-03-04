@extends('layouts.main')

@section('title', 'Home')

@section('section-id', 'home')

@section('content')
    <div class="card-title text-center">
        <h1>Classifica</h1>
        <hr>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Squadra</th>
                    <th scope="col">Città</th>
                    <th scope="col">Nome Società</th>
                    <th scope="col">Punti</th>
                    <th scope="col">DR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $team)
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none name-list" href="{{ route('teams.show', $team->id) }}">
                                @if ($team->logo)
                                    <img src="{{ $team->logo }}" alt="{{ $team->name }}" width="20"
                                        class="img-fluid pe-1">
                                @endif
                                {{ $team->short_name }}
                            </a>
                        </th>
                        <td>{{ $team->city }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->points }}</td>
                        <td>{{ $team->goal_difference }}</td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row" class="text-center my-3 h3" colspan="5">Non ci sono squadre</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
