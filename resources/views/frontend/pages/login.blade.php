@extends('frontend.layoutFE')
@section('contentFE')
 <!-- breadcrumb start -->
 <div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="{{route('fe.home')}}">Home</a></li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Login</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->
<div class="login-page mt-100">
    <div class="container">

        <form action="{{route('fe.login')}}" method="POST" class="login-form common-form mx-auto">
            @csrf

            <div class="section-header mb-3">
                <h2 class="section-heading text-center">Login</h2>
            </div>

            @if (Session::has('note'))
                <div id="success">{{Session::get('note')}}</div>
            @endif

                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email</label>
                            <input type="email" name="email" />
                            {!!$errors->first("email",' <p class="help-block text-danger">:message
                                Please provide a valid email. </p>') !!}
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input type="password" name="password" />
                            {!!$errors->first("password",' <p class="help-block text-danger">:message
                                Please provide a valid password. </p>') !!}
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <div style="display: flex; text-align: text-align: center; none">
                            <input style="width: 20px;" type="checkbox" name="remember">
                            <span style="margin-top: 7px; margin-left: 10px" id="remember"> Remember</span>
                            <a style="margin-left: 88px; margin-top: 9px" href="{{route('fe.forget')}}" class="text_14 d-block">Forgot your password?</a>
                        </div>

                        <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                        <a href="{{route('fe.register')}}" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                    </div>
                </div>

        </form>
    </div>
</div>

@endsection
