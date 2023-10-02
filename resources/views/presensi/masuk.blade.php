@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Presensi Masuk'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                <div class="row">
                    <div class="col position-relative">
                        <div class="p-3 text-center">
                            <!-- <h1 class="text-gradient text-primary"><span id="state1" countTo="70">0</span>+</h1> -->
                            <h4 class="mt-3">Silahkan Absen Masuk Disini!!!</h4>
                        </div>
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
                                                        <!-- <div class="col" style="font-size: 18px;">Jam Masuk</div>
                                                        <div class="jam" style="font-size: 36px; font-weight: bold;">07.30</div> -->
                                                        <button type="submit" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Masuk</button>
                                                        <!-- <hr class="vertical dark"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <!-- <center>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Klik Untuk Presensi Masuk</button>
                                                </div>
                                            </center> -->
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="digital_clock_wrapper">
                    <div id="digit_clock_time"></div>
                    <div id="digit_clock_date"></div>
                </div>
                <div class="row px-3">
                    <div class="col text-center py-3">
                        <div class="col-6 mx-auto">
                            <div class="col" style="font-size: 18px;">Jam Masuk</div>
                            <div class="jam" style="font-size: 36px; font-weight: bold;">07.30</div>
                            <button type="submit" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Masuk</button> -->

                            <!-- <hr class="vertical dark"> -->
                            
                        <!-- </div>
                    </div>
                    <div class="col text-center py-3">
                        <div class="col-6 mx-auto ">
                            <div class="col" style="font-size: 18px;">Jam Pulang</div>
                            <div class="jam" style="font-size: 36px; font-weight: bold;">15.00</div>
                            <button type="button" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Pulang</button> -->

                            <!-- <hr class="vertical dark"> -->

                        <!-- </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-primary"> <span id="state2" countTo="15">0</span>+</h1>
                                <h5 class="mt-3">Design Blocks</h5>
                                <p class="text-sm">Mix the sections, change the colors and unleash your creativity</p>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-primary" id="state3" countTo="4">0</h1>
                                <h5 class="mt-3">Pages</h5>
                                <p class="text-sm">Save 3-4 weeks of work when you use our pre-made pages for your website</p>
                            </div>
                        </div> -->
        </div>
    </div>
    </div>
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