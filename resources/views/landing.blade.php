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

<body class="bg-white text-gray-800">

<div>
    @include('landing.navbar')
</div>
    <main class="pt-16">
        {{-- Image Slider --}}
        <div>
            @include('landing.imageslider')
        </div>
        <div>
            @include('landing.services')
        </div>
        <div>
            @include('landing.testimonial')
        </div>
        <div>
            @include('landing.contact')
        </div>
        <div>
            @include('landing.footer')
        </div>
    </main>

</body>

</html>
