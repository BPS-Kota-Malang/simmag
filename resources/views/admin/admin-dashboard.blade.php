@extends('admin.admin-main', ['class' => 'g-sidenav-show bg-gray-100'])

@section('container')
@include('components.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        @if (Auth::user()->isSuperAdmin())
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('user-management') }}">Total User</a>
                                <h5 class="font-weight-bolder">
                                    {{ $totaluser }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <a href="{{ url('user-management') }}"><i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('data/divisi') }}">Total Divisi</a>
                                <h5 class="font-weight-bolder">
                                    {{ $totaldivisi }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <a href="{{ url('data/divisi') }}"><i class="fas fa-building text-lg opacity-10" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('data/divisi') }}">Total Pengajuan Magang</a>
                                <h5 class="font-weight-bolder">
                                    {{ $totaldaftar }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <a href="{{ url('data/divisi') }}"><i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->isAdmin())
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('anggota-divisi') }}">Total Anggota Divisi</a>
                                <h5 class="font-weight-bolder">
                                    {{ $totalanggota }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <a href="{{ url('user-management') }}"><i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->isUser())
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('rekap-user') }}">Total Jam Kerja</a>
                                <h5 class="font-weight-bolder">
                                    {{ $totaljamkerjaformatted }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <a href="{{ url('rekap-user') }}"><i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    <div class="mt-8">
    @include('components/footer')
    </div>
</div>
@endsection