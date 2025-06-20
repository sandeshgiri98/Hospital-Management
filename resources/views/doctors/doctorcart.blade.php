<section class="bg-white dark:bg-slate-50">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-8 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-6">
            <p class="text-black-700 sm:text-2xl dark:text-black-700 text-2xl">
                MEET OUR EXPERT TEAM
            </p>
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold">
                <span class="text-black">OUR DEDICATED</span>
                <span class="text-[oklch(45.7%_0.24_277.023)] uppercase">DOCTORS</span>
                <span class="text-black">TEAM</span>
            </h2>
        </div>


        <div class="swiper mySwiper">
            {{-- @foreach ($doctors as $doctor)
                <div class="swiper-slide">
                    <a href="{{ route('doctors.show', $doctor->id) }}"
                        class="block transition-transform transform hover:scale-105 hover:shadow-lg">
                        <div
                            class="w-[280px] h-[260px] bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <img class="w-full h-[200px] object-cover object-top"
                                src="{{ asset('storage/' . $doctor->image) }}" alt="{{ $doctor->name }}" />
                            <div class="px-4 pt-2 pb-4 text-center">
                                <h5 class="text-lg font-bold text-blue-700">{{ $doctor->name }}</h5>
                                <p class="text-gray-600 text-sm">{{ $doctor->qualification }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach --}}

            <div class="swiper-wrapper">
                  <style>
                    .inside-border-hover:hover {
                      border-color: #2563eb; /* Tailwind blue-600 */
                      box-shadow: inset 0 0 8px rgba(37, 99, 235, 0.7);
                    }

                    .swiper-slide {
  padding-top: 10px;
  padding-bottom: 10px;
}
.swiper-slide {
  overflow: visible !important;
}
                  </style>

                  @foreach([
                    ['image'=>'doctor1.jpg', 'name'=>'Dr. Sandesh Giri', 'qual'=>'MBBS, MD – Consultant Cardiologist'],
                    ['image'=>'doctor2.jpg', 'name'=>'Dr. Ram Ale', 'qual'=>'MBBS, MS – Senior Gynecologist & Obstetrician'],
                    ['image'=>'doctor3.jpg', 'name'=>'Dr. Suresh Adhikari', 'qual'=>'MBBS, MS – Orthopedic Specialist'],
                    ['image'=>'doctor4.jpg', 'name'=>'Dr. Rudra Poudel', 'qual'=>'MBBS, MD – ENT, Head & Neck Surgeon'],
                    ['image'=>'doctor5.jpg', 'name'=>'Dr. Rambaran Yadav', 'qual'=>'MBBS – General Physician'],
                  ] as $doctor)
                    <div class="swiper-slide">
                      <a href="#" class="block">
                        <div class="w-[280px] h-[260px] bg-white border border-transparent shadow-sm rounded-lg overflow-hidden
                                    transition-all duration-300 inside-border-hover hover:scale-105">
                          <img class="w-full h-[200px] object-cover object-top" src="{{ asset('images/'.$doctor['image']) }}" alt="{{ $doctor['name'] }}" />
                          <div class="px-4 pt-2 pb-4 text-center">
                            <h5 class="text-lg font-bold text-blue-700">{{ $doctor['name'] }}</h5>
                            <p class="text-gray-600 text-sm">{{ $doctor['qual'] }}</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endforeach

            </div>
        </div>

    </div>
</section>
