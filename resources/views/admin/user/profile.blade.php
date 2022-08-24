@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Name Change</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/profile/name/update') }} " method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="form-label"> Name Change</label>

                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Password Change</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/profile/password/update') }} " method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Old Password</label>

                            <input type="password" name="old_password" class="form-control">
                            @if (session('wrong_pass'))
                                <strong class="text-danger mt-2"> {{ session('wrong_pass') }} </strong>
                            @endif

                            @if (session('same_pass'))
                                <strong class="text-danger mt-2"> {{ session('same_pass') }} </strong>
                            @endif
                            @error('old_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror



                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">New Password</label>

                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Confirm Password</label>

                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Picture Change</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/profile/photo/update') }} " method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary btn-sm" type="submit">Button</button>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="profile_photo" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                                @error('profile_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="custom-file mb-4">
                            <input type="file" name="profile_photo" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                            @error('profile_photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
