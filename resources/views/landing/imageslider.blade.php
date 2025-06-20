<!-- Slider Start -->

<div class="z-0 relative w-full mt-2">
    <div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": true,
        "autoPlayInterval": 6000,
        "pauseOnHover": true,
        "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-white rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
        "slidesQty": {
            "xs": 1,
            "lg": 1
        }
    }'
        class="relative w-full">

        <!-- Carousel Track Wrapper -->
        <div class="hs-carousel w-full overflow-hidden">
            <!-- Image + Dots Container -->
            <div class="relative h-[300px] sm:h-[400px] md:h-[4500px] lg:h-[500px]">

                <!-- Slides -->
                <div
                    class="hs-carousel-body absolute top-0 bottom-0 left-0 flex flex-nowrap transition-transform duration-700 w-full">
                    @foreach (['babyborn.jpg', 'operation.jpg', 'ward.jpg', 'testing.jpg', 'doctorpatient.jpg'] as $img)
                        <div class="hs-carousel-slide relative flex-shrink-0 w-full">
                            <img src="{{ asset('images/' . $img) }}" alt="Slide"
                                class="object-cover w-full h-[300px] sm:h-[400px] md:h-[550px] lg:h-[600px]" />

                            <!-- Centered Text -->
                            <div class="absolute inset-0 flex items-center justify-center z-20 px-4">
                                <h2 id="typewriter"
                                    class="uppercase font-extrabold px-6 py-3 rounded
                                         text-transparent bg-clip-text bg-gradient-to-r from-indigo-800 via-purple-800 to-pink-700
                                         drop-shadow-lg
                                         text-3xl sm:text-4xl md:text-6xl lg:text-7xl
                                         text-center
                                         max-w-[90vw]">
                                         <button
                                         type="button"
                                         onclick="window.location.href='{{ route('home') }}'"
                                         class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2"
                                       >
                                         Book Appointment
                                       </button>
                                        <!-- Typed text will appear here -->
                                </h2>
                            </div>

                            <script>
                                const text = "FIND BEST MEDICAL SOLUTIONS QUICK AND EASY AT SANDESH HOSPITAL";
                                const el = document.getElementById("typewriter");
                                let index = 0;

                                function typeWriter() {
                                    if (index <= text.length) {
                                        el.textContent = text.slice(0, index);
                                        index++;
                                        setTimeout(typeWriter, 50); // Adjust typing speed here (ms)
                                    }
                                }

                                typeWriter();
                            </script>


                        </div>
                    @endforeach
                </div>


                <!-- Dots: Inside Image -->
                <div class="hs-carousel-pagination absolute bottom-5 left-0 right-0 z-20 flex justify-center gap-2">
                </div>
            </div>
        </div>

        <!-- Previous Button -->
        <button type="button"
            class="hs-carousel-prev absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 h-full text-white z-30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
            <span class="sr-only">Previous</span>
        </button>

        <!-- Next Button -->
        <button type="button"
            class="hs-carousel-next absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 h-full text-white z-30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>
<!-- Slider End -->
