@extends('frontend.invest.parsial.app')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@php
  $highlight = \App\Models\InvestBanner::first();
@endphp

@if($highlight)
<section class="relative bg-[#00303F] overflow-hidden max-w-[1223px] mx-auto">
  <img src="https://storage.googleapis.com/a1aa/image/446507d0-f65f-43df-f728-e95b634fcd6c.jpg" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-multiply" />
  <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 grid grid-cols-1 md:grid-cols-2 gap-10 items-center max-w-6xl mx-auto">
    
    <div>
      <h2 class="text-white font-extrabold text-2xl sm:text-3xl md:text-4xl leading-tight">
        {{ $highlight->title }}
      </h2>
      <ul class="mt-6 space-y-4 text-gray-300 text-sm sm:text-base">
        @foreach($highlight->points as $point)
          <li class="flex items-start">
            <i class="fas fa-check fa-xs mt-1 mr-3 text-white"></i>
            <span>{{ $point }}</span>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="flex justify-center md:justify-end">
      <button type="button" class="gradient-animate-hover inline-flex items-center space-x-2 rounded-full px-6 py-3 text-white text-sm sm:text-base font-medium transition">
        <i class="fas fa-mouse-pointer text-white"></i>
           <a href="#plan"> <span>{{ $highlight->button_text }}</span></a>
      </button>
    </div>
    
  </div>
</section>
@endif


<style>
        .gradient-animate-hover {
          background: linear-gradient(270deg, #6DD5FA,rgb(247, 167, 216), #6DD5FA);
          background-size: 200% 100%;
          background-position: 0% 50%;
          transition: background-position 0.5s ease-in-out; /* ⏱️ Increased duration */
        }

        .gradient-animate-hover:hover {
          background-position: 100% 50%;
        }

          
        .d-ggrid-marge{
               
                display: flex;
               
                align-items: center;
                flex-wrap: nowrap;
                flex-direction: row;
                margin: auto 43px;
                padding: 18px;
      }
            .strack{
          margin: auto!important;
      }  

      .strack p{
       
        padding: 5px!important;
      }
          
            

      .xhs {
        margin-top: 40px;
      }
</style>


<section class="w-full max-w-[1222px] mx-auto px-4 sm:px-6 lg:px-8 py-12 rounded-b-lg">
 <div class="flex items-center justify-center w-full mb-10 space-x-4 ">
    <hr class="border-gray-300 flex-grow max-w-[200px]" />
    <h3 class="text-[#2e2e5c] font-extrabold text-xl sm:text-2xl text-center whitespace-nowrap">
        <span class="text-[#4b2e5e] text-2xl">Traction</span>
    </h3>
    <hr class="border-gray-300 flex-grow max-w-[200px]" />
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-y-12 gap-x-8 text-[#1a1a4b] text-xs sm:text-sm font-semibold ">
    @foreach($tractions as $traction)
    <div class="flex items-center space-x-4 d-ggrid-marge">
        <div class="bg-[#00401a] text-white rounded-full w-12 h-12 flex items-center justify-center">
            <i class="{{ $traction->icon }} text-xl"></i>
        </div>
        <div class="strack">
            <p class="text-[#2e2e5c] font-extrabold text-base leading-tight">{{ $traction->highlight }}</p>
            <p class="text-xs text-[#2e2e5c] leading-tight">{{ $traction->description }}</p>
        </div>
    </div>
    @endforeach
</div>

<!-- ================== ALPINE WRAPPER ================== -->
<div x-data="{
    open: false,
    selected: null
}">

<!-- ================== TITLE ================== -->
<div class="flex items-center justify-center w-full max-w-full mb-8 space-x-4">
    <hr class="border-gray-300 flex-grow" />

    <h3 class="text-[#2e2e5c] font-extrabold text-2xl text-center whitespace-nowrap">
        Choose <span class="text-[#4b2e5e]">Your</span>
        <span id="plan">Investment Plan</span>
    </h3>

    <hr class="border-gray-300 flex-grow" />
</div>

<!-- ================== DESCRIPTION ================== -->
<div class="w-full max-w-[1222px] mx-auto mt-6">
    <p class="text-center text-gray-600 mb-6">
        Explore our investment plans below. Hover over a card to pause scrolling and view details.
    </p>

    <!-- ================== MARQUEE ================== -->
    <div class="overflow-hidden relative">

        <div
            @mouseenter="$el.querySelector('.marquee').style.animationPlayState='paused'"
            @mouseleave="$el.querySelector('.marquee').style.animationPlayState='running'"
            class="marquee flex gap-6 animate-marquee">

            @foreach($plans as $plan)

            <div
                class="min-w-[250px] h-[400px] bg-cover bg-center rounded-lg flex-shrink-0 cursor-pointer"
                style="background-image: url('{{ asset('image/demo2.jpeg') }}');">

                <div class="h-full w-full flex flex-col justify-end bg-gradient-to-t from-black/50 to-transparent p-4 rounded-lg">

                    <h2 class="font-bold text-lg text-white text-center">
                        {{ $plan->title }}
                    </h2>

                    <button
                        @click="selected = @js($plan); open = true"
                        class="mt-4 bg-[#16819B] text-white text-sm font-semibold rounded-full px-4 py-2 w-full">
                        View Details
                    </button>

                </div>

            </div>

            @endforeach

        </div>
    </div>
</div>

<!-- ================== GLOBAL MODAL ================== -->
<div
    x-show="open"
    x-transition
    class="fixed inset-0 bg-black/60 flex items-center justify-center z-[9999]"
    style="display:none;">

    <div
        @click.away="open = false"
        class="bg-white w-full max-w-3xl p-6 rounded-lg shadow-xl max-h-[90vh] overflow-auto">

        <!-- TITLE -->
        <h2 class="text-xl font-bold mb-4"
            x-text="selected?.title"></h2>

        <!-- IMAGES -->
        <template x-if="selected?.image_1">
            <img :src="'/storage/' + selected.image_1"
                 class="w-full rounded h-64 object-cover mb-2">
        </template>

        <template x-if="selected?.image_2">
            <img :src="'/storage/' + selected.image_2"
                 class="w-full rounded h-64 object-cover mb-2">
        </template>

        <template x-if="selected?.image_3">
            <img :src="'/storage/' + selected.image_3"
                 class="w-full rounded h-64 object-cover mb-2">
        </template>

        <!-- APPLY -->
        <div class="mt-6 flex justify-center" x-show="selected?.apply_link">
            <a :href="selected.apply_link"
               target="_blank"
               class="px-6 py-2 bg-green-600 text-white rounded font-semibold">
                Apply Now
            </a>
        </div>

        <!-- CLOSE -->
        <div class="mt-6 text-right">
            <button @click="open = false"
                    class="px-4 py-2 bg-gray-700 text-white rounded">
                Close
            </button>
        </div>

    </div>
</div>

</div>

<!-- ================== MARQUEE CSS ================== -->
<style>
@keyframes marquee {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}

.animate-marquee {
    display: flex;
    animation: marquee 12s linear infinite;
}
</style>


</section>
 <section class="w-full max-w-[1222px] mx-auto pt-20 rounded-t-lg overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 3" width="100%" height="3vw" preserveAspectRatio="none">
<path  d="M100,0v0.8c-0.7,0-0.7,0.6-1.4,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.7,0-0.7,0.6-1.5,0.6c-0.6,0-0.6-0.6-1.4-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.4-0.6s-0.7,0.6-1.5,0.6
	c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.6,0-0.6,0.6-1.3,0.6s-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6
	c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.5,0-0.5,0.6-1.3,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.7,0-0.7,0.6-1.4,0.6s-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6s-0.7,0.6-1.4,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6
	s-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.6,0.6-1.4,0.6c-0.8,0-0.7-0.6-1.3-0.6
	c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.4-0.6s-0.7,0.6-1.5,0.6s-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.6,0-0.6,0.6-1.3,0.6s-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6
	c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6s-0.6,0.6-1.3,0.6c-0.7,0-0.7-0.6-1.5-0.6
	c-0.7,0-0.7,0.6-1.4,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6c-0.7,0-0.7-0.6-1.5-0.6c-0.7,0-0.7,0.6-1.5,0.6
	c-0.7,0-0.7-0.6-1.5-0.6c-0.6,0-0.6,0.6-1.3,0.6C6.7,1.4,6.7,0.8,6,0.8S5.3,1.4,4.5,1.4C3.8,1.4,3.8,0.8,3,0.8
	c-0.7,0-0.7,0.6-1.4,0.6S0.9,0.8,0.1,0.8c0,0-0.1,0-0.1,0V0H100z"fill="#E5E7EB"></path>
</svg>

    <div class="py-5 text-center px-6 sm:px-8 lg:px-10 bg-white rounded-b-lg" style="padding: 55px 0px;">
      <h2 class="font-extrabold text-black text-base sm:text-lg md:text-xl leading-tight max-w-full mx-auto">
        Click Below to Express Interest &amp; Join the Future of Safe,
        Profitable Food Investments!
      </h2>

      <style>
      .unique-gradient-animate {
        background: linear-gradient(120deg, #0e7490, #2563eb, #0e7490);
        background-size: 200% auto;
        background-position: left center;
        transition: background-position 0.5s ease-in-out, box-shadow 0.3s ease;
      }

      .unique-gradient-animate:hover {
        background-position: right center;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.6);
      }
      </style>


      <button type="button" class="mt-5 unique-gradient-animate inline-flex items-center rounded-full px-7 py-2 text-white text-sm sm:text-base font-normal transition-all">
        <i class="fas fa-mouse-pointer mr-3 text-lg"></i>
        Express Interest to Invest
      </button>

    </div>

    <!-- Bottom wavy line using SVG path -->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 3" width="100%" height="3vw" preserveAspectRatio="none">
<path d="M0,3V2.2c0,0,0.1,0,0.1,0c0.8,0,0.8-0.6,1.5-0.6S2.3,2.2,3,2.2c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6
	s0.7-0.6,1.5-0.6c0.7,0,0.7,0.6,1.3,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.7,0,0.7,0.6,1.4,0.6c0.8,0,0.8-0.6,1.5-0.6c0.7,0,0.5,0.6,1.3,0.6s0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6s0.7,0.6,1.3,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.7-0.6,1.5-0.6s0.8,0.6,1.5,0.6s0.7-0.6,1.4-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.6,0,0.5-0.6,1.3-0.6c0.8,0,0.7,0.6,1.4,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.7-0.6,1.5-0.6s0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6
	c0.7,0,0.6,0.6,1.4,0.6s0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6s0.7,0.6,1.4,0.6c0.8,0,0.8-0.6,1.5-0.6
	c0.8,0,0.8,0.6,1.3,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6s0.7,0.6,1.3,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6s0.7-0.6,1.4-0.6c0.8,0,0.8,0.6,1.5,0.6
	c0.8,0,0.8-0.6,1.4-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6c0.8,0,0.8,0.6,1.5,0.6c0.8,0,0.8-0.6,1.5-0.6
	c0.7,0,0.7,0.6,1.4,0.6V3H0z"fill="#E5E7EB"></path>
</svg>
  </section>

<section class="bg-[#f9f9f9] w-full max-w-[1222px] mx-auto px-6 sm:px-10 py-12 border border-gray-300 border-t-0 rounded-b-lg">
    
    <!-- Heading -->
    <div class="flex items-center justify-center w-full mb-10 space-x-4">
        <hr class="border-gray-300 flex-grow" />
        <h3 class="text-[#2e2e5c] font-extrabold text-xl sm:text-2xl text-center whitespace-nowrap">
            Fact Sheet <span class="text-[#4b2e5e]">Regarding</span> <span>Investment</span>
        </h3>
        <hr class="border-gray-300 flex-grow" />
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-8 text-[#1a1a4b] text-sm font-semibold">
        @foreach($facts as $fact)
        <div class="flex items-start space-x-4">
            <!-- Icon -->
            <div class="bg-[#00401a] text-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0">
                <i class="{{ $fact->icon }} text-white text-xl"></i>
            </div>

            <!-- Content -->
            <div>
                <p class="text-[#2e2e5c] font-extrabold text-base leading-tight">{{ $fact->highlight_text }}</p>
                <p class="text-xs text-[#2e2e5c] leading-tight mt-1">{{ $fact->description }}</p>
            </div>
        </div>
        @endforeach
    </div>

</section>



<section class="py-20 px-4 bg-white">
  <div class="max-w-7xl mx-auto">

    <h2 class="font-extrabold text-lg mb-4 border-b border-gray-300 pb-2 text-gray-800"> Frequently Asked Questions</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-12 text-sm font-semibold leading-tight py-4">
      @foreach($faqs as $faq)
      <div class="faq-item cursor-pointer select-none">
        <div class="flex items-center py-1 space-x-2 text-gray-900 faq-question">
          <i class="fas fa-plus text-xs faq-icon transition duration-300"></i>
          <span>{{ $faq->question }}</span>
        </div>
        <div class="faq-answer mt-1 text-gray-700 text-sm hidden pl-6 pr-2">
          {{ $faq->answer }}
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-10 border-t border-gray-300 pt-6">
      <h3 class="font-extrabold text-base mb-4">📞 For more details:</h3>
      <div class="flex flex-wrap justify-start gap-x-20 gap-y-4 text-xs font-semibold text-gray-900" style="column-gap:13rem;">
        <a class="flex items-center space-x-2" href="#">
          <img class="w-5 h-5" src="https://storage.googleapis.com/a1aa/image/29e606bd-5a72-4ea5-3f6f-891f7aacd1c1.jpg" alt="WhatsApp" />
          <span>WhatsApp Now</span>
        </a>
        <a class="flex items-center space-x-2" href="#">
          <img class="w-5 h-5" src="https://storage.googleapis.com/a1aa/image/bb28ca1c-e2cc-417c-c8e8-3c0f45dc0a6b.jpg" alt="Email" />
          <span>Email Us</span>
        </a>
        <a class="flex items-center space-x-2" href="#">
          <img class="w-5 h-5" src="https://storage.googleapis.com/a1aa/image/4fd2bb4f-ce05-4bff-7266-16e73b3297ba.jpg" alt="Call" />
          <span>Call Now</span>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- FAQ Toggle Script --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.faq-item').forEach(item => {
      item.addEventListener('click', () => {
        const answer = item.querySelector('.faq-answer');
        const icon = item.querySelector('.faq-icon');

        answer.classList.toggle('hidden');
        icon.classList.toggle('fa-plus');
        icon.classList.toggle('fa-minus');
      });
    });
  });
</script>



@endsection