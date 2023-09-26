<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    @include('components.core')

    <title>
        Login SIMMAG
    </title>

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
                                @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
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
                                        <input id="email" type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" :value="old('email')" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required autocomplete="current-password">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                                    </div>
                                    <div class="text-center">
                                        <x-jet-button class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0 pt-3 pb-3">
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
                                    <a class="text-info text-gradient font-weight-bold" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                    @endif
                                </p>
                            </div>

                            <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                <p class="mb-4 mx-auto">
                                    Don't have Account?
                                    <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Register</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="../assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <!-- <img class="max-width-500 w-100 position-relative z-index-2" src="../assets/img/illustrations/chat.png"> -->
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
</body>

</html>