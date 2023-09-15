<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login Simmag
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.9" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="sign-in-illustration">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder">Log In</h4>
                                <x-jet-validation-errors class="mb-0" />
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="email" type="email" class="form-control form-control-lg"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                            name="email" :value="old('email')" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control form-control-lg"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remember_me"
                                            name="remember">
                                        <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                                    </div>
                                    <div class="text-center">
                                        <x-jet-button
                                            class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0 pt-3 pb-3">
                                            <span style="font-size: 16px">
                                                {{ __('Log in') }}
                                            </span>
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    @if (Route::has('password.request'))
                                        <a class="text-info text-gradient font-weight-bold"
                                            href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div
                            class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="../assets/img/shapes/pattern-lines.svg" alt="pattern-lines"
                                class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2"
                                    src="../assets/img/illustrations/chat.png">
                            </div>
                            <h4 class="mt-5 text-white font-weight-bolder">"Attention is the new currency"</h4>
                            <p class="text-white">The more effortless the writing looks, the more effort the writer
                                actually put
                                into the process.</p>
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
