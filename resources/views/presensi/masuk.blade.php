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
                            <form action="{{ route('simpan-masuk') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <center>
                                        <div class="digital_clock_wrapper">
                                            <div id="digit_clock_time"></div>
                                            <div id="digit_clock_date"></div>
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
            </div>
        </div>
    </div>

    @if ($message = Session::get('Delete'))
    <script>
        Swal.fire(
            'Deleted!',
            '{{ $message }}',
            'success'
        )
    </script>
    @endif
    @if ($message = Session::get('save_message'))
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ $message }}',
            'success'
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

@endsection