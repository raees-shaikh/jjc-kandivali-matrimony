<footer class="footer ">
    <img class="footer-bg" src="{{ url('frontend/image/theme-bg.png') }}" alt="">
    <div class="container mt-5 mb-lg-5 mb-0 ">
        <div class="row m-0 justify-content-center">
            <div class=" col-lg-4 footer-logo justify-content-center">
                <a href="{{ url('/') }}">
                    <img src="{{ url('frontend/image/logo.png') }}" alt="">
                </a>
                <p class="f-14 lh-1-6">
                    Find your Special One on Matrimonial Site.
                    Register Now. 100% Secure and Trusted Site.
                </p>
                <div class="d-lg-block d-none">
                    <h6 class="px-md-0 px-3 font-weight-600">Quick Links</h6>
                    <ul class="footer-links">

                        <li class="d-lg-block d-inline f-14 mx-1 mx-lg-0 "><span class="dot"></span><a
                                href="/">Home</a></li>
                        @auth
                            <li class="d-lg-block d-inline mx-1 mx-lg-0 mt-lg-3 f-14 "><span class="dot"></span> <a
                                    href="{{ '/profile' }}">Profile</a>
                            </li>
                            <li class="d-lg-block d-inline mx-1 mx-lg-0 mt-lg-3 f-14 "><span class="dot"></span> <a
                                    href="{{ '/search' }}">Search</a>
                            </li>

                        @endauth
                        <li class="d-lg-block d-inline mt-lg-3 mx-1 mx-lg-0 f-14"><span class="dot"></span><a
                                data-bs-toggle="modal" data-bs-target="#loginPopup-2" class="cursor-pointer">Download
                                Form</a></li>
                        <li class="d-lg-block d-inline mt-lg-3 mx-1 mx-lg-0 f-14"><span class="dot"></span><a
                                href="{{ url('/contact-us') }}">Contact</a></li>

                    </ul>
                </div>

            </div>
            <div class=" col-lg-4 justify-content-center mx-auto  order-2 mt-md-0 mt-3">

                <ul class="px-md-0 px-3">

                    {{-- <li class="mb-3">
                        <a href="javascript:void(0)" class="icon-group">
                            <i class="fa-solid fa-location-dot footer-icon"></i>
                            <span class="f-14 lh-1-6">
                                C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali
                                (West), Mumbai - 400 067.

                            </span>
                        </a>
                    </li> --}}
                    {{-- <li class="mb-3">
                        <a href="tel:+91-22-28660169" class="icon-group">
                            <i class="fa fa-phone"></i>
                            <span class="contact-link footer-contact-links f-14">
                                +91-22-28660169
                            </span>
                        </a>
                    </li> --}}
                    <li class="mb-3">
                        <a href="mailto:info@jjckandivali.com" class="icon-group">
                            <i class="fa fa-envelope footer-icon"></i>
                            <span class="contact-link footer-contact-links f-14">
                                info@jjckandivali.com
                            </span>
                        </a>
                    </li>
                    <ul class="px-md-0 ">
                        <li class="mb-3">
                            <a href="tel:+919869787439" class="icon-group">
                                <i class="fa fa-phone footer-icon"></i>
                                <span class="contact-link footer-contact-links f-14">
                                    +91-9869787439
                                </span>
                            </a>

                        </li>

                        <li class="mb-3">
                            <a href="tel:+919821050169" class="icon-group">

                                <span class="contact-link footer-contact-links f-14 mx-4 px-1 px-md-0">
                                    +91-9821050169
                                </span>
                            </a>
                        </li>

                        <li class="mb-3">
                            <a href="tel:+918104597390" class="icon-group">

                                <span class="contact-link footer-contact-links f-14 mx-4 px-1 px-md-0">
                                    +91-8104597390
                                </span>
                            </a>
                        </li>
                    </ul>

                </ul>
            </div>
            <div class="   col-lg-4 mt-lg-0 mt-2  ordder-1">
                <h6 class="px-md-0 px-3 font-weight-600">Correspondence Office</h6>
                <ul class="px-md-0 px-3">
                    <li class="mb-3">
                        <a href="javascript:void(0)" class="icon-group">
                            <i class="fa-solid fa-location-dot footer-icon"></i>
                            <span class="f-14 lh-1-6">
                                {{-- C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali
                                (West), Mumbai - 400 067. --}}
                                Jain Sagpan Mahiti Centre
                                Shop No. 9, Sai Raj Garden,
                                Opp. Modi Park,
                                Hemu Kalani Road No. 3,
                                Irani Wadi,
                                Kandivali (West),
                                Mumbai - 400 067.
                            </span>
                        </a>
                    </li>
                </ul>
                <h6 class="px-md-0 px-3 font-weight-600 mt-lg-0 mt-4">Centre Timings</h6>
                <ul>
                    <li class="px-md-0 px-3">
                        <span class="icon-group">
                            <i class="fa fa-clock footer-icon"></i>
                            <span class=" f-14  px-1 px-md-0">
                                Sunday 10 am to 12 noon
                            </span>

                        </span>
                    </li>
                    <li class="mb-3">
                        <span class="icon-group">

                            <span class=" f-14 mx-md-4 mx-5 px-1 px-md-0 ">
                                Thursday 4 pm to 6 pm
                            </span>
                        </span>
                    </li>
                </ul>
            </div>

        </div>
        <div class="row d-lg-none d-block">
            <div class="text-center text-md-start px-0 px-sm-5">
                <h6 class="px-md-0 px-3 font-weight-600 text-center d-none">Quick Links</h6>
                <ul class="footer-links text-center text-md-start  d-block">

                    <li class="d-lg-block d-inline f-14 mx-1 mx-lg-0 "><a href="/">Home</a></li>
                    @auth
                        <li class="d-lg-block d-inline mx-1 mx-lg-0 mt-lg-3 f-14 "><a href="{{ '/profile' }}">Profile</a>
                        </li>
                        <li class="d-lg-block d-inline mx-1 mx-lg-0 mt-lg-3 f-14 "><a href="{{ '/search' }}">Search</a>
                        </li>

                    @endauth
                    <li class="d-lg-block d-inline mt-lg-3 mx-1 mx-lg-0 f-14"><a data-bs-toggle="modal"
                            data-bs-target="#loginPopup-2" class="cursor-pointer">Download Form</a></li>
                    <li class="d-lg-block d-inline mt-lg-3 mx-1 mx-lg-0 f-14"><a
                            href="{{ url('/contact-us') }}">Contact</a></li>

                </ul>
            </div>
        </div>
    </div>

    <hr>
    <div class="container">
        <div class="footer-bottom">
            <div class="">
                <small>
                    &copy {{ date('Y') }} Jain Jagruti Centre. All Rights Reserved.
                </small>
            </div>
            <div class="mb-3">
                <small>
                    Designed & Developed by <a href="http://acetrot.com"
                        class=" text-decoration-none text-black acetrot-hover" target="_blank">Acetrot</a>
                </small>
            </div>
        </div>
    </div>
</footer>


<a href="#" class="scroll-top">
    <i class="fa fa-arrow-up"></i>
</a>

<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="/js/jquery.min.js"></script>

<script>
    @if (Session::get('alert-type') == 'success')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#1abc9c'
            });
        @endif
    @elseif (Session::get('alert-type') == 'info')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#2196f3'
            });
        @endif
    @elseif (Session::get('alert-type') == 'error')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        @endif
    @else
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#3b3f5c'
            });
        @endif
    @endif
</script>

<script>
    // $(document).ready(function() {
    //     @if (session()->has('login_redirect') == true)
    //         $('#loginPopup').modal('show')
    //     @endif
    // });

    window.onscroll = function() {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;


        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        };

        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }

    };
    $('.scroll-top').hide();
    $(window).scroll(function() {

        if ($(this).scrollTop() > 80) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>


@if (session()->has('download-form-url') || session()->has('download-from-error'))
    <script>
        $(document).ready(function() {
            $('#loginPopup-2').modal("show");
        });
    </script>
@endif
<script>
    $('select').on('change', function() {
        $(this).css("color", "black");
    });
    $(document).ready(function() {
        $("#loginPopup").on('shown.bs.modal', function() {
            $(this).find("input:visible:first").focus();
        });
    });
</script>
