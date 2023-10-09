<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/img/logo-icon.png')}}">
<link rel="icon" type="image/png" href="{{url('/assets/img/logo-bps.png')}}">

<!-- Flatpickr Stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<!-- Nucleo Icons -->
<link href="{{url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />

<!-- CSS Files -->
<link id="pagestyle" href="{{url('/assets/css/soft-design-system.css?v=1.0.9')}}" rel="stylesheet" />

<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

<!--   Core JS Files   -->
<script src="{{url('/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{url('/assets/js/plugins/countup.min.js')}}"></script>

<script src="{{url('/assets/js/plugins/choices.min.js')}}"></script>

<script src="{{url('/assets/js/plugins/prism.min.js')}}"></script>
<script src="{{url('/assets/js/plugins/highlight.min.js')}}"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="{{url('/assets/js/plugins/rellax.min.js')}}"></script>

<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="{{url('/assets/js/plugins/tilt.min.js')}}"></script>

<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="{{url('/assets/js/plugins/choices.min.js')}}"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="{{url('/assets/js/plugins/parallax.min.js')}}"></script>

<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="{{url('/assets/js/soft-design-system.min.js?v=1.0.9')}}" type="text/javascript"></script>

<script type="text/javascript">
    if (document.getElementById('state1')) {
        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('state2')) {
        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
        if (!countUp1.error) {
            countUp1.start();
        } else {
            console.error(countUp1.error);
        }
    }
    if (document.getElementById('state3')) {
        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
        if (!countUp2.error) {
            countUp2.start();
        } else {
            console.error(countUp2.error);
        };
    }
</script>