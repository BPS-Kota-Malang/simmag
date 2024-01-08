@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Presensi Masuk'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container-fluid py-4">
        <div class="row mt-4 mx-4">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <xspan class="mx-3 fs-4">Presensi Masuk</xspan>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="content">
                        <div class="row justify-content-center">
                            <form id="presensiForm" action="{{ route('simpan-masuk') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <center>
                                        <div class="digital_clock_wrapper">
                                            <div id="digit_clock_time"></div>
                                            <div id="digit_clock_date"></div>
                                        </div>
                                        <div class="row" style="margin-top: 10px">
                                            <div class="col">
                                                <input type="hidden" id="lokasi" name="lokasi">
                                            </div>
                                        </div>
                                        <div class="row px-3">
                                            <div class="col text-center py-3">
                                                <div class="col-6 mx-auto">
                                                    <button type="submit" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Masuk</button>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <button id='takeabsen' class="btn btn-primary">tes</button> -->
                <div class="card mb-4 p-3">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col"></div>
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if ($message = Session::get('Delete'))
        <script>
            Swal.fire(
                'Deleted!',
                '{{ $message }}',
                'error'
            )
        </script>
        @endif
        @if ($message = Session::get('save_message'))
        <script>
            Swal.fire(
                'Peringatan!',
                '{{ $message }}',
                'warning'
            )
        </script>
        @endif
        @if ($message = Session::get('success_message'))
        <script>
            Swal.fire(
                'Tersimpan!',
                '{{ $message }}',
                'success'
            )
        </script>
        @endif
        @if ($message = Session::get('error_message'))
        <script>
            Swal.fire(
                'Oops!',
                '{{ $message }}',
                'error'
            )
        </script>
        @endif
    </div>
</section>

<script type="text/javascript">
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        var midday = "AM";
        midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
        hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12) : hour); /* assigning hour in 12-hour format */
        hour = changeTime(hour);
        min = changeTime(min);
        sec = changeTime(sec);
        document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */

        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        var curWeekDay = days[date.getDay()]; // get day
        var curDay = date.getDate(); // get date
        var curMonth = months[date.getMonth()]; // get month
        var curYear = date.getFullYear(); // get year
        var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
        document.getElementById("digit_clock_date").innerHTML = date;

        var t = setTimeout(currentTime, 1000); /* setting timer */
    }

    function changeTime(k) {
        /* appending 0 before time elements if less than 10 */
        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }

    currentTime();
</script>

<script>
    var lokasi = document.getElementById('lokasi');
    var form = document.getElementById('presensiForm');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successcallback, errorcallback);
    }

    function successcallback(position) {
        // Sukses mendapatkan lokasi
        var lokasi = document.getElementById('lokasi');
        lokasi.value = position.coords.latitude + "," + position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        var circle = L.circle([-8.00122092617956, 112.62118425338326], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(map);

        

    }

    function errorcallback(error) {

    };

    // $("#takeabsen").click(function(e) {

    //     var lokasi = $("#lokasi").val();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/simpan-masuk',
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //             lokasi: lokasi
    //         },
    //         cache: false,
    //         error: function(xhr) {
    //             var error = "{{ Session::get('error_message') }}"; // Mendapatkan pesan dari session
    //             Swal.fire({
    //                 title: 'Error!',
    //                 text: error,
    //                 icon: 'error',
    //                 confirmButtonText: 'OK'
    //             });
    //         }
    //     });
    // });
</script>

<style type="text/css">
    /* Google font */
    @import url('https://fonts.googleapis.com/css?family=Orbitron');

    #digit_clock_time {
        font-family: 'Work Sans', sans-serif;
        color: #FF0000;
        text-shadow: 4px 4px 10px #FF0000;
        font-size: 35px;
        text-align: center;
        padding-top: 5px;
    }

    #digit_clock_date {
        font-family: 'Work Sans', sans-serif;
        color: #FF0000;
        text-shadow: 4px 4px 10px #FF0000;
        font-size: 20px;
        text-align: center;
        padding-top: 5px;
        padding-bottom: 20px;
    }

    .digital_clock_wrapper {
        /* background-color: #333; */
        padding: 25px;
        max-width: 350px;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        margin: 0 auto;
    }
</style>

<style>
    #map {
        height: 300px;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endsection