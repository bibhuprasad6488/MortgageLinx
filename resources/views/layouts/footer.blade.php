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
               @foreach ($serviceCats as $sc)
                   <!-- Column {{ $loop->iteration }}:  -->
                   <div class="col-md-2 col-xs-12 mb-4 mb-md-0">
                       <p class="footer-title fs-6">{{ $sc->title }}</p>
                       <ul class="footer-links">
                           @foreach ($sc->services as $service)
                               <a href="{{ route('service-details', $service->slug) }}">
                                   <li>{{ $service->title }}</li>
                               </a>
                           @endforeach
                       </ul>
                   </div>
               @endforeach
           </div>
           <!-- <hr class="footer-divider"> -->
       </div>
       <div class="container-fluid copyright">
           <div class="col-xs-12">
               <div class="text-center small">
                   <p class="">{{ $setting->copyright }}</p>
                   <p>
                       <a href="{{ route('introducer') }}">Introducers</a>
                       <a href="{{ route('protection') }}">. Protection</a>
                       <a href="{{ route('contact') }}">. Contact
                           Us
                       </a> <a href="{{ route('privacy-policy') }}">. Privacy
                           Policy </a>
                       <a href="{{ route('terms-of-business') }}">. Terms of Business</a>
                   </p>
               </div>
           </div>
       </div>
   </footer>
