<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sandesh Hospital')</title>

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/preline@latest/dist/preline.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


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
            @include('doctors.doctorcart')
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


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, // default on mobile
            spaceBetween: 18,
            loop: true,
            grabCursor: true, // 👈 allows dragging with mouse
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4, // ✅ Show 4 at a time on large screens
                },
            },
        });
    </script>
</body>

</html>
