   <footer class="site-footer">
       <div class="container">
           <div class="row align-items-start text-center text-md-start">

               <div class="col-md-2 col-xs-12 mb-4 mb-md-0">
                   <p class="tac"><img
                           src="{{ $setting->footer_logo ? asset('storage/images/settings/' . $setting->footer_logo) : '' }}"
                           class="w-100"></p>
                   <p class="tac">{{ $setting->contact_phone }}</p>
                   <div class="footer-socials">
                       <div class="social-box">
                           <img src="{{ asset('images/fb.png') }}" alt="Facebook">
                       </div>
                       <div class="social-box">
                           <img src="{{ asset('images/gplus.png') }}" alt="Google Plus">
                       </div>
                       <div class="social-box">
                           <img src="{{ asset('images/twitter.png') }}" alt="Twitter">
                       </div>
                       <div class="social-box">
                           <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp">
                       </div>
                   </div>
               </div>
               <div class="col-md-8 col-xs-12 mb-4 mb-md-0">
                   {!! $setting->footer_text_one !!}
               </div>
               <div class="col-md-2 col-xs-12 mb-4 mb-md-0">

                   @foreach ($serviceCats as $sc)
                       <ul class="footer-links">
                           <a
                               href="@if ($sc->slug == 'protection') {{ route('protection') }}@else{{ route('service', $sc->slug) }} @endif">
                               <li class="fs-6">{{ $sc->title }}</li>
                           </a>
                       </ul>
                   @endforeach

                   <ul class="footer-links">
                       <a href="{{ route('contact') }}">
                           <li class="fs-6">Contact</li>
                       </a>
                       <a href="{{ route('become-an-introducer') }}">
                           <li class="fs-6">Become an Introducer</li>
                       </a>
                       <li class="mt-3"><img
                               src="{{ $setting->footer_logo_one ? asset('storage/images/settings/' . $setting->footer_logo_one) : '' }}"
                               alt="Certified Logo" width="80" class="certified-img"></li>
                   </ul>
               </div>
               {{-- @foreach ($serviceCats as $sc)
                   <div class="col-md-2 col-xs-12 mb-4 mb-md-0">
                       <ul class="footer-links">
                           @foreach ($sc->services as $service)
                               <a href="{{ route('service-details', $service->slug) }}">
                                   <li>{{ $service->title }}</li>
                               </a>
                           @endforeach
                       </ul>
                   </div>
               @endforeach --}}
           </div>
           <!-- <hr class="footer-divider"> -->
       </div>
       <div class="container-fluid copyright">
           <div class="col-xs-12">
               <div class="text-center small">
                   <p class="">&copy; {{ date('Y') }} {{ $setting->copyright }}</p>
                   {{-- <p>
                       <a href="{{ route('introducer') }}">Introducers</a>
                       <a href="{{ route('protection') }}">. Protection</a>
                       <a href="{{ route('contact') }}">. Contact
                           Us
                       </a> <a href="{{ route('privacy-policy') }}">. Privacy
                           Policy </a>
                       <a href="{{ route('terms-of-business') }}">. Terms of Business</a>
                   </p> --}}
               </div>
           </div>
       </div>
   </footer>
