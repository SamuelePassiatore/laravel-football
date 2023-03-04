@if (session('message'))
  <div class="alert alert-{{ session('type') }}">
    {{ session('message') }}
  </div>
@endif
