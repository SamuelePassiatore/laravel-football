<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="@yield('icon', asset('images/logo.png'))" type="image/png">
  <title>{{ env('APP_NAME') }} | @yield('title')</title>
  @yield('cdns')
  @vite('resources/js/app.js')
</head>

<body>
  {{-- Header --}}
  @include('includes.header')

  <main class="container">
    <section id="@yield('section-id')">
      <div class="card main-card p-5 my-5">
        @include('includes.alert')
        @yield('content')
      </div>
    </section>
  </main>

  @yield('scripts')
</body>

</html>
