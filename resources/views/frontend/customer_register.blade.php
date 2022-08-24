@extends('frontend.master')

@section('content')
<!-- register_section - start
================================================== -->
<section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <ul class="nav register_tabnav ul_li_center" role="tablist">
                    <li role="presentation">
                        <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Sign In</button>
                    </li>
                    <li role="presentation">
                        <button data-bs-toggle="tab" data-bs-target="#signup_tab" type="button" role="tab" aria-controls="signup_tab" aria-selected="false">Register</button>
                    </li>
                </ul>
                @if (session('email_verify'))
                    <div class="alert alert-success"><strong>{{session('email_verify')}}</strong></div>
                @endif
                @if (session('verify'))
                    <div class="alert alert-success"><strong>{{session('verify')}}</strong></div>
                @endif
                @if (session('need_verify'))
                    <div class="alert alert-warning"><strong>{{session('need_verify')}}</strong></div>
                @endif
                <div class="register_wrap tab-content">
                    <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                        <form action="{{route('customer.login')}}" method="POST">
                            @csrf
                            <div class="form_item_wrap">
                                <h3 class="input_title">Email</h3>
                                <div class="form_item">
                                    <label for="username_input"><i class="fas fa-user"></i></label>
                                    <input id="username_input" type="email" name="email" placeholder="User email">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Password*</h3>
                                <div class="form_item">
                                    <label for="password_input"><i class="fas fa-lock"></i></label>
                                    <input id="password_input" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox_item">
                                    <a href="{{route('password.reset.req')}}" >Forgot Your Password?</a>
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <button type="submit" class="btn btn_primary">Sign In</button>
                                <a href="{{url('/github/redirect')}}" class="btn btn_primary">Sign In With Github</a>
                                <a href="{{url('/google/redirect')}}" class="btn btn_primary">Sign In With Google</a>
                                <br>
                                <br>
                                <a href="{{url('/facebook/redirect')}}" class="btn btn_primary">Sign In With Facebook</a>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="signup_tab" role="tabpanel">
                        <form action="{{route('customer.store')}}" method="POST">
                            @csrf
                            <div class="form_item_wrap">
                                <h3 class="input_title">User Name*</h3>
                                <div class="form_item">
                                    <label for="username_input2"><i class="fas fa-user"></i></label>
                                    <input id="username_input2" type="text" name="name" placeholder="User Name">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Email*</h3>
                                <div class="form_item">
                                    <label for="email_input"><i class="fas fa-envelope"></i></label>
                                    <input id="email_input" type="email" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <h3 class="input_title">Password*</h3>
                                <div class="form_item">
                                    <label for="password_input2"><i class="fas fa-lock"></i></label>
                                    <input id="password_input2" type="password" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="form_item_wrap">
                                <button type="submit" class="btn btn_secondary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register_section - end
================================================== -->
@endsection
