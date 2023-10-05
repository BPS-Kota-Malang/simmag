@extends('admin.admin-main', ['class' => 'g-sidenav-show bg-gray-100'])

@section('container')
    @include('components.topnav', ['title' => 'Profile'])

    <section class="pt-3 pb-4" id="count-stats">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gx-7">
                                <div class="col-md-6">
                                    <p class="text-uppercase text-sm">User Information</p>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm ms-auto">Save</button>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-uppercase text-sm">Update Password</p>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ old('address', auth()->user()->address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ old('city', auth()->user()->city) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ old('city', auth()->user()->city) }}">
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
