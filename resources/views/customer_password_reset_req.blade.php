@extends('frontend.master')

@section('content')
 <!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Password Reset Request</li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card my-5">
                <div class="card-header bg-primary">
                    <h3 class="text-white ">Password Reset Request Form</h3>
                </div>
                @if (session('reset_link'))
                    <div class="alert alert-success">{{session('reset_link')}}</div>
                @endif
                <div class="card-body">
                    <form action="{{route('password.reset.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Email Address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
