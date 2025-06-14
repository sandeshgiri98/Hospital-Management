<!-- Add Preline JS once in your layout (before </body>) -->
<script src="https://unpkg.com/preline@latest/dist/preline.js"></script>

<!-- Slider Start -->
<div class="relative w-full">
    <div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": true,
        "autoPlayInterval": 3000,
        "pauseOnHover": true,
        "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-white rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
        "slidesQty": {
            "xs": 1,
            "lg": 1
        }
    }' class="relative w-full">
        <div class="hs-carousel w-full overflow-hidden">
            <div class="relative h-[300px] sm:h-[400px] md:h-[550px] lg:h-[600px]">
                <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 w-full">
                    @foreach ([
                        'babyborn.jpg',
                        'operation.jpg',
                        'ward.jpg',
                        'testing.jpg',
                        'doctorpatient.jpg'
                    ] as $img)
                        <div class="hs-carousel-slide flex-shrink-0 w-full">
                            <img src="{{ asset('images/' . $img) }}" alt="Slide"
                                class="object-cover w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[550px]" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Previous Button -->
        <button type="button"
            class="hs-carousel-prev absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 h-full text-white z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
            <span class="sr-only">Previous</span>
        </button>

        <!-- Next Button -->
        <button type="button"
            class="hs-carousel-next absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 h-full  text-white z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            <span class="sr-only">Next</span>
        </button>

        <!-- Dots -->
        <div class="hs-carousel-pagination flex justify-center absolute bottom-4 start-0 end-0 gap-2 z-10"></div>
    </div>
</div>
<!-- Slider End -->
