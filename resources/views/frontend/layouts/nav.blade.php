<div class="main-site-nav">
    <div class="container mx-for-lg">
        <nav class="navbar navbar-expand-lg navbar-light  ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ '/' }}">
                    <img class="logo" height="50px" src="{{ url('frontend/image/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav font-weight-500">
                    <li class="nav-item">
                        {{-- {{ str_contains(URL::current(), route('frontend.home')) ? 'active' : '' }} --}}
                        <a class="nav-link {{ URL::current() == url('/') ? 'active text-red' : '' }} red-on-hover"
                            aria-current="page" href="{{ '/' }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ URL::current() == url('/contact-us') ? 'active text-red' : '' }}  red-on-hover"
                            href="{{ url('/contact-us') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link red-on-hover cursor-pointer" data-bs-toggle="modal"
                            data-bs-target="#loginPopup-2">Download Form</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ URL::current() == url('/search') ? 'active text-red' : '' }}  red-on-hover"
                                href="{{ url('/search') }}">Search</a>
                        </li>
                        <li class="nav-item mx-lg-1 mx-0">
                            <a class="nav-link {{ URL::current() == url('/profile') ? 'active text-red' : '' }}  red-on-hover"
                                href="{{ url('/profile') }}">Profile</a>
                        </li>
                        <form action="{{ route('frontend.logout') }}" method="POST">
                            @csrf
                            <li class="nav-item mx-lg-2 mx-0 mt-lg-0 mt-2">
                                <button class="btn btn-gradient">Logout</button>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-gradient mx-lg-2  mt-lg-0 mt-2 login-hover-white" href="#" data-bs-toggle="modal"
                                data-bs-target="#loginPopup">Log in</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <div class="modal fade auth-popup" id="loginPopup-2" aria-labelledby="loginPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-body">
                        <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <img src="{{ url('frontend/image/icons/icon-close.svg') }}" style="width: 51px;"
                                alt="">
                        </button>

                        <div class="auth-popup-body-form" v-if="!requested">
                            <h4 class="text-blue font-body my-3">
                                Welcome
                            </h4>
                            <div class="text-center" id="hide-msg">
                                <p>Thank You For Submitting Form, Click Below Button To Download Form</p>
                            </div>
                            <form method="POST" action="{{ route('frontend.form-download.submit') }}">
                                @csrf
                                <div class="hide-1">
                                <div class="input-group phone-number-arrow mb-3 ">
                                    <input type="text" class="input-control cust-input px-0 border-input"
                                        placeholder="Enter Full Name" required minlength="3" maxlength="30"
                                        name="full_name" value="{{ old('full_name') }}">
                                    @if (session()->has('download-from-error') && $errors->has('full_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('full_name') }}
                                        </div>
                                    @endif
                                </div>

                                    <div class="input-group phone-number-arrow mb-3 ">
                                        <input type="email" class="input-control cust-input px-0 border-input"
                                            placeholder="Enter Email ID" required name="email"
                                            value="{{ old('email') }}" minlength="5" maxlength="60">
                                        @if (session()->has('download-from-error') && $errors->has('email'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>


                                <div class="input-group phone-number-arrow mb-3 ">
                                    <input type="text" class="input-control cust-input px-0 border-input"
                                        placeholder="Enter Phone Number" name="phone_no" required minlength="10"
                                        maxlength="10" value="{{ old('phone_no') }}">
                                    @if (session()->has('download-from-error') && $errors->has('phone_no'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('phone_no') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                                @if (session()->has('download-form-url'))
                                    {{-- <script>
                                        $('#loginPopup-2').modal('show');
                                    </script> --}}
                                    {!!"<script>document.querySelector('#hide-msg').style.display='block';</script>"!!}
                                    {!!"<script>document.querySelector('.hide-1').style.display='none';</script>"!!}
                                    <a href="{{ session()->get('download-form-url') }}"
                                        class="btn btn-gradient w-100 mt-4">
                                        Download Form
                                    </a>
                                @else
                                {!!"<script>document.querySelector('#hide-msg').style.display='none';</script>"!!}
                                    <button class="btn btn-gradient w-100 mt-4" type="submit">
                                        Submit
                                    </button>
                                @endif
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @auth
        @else
            <div id="login_div">
                <!-- login Modal -->
                <div class="modal fade auth-popup" id="loginPopup" aria-labelledby="loginPopupLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <img src="{{ url('frontend/image/icons/icon-close.svg') }}" style="width: 51px;"
                                        alt="">
                                </button>
                                {{-- if otp not send --}}

                                {{-- @if ($step == 1) --}}
                                <div class="auth-popup-body" v-if="!requested">
                                    <h4 class="text-blue font-body my-4">
                                        Log In/Create Account
                                    </h4>
                                    <form v-on:submit="submitMobileNo">
                                        <div class="input-group phone-number-arrow mb-3 border-bottom">
                                            <input type="text" class="input-control cust-input px-0 border-input"
                                                placeholder="Enter Your Mobile Number" required minlength="10"
                                                maxlength="10" v-model="mobile_no">
                                        </div>
                                        <div v-if="error" v-for="(errorArray, idx) in errorTexts"
                                            :key='idx'>
                                            <div v-for="(allErrors, idx) in errorArray" :key='idx'>
                                                <span class="text-danger" v-text='allErrors'></span>
                                            </div>
                                        </div>
                                        <button class="btn btn-gradient w-100 mt-4" type="submit">
                                            Log In
                                        </button>
                                    </form>
                                </div>
                                {{-- @elseif($step == 2) --}}
                                {{-- else otp sent --}}
                                <div class="auth-popup-body" v-if="requested">
                                    <h4 class="text-blue font-body my-4">
                                        Welcome
                                    </h4>
                                    <p class="text-muted text-start">OTP Has Been Sent To Your Registered Mobile
                                        Number
                                        @{{ mobile_no }}
                                    </p>
                                    <form v-on:submit="verifyOtp">
                                        <div class="input-group phone-number-arrow mb-2">
                                            <input type="text" class="input-control px-0 border-input cust-input" placeholder="Please Enter OTP"
                                                required id="otpNew" v-model="otp">
                                        </div>
                                        @if ($errors->has('otp'))
                                            <span class="text-danger">{{ $errors->first('otp') }}</span>
                                        @endif
                                        <div class="d-block justify-content-between mb-2  left-align-text">
                                            <button type="button"
                                                class=" f-left mb-2 d-inline btn p-0 m-0 border-0 text-red"
                                                id="resend-otp-btn" id="resendOtpBtn" v-if="showResend"
                                                @click="resend">Resend OTP
                                            </button>
                                            <span class="f-right text-muted m-0 mb-2" id="otp-timer"
                                                v-if="showTimer"></span>
                                        </div>
                                        <div class="mb-1">
                                            <button type="submit" class="btn btn-gradient w-100">Submit</button>
                                        </div>
                                        <button class="text-muted text-center btn" @click="back">Back To
                                            Log In</button>
                                    </form>
                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
            <script>
                const {
                    createApp
                } = Vue;
                createApp({
                    data() {
                        return {
                            mobile_no: null,
                            otp: null,
                            requested: false,
                            error: false,
                            showTimer: false,
                            showResend: false,
                            countDown: null,
                            error: false,
                            errorTexts: '',
                            timer: 30,
                        }
                    },
                    methods: {
                        clearErrorMessage() {
                            this.error = false;
                            this.errorTexts = '';
                        },
                        sendOtp() {
                            this.clearErrorMessage();
                            axios.post("{{ route('frontend.send-otp') }}", {
                                    phone: this.mobile_no
                                })
                                .then(res => {
                                    if (res.data.success) {
                                        Snackbar.show({
                                            text: res.data.message,
                                            pos: 'top-right',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#1abc9c'
                                        });
                                        this.requested = true;
                                        this.beginTimer();
                                    }
                                    if (!res.data.success) {
                                        this.requested = false;
                                        Snackbar.show({
                                            text: res.data.message,
                                            pos: 'top-right',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#e7515a'
                                        });
                                    }
                                })
                                .catch(err => {
                                    this.requested = false;
                                    this.error = true;
                                    this.errorTexts = err.response.data.errors ?? [
                                        ['Something went wrong']
                                    ];
                                });
                        },
                        verifyOtp(e) {
                            e.preventDefault();
                            this.clearErrorMessage();
                            axios.post("{{ route('frontend.verify-otp') }}", {
                                    phone: this.mobile_no,
                                    otp: this.otp
                                })
                                .then(res => {
                                    if (res.data.success) {
                                        this.showTimer = false;
                                        this.showResend = false;
                                        Snackbar.show({
                                            text: res.data.message,
                                            pos: 'top-right',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#1abc9c'
                                        });
                                        setTimeout(() => {
                                            window.location.href = res.data.url;
                                        }, 500);
                                    } else {
                                        Snackbar.show({
                                            text: res.data.message,
                                            pos: 'top-right',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#e7515a'
                                        });
                                    }
                                })
                                .catch(err => {
                                    this.error = true;
                                    this.errorTexts = err.response.data.errors;
                                    Snackbar.show({
                                        text: "Something Went Wrong",
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                });
                        },
                        resend() {
                            this.timer = 30;
                            this.sendOtp();
                        },
                        otpNew() {
                            //    $('#otpNew').focus();
                        },
                        beginTimer() {
                            this.clearErrorMessage();
                            this.showResend = false;
                            this.countDown = window.setInterval(() => {
                                if (this.timer == -1) {
                                    clearTimeout(this.countDown);
                                    this.showTimer = false;
                                    this.showResend = true;
                                    this.otpNew();
                                } else {
                                    this.showTimer = true;
                                    $('#otp-timer').text(`Resend OTP in ${this.timer} seconds`)
                                    this.timer--;
                                    this.otpNew();
                                }
                            }, 1000);
                        },
                        submitMobileNo(e) {
                            e.preventDefault();
                            this.sendOtp();
                        },
                        back() {
                            this.requested = false;
                            this.showTimer = false;
                            this.showResend = false;
                            this.timer = 30;
                            this.clearErrorMessage();
                            clearTimeout(this.countDown);
                        }
                    },
                    created() {
                        //    console.log(this.timer) // 30
                    }
                }).mount('#login_div')
            </script>
        @endauth

    </div>
</div>
