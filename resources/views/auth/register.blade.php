<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    @include('components.core')

    <title>
        Register SIMMAG
    </title>
</head>

<body class="sign-in-illustration">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <x-jet-validation-errors class="mb-4" />
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder">Register</h4>
                                <p class="mb-0">Enter your email and password to register</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <label>{{ __('Name') }}</label>
                                    <div class="mb-3">
                                        <input type="text" id="name" class="form-control" placeholder="Name" aria-label="Name" name="name" :value="old('name')" required autofocus autocomplete="name">
                                    </div>
                                    <label>{{ __('Email') }}</label>
                                    <div class="mb-3">
                                        <input type="email" id="email" class="form-control" placeholder="Email" aria-label="Email" name="email" :value="old('email')" required>
                                    </div>
                                    <label>{{ __('Password') }}</label>
                                    <div class="mb-3">
                                        <input type="password" id="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required autocomplete="new-password">
                                    </div>
                                    <label>{{ __('Confirm Password') }}</label>
                                    <div class="mb-3">
                                        <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="text-center">
                                        <x-jet-button class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0 pt-3 pb-3">
                                            <span style="font-size: 16px">
                                                {{ __('Register') }}
                                            </span>
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                <p class="mb-4 mx-auto">
                                    {{ __('Already registered?') }}
                                    <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">Log in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="../../assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <!-- <img class="max-width-500 w-100 position-relative z-index-2"
                                    src="../../assets/img/illustrations/chat.png" alt="image"> -->
                            </div>
                            <h4 class="mt-5 text-white font-weight-bolder">Website Pendaftaran Magang</h4>
                            <h4 class="text-white font-weight-bolder">BPS Kota Malang</h4>
                            <p class="text-white">Silahkan registrasi dan daftarkan pengajuan magang Anda melalui website kami</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="../assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="../assets/js/soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>
</body>

</html>