<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sandesh Hospital')</title>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/preline@latest/dist/preline.js"></script>



</head>
<body>
    @include('landing.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>
    @include('landing.imageslider')
    {{-- @include('landing.contact') --}}
  @include('landing.testimonial')
    @include('landing.footer')
</body>
</html>
