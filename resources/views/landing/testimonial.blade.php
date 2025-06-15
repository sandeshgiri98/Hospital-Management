<head>
    <meta charset="utf-8">
    <title>Fancy Testimonials Slider</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>

<body class="relative font-inter antialiased">
    <main class="relative m-0 p-0 bg-slate-50 overflow-hidden">
        <h1 class="text-3xl font-bold text-center text-teal-600 uppercase mt-8">
            Happy Patients & Clients
        </h1>
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-24">
            <div class="flex justify-center">

                <!-- Fancy testimonial slider component -->
                <div class="w-full max-w-3xl mx-auto text-center" x-data="slider">
                    <!-- Testimonial image -->
                    <div class="relative h-32">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[480px] h-[480px] pointer-events-none before:absolute before:inset-0 before:bg-gradient-to-b before:from-indigo-500/25 before:via-indigo-500/5 before:via-25% before:to-indigo-500/0 before:to-75% before:rounded-full before:-z-10">
                            <div class="h-32 [mask-image:_linear-gradient(0deg,transparent,theme(colors.white)_20%,theme(colors.white))]">
                                <!-- Alpine.js template for testimonial images: https://github.com/alpinejs/alpine#x-for -->
                                <template x-for="(testimonial, index) in testimonials" :key="index">
                                    <div
                                        x-show="active === index"
                                        class="absolute inset-0 -z-10"
                                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 order-first"
                                        x-transition:enter-start="opacity-0 -rotate-[60deg]"
                                        x-transition:enter-end="opacity-100 rotate-0"
                                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700"
                                        x-transition:leave-start="opacity-100 rotate-0"
                                        x-transition:leave-end="opacity-0 rotate-[60deg]"
                                    >
                                        <img class="relative top-11 left-1/2 -translate-x-1/2 rounded-full" :src="testimonial.img" width="56" height="56" :alt="testimonial.name">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <!-- Text -->
                    <div class="mb-9">
                        <div class="relative flex flex-col transition-all duration-150 delay-300 ease-in-out" x-ref="testimonials">
                            <!-- Alpine.js template for testimonials: https://github.com/alpinejs/alpine#x-for -->
                            <template x-for="(testimonial, index) in testimonials" :key="index">
                                <div
                                    x-show="active === index"
                                    x-transition:enter="transition ease-in-out duration-500 delay-200 order-first"
                                    x-transition:enter-start="opacity-0 -translate-x-4"
                                    x-transition:enter-end="opacity-100 translate-x-0"
                                    x-transition:leave="transition ease-out duration-300 delay-300 absolute"
                                    x-transition:leave-start="opacity-100 translate-x-0"
                                    x-transition:leave-end="opacity-0 translate-x-4"
                                >
                                    <div class="text-2xl font-bold text-slate-900 before:content-['\201C'] after:content-['\201D']" x-text="testimonial.quote"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="flex flex-wrap justify-center -m-1.5">
                        <!-- Alpine.js template for buttons: https://github.com/alpinejs/alpine#x-for -->
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <button
                                class="inline-flex justify-center whitespace-nowrap rounded-full px-3 py-1.5 m-1.5 text-xs shadow-sm focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 dark:focus-visible:ring-slate-600 transition-colors duration-150"
                                :class="active === index ? 'bg-blue-700 text-white shadow-indigo-950/10' : 'bg-white hover:bg-indigo-100 text-slate-900'"
                                @click="active = index; stopAutorotate();"
                            >
                                <span x-text="testimonial.name"></span> <span :class="active === index ? 'text-indigo-200' : 'text-slate-300'">-</span> <span x-text="testimonial.role"></span>
                            </button>
                        </template>
                    </div>
                </div>
                <!-- Slider data and functionality: https://github.com/alpinejs/alpine -->
                <script>
                    document.addEventListener('alpine:init', () => {
                        Alpine.data('slider', () => ({
                            active: 0,
                            autorotate: true,
                            autorotateTiming: 4000,
                            testimonials: [
                                {
                                    img: "{{ asset('images/testimonial-01.jpg') }}",
                                    quote: "I’ve never experienced such seamless care coordination. From appointment booking to discharge, Sandesh Hospital’s system made everything fast, easy, and stress-free. Truly a 21st-century hospital!",
                                    name: 'Sandesh Giri',
                                    role: 'The Program Manager'
                                },
                                {
                                    img: "{{ asset('images/testimonial-02.jpg') }}",
                                    quote: "Sandesh Hospital's new management system is a game-changer. I could view my medical history online, track prescriptions, and receive timely reminders. Healthcare has never been this efficient!",
                                    name: 'Modit Tuladhar',
                                    role: 'Sr. Full Stack Developer'
                                },
                                {
                                    img: "{{ asset('images/testimonial-03.jpg') }}",
                                    quote: "As a patient, I felt valued and cared for. The hospital's digital system ensured quick responses and reduced waiting time significantly. I highly recommend Sandesh Hospital.",
                                    name: 'Rohit Gurung',
                                    role: 'Patient'
                                },
                            ],
                            init() {
                                if (this.autorotate) {
                                    this.autorotateInterval = setInterval(() => {
                                        this.active = this.active + 1 === this.testimonials.length ? 0 : this.active + 1
                                    }, this.autorotateTiming)
                                }
                                this.$watch('active', callback => this.heightFix())
                            },
                            stopAutorotate() {
                                clearInterval(this.autorotateInterval)
                                this.autorotateInterval = null
                            },
                            heightFix() {
                                this.$nextTick(() => {
                                    this.$refs.testimonials.style.height = this.$refs.testimonials.children[this.active + 1].offsetHeight + 'px'
                                })
                            }
                        }))
                    })
                </script>
                <!-- End: Fancy testimonial slider component -->

            </div>
        </div>
    </main>


