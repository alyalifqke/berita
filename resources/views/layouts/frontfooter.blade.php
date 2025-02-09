<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding fix">
         <div class="container">
             <div class="row d-flex justify-content-between">
                 <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                     <div class="single-footer-caption">
                         <div class="single-footer-caption">
                             <!-- logo -->
                             <div class="footer-logo">
                                 <a href="{{ ('/') }}"><img src="{{ asset('storage/logos/3.png') }}" style="width: 200px" alt=""></a>
                             </div>
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p>{{ $setting->footer_info }}</p>
                                 </div>
                             </div>
                             <!-- social -->
                             <div class="footer-social">
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fab fa-instagram"></i></a>
                                 <a href="#"><i class="fab fa-pinterest-p"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                     <div class="single-footer-caption mt-60">
                         <div class="footer-tittle">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <p>{{ $setting->address }}</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    {{-- <h3>+1 253 565 2365</h3> --}}
                                    <p>{{ $setting->phone }}</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    {{-- <h3>support@colorlib.com</h3> --}}
                                    <p>{{ $setting->ads }}</p>
                                </div>
                            </div>
                             <!-- Form -->
                             {{-- <div class="footer-form" >
                                 <div id="mc_embed_signup">
                                     <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                     method="get" class="subscribe_form relative mail_part">
                                         <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                         class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                         onblur="this.placeholder = ' Email Address '">
                                         <div class="form-icon">
                                         <button type="submit" name="submit" id="newsletter-submit"
                                         class="email_icon newsletter-submit button-contactForm"><img src="{{ asset('assets2/img/logo/form-iocn.png') }}" alt=""></button>
                                         </div>
                                         <div class="mt-10 info"></div>
                                     </form>
                                 </div>
                             </div> --}}
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                     <div class="single-footer-caption mb-50 mt-60">
                         <div class="footer-tittle">
                             <h4>Galery Foto</h4>
                         </div>
                         <div class="instagram-gellay">
                             <ul class="insta-feed">
                                @foreach ($newsix as $n)
                                <li><a href="#"><img src="{{ asset('storage/' . $n->image) }}" alt=""></a></li>
                                @endforeach
                                 {{-- <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li>
                                 <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li>
                                 <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li>
                                 <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li>
                                 <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li>
                                 <li><a href="#"><img src="{{ asset('assets2/img/post/instra1.jpg') }}" alt=""></a></li> --}}
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                 <div class="row d-flex align-items-center justify-content-between">
                     <div class="col-lg-6">
                         <div class="footer-copy-right">
                             <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="ti-heart" aria-hidden="true"></i> by <a href="{{ url('/') }}" target="_blank">Sorotan Pena</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                         </div>
                     </div>
                     {{-- <div class="col-lg-6">
                         <div class="footer-menu f-right">
                             <ul>                             
                                 <li><a href="#">Terms of use</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Contact</a></li>
                             </ul>
                         </div>
                     </div> --}}
                 </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>