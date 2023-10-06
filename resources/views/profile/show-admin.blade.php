@extends('admin.admin-main', ['class' => 'g-sidenav-show bg-gray-100'])

@section('container')
    @include('components.topnav', ['title' => 'Profile'])

    <section class="pt-3 pb-4" id="count-stats">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gx-7">
                            <div class="col-md-6">
                                <p class="text-uppercase text-sm">User Information</p>
                                <form role="form" method="POST" action='{{ route('users.update', $user) }}'
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ old('name', auth()->user()->name) }}" required
                                            autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name="email" value="{{ old('email', auth()->user()->email) }}" required
                                            autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm ms-auto">Save</button>
                                </form>
                            </div>
                            <div class="col-md-6">

                                <p class="text-uppercase text-sm">Update Password</p>
                                <form method="POST" action="{{ route('ganti.password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password" class="form-control-label">Password Terkini</label>
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" required type="password" name="current_password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password" class="form-control-label">Password Baru</label>
                                        <input id="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" required>
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation" class="form-control-label">Konfirmasi Password</label>
                                        <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm ms-auto">Save</button>

                            </div>
                            <hr class="horizontal dark">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
