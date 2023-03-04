{{-- Alert errori --}}

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{{-- Form --}}
@if ($team->exists)
  <form action="{{ route('teams.update', $team->id) }}" method="POST" novalidate>
    @method('PUT')
  @else
    <form action="{{ route('teams.store') }}" method="POST" novalidate>
@endif


@csrf

<div class="row">
  <div class="col-6">
    <div class="mb-3">
      <label for="short_name" class="form-label">Nome Squadra</label>
      <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name"
        placeholder="Nome della squadra" name="short_name" required value="{{ old('short_name', $team->short_name) }}">
      @error('short_name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @else
        <div class="form-text">Es.: Juventus</div>
      @enderror
    </div>
  </div>
  <div class="col-6">
    <div class="mb-3">
      <label for="name" class="form-label">Nome Società</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
        placeholder="Nome della società" name="name" required value="{{ old('name', $team->name) }}">
    </div>
  </div>
  <div class="col-3">
    <div class="mb-3">
      <label for="city" class="form-label">Città</label>
      <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
        placeholder="Città di appartenenza" name="city" required value="{{ old('city', $team->city) }}">
    </div>
  </div>
  <div class="col-9">
    <div class="row">
      <div class="col-11">
        <div class="mb-3">
          <label for="logo" class="form-label">Logo</label>
          <input type="url" class="form-control @error('logo') is-invalid @enderror" id="logo"
            placeholder="Logo della squadra" name="logo" value="{{ old('logo', $team->logo) }}">
        </div>
      </div>
      <div class="col-1">
        <div class="mb-3">

          <img src="{{ old('logo', $team->logo ?? 'https://marcolanci.it/utils/placeholder.jpg') }}" id="preview"
            alt="preview" class="img-fluid" width="50">
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea name="description" id="description" cols="30"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $team->description) }}</textarea>
    </div>
  </div>
  <div class="col-4">
    <div class="mb-3">
      <label for="serie" class="form-label">Serie</label>
      <select class="form-select @error('serie') is-invalid @enderror" id="serie" name="serie">
        <option @if (old('serie', $team->serie) === 'A') selected @endif>A</option>
        <option @if (old('serie', $team->serie) === 'B') selected @endif>B</option>
        <option @if (old('serie', $team->serie) === 'C') selected @endif>C</option>
      </select>
    </div>
  </div>
  <div class="col-4">
    <label for="points" class="form-label">Punti</label>
    <input type="number" step="1" min="-50" max="120"
      class="form-control @error('points') is-invalid @enderror" id="points" name="points"
      value="{{ old('points', $team->points ?? 0) }}">
  </div>
  <div class="col-4">
    <label for="goal_difference" class="form-label">Differenza Reti</label>
    <input type="number" step="1" min="-50" max="120"
      class="form-control @error('goal_difference') is-invalid @enderror" id="goal_difference" name="goal_difference"
      value="{{ old('goal_difference', $team->goal_difference ?? 0) }}">
  </div>
</div>

<hr>
<div class="d-flex justify-content-end">
  <button type="submit" class="btn btn-success">Salva</button>
</div>
</form>
