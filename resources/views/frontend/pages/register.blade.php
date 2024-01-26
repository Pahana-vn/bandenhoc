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
            <li>Register</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->

<div class="login-page mt-100">
    <div class="container">
        <form action="{{route('fe.register')}}" method="POST" class="login-form common-form mx-auto">
            @csrf
            <div class="section-header mb-3">
                <h2 class="section-heading text-center">Register</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <fieldset>
                        <label class="label">Full name</label>
                        <input type="text" id="fullname" name="fullname" value="{{old('fullname',isset($load)?$load->fullname:null)}}" />
                        {!!$errors->first("fullname",' <p class="help-block text-danger">:message
                            Please provide a valid fullname.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Address</label>
                        <input type="text" id="address" name="address" value="{{old('address',isset($load)?$load->address:null)}}" />
                        {!!$errors->first("address",' <p class="help-block text-danger">:message
                            Please provide a valid address.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email',isset($load)?$load->email:null)}}" />
                        {!!$errors->first("email",' <p class="help-block text-danger">:message
                            Please provide a valid email.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Phone</label>
                        <input type="number" id="phone" name="phone" value="{{old('phone',isset($load)?$load->phone:null)}}" />
                        {!!$errors->first("phone",' <p class="help-block text-danger">:message
                            Please provide a valid phone.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Username</label>
                        <input type="username" id="username" name="username" value="{{old('username',isset($load)?$load->username:null)}}" />
                        {!!$errors->first("username",' <p class="help-block text-danger">:message
                            Please provide a valid username.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Password</label>
                        <input type="password" id="password" name="password" value="{{old('password',isset($load)?$load->password:null)}}" />
                        {!!$errors->first("password",' <p class="help-block text-danger">:message
                            Please provide a valid password.
                        </p>') !!}
                    </fieldset>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn-primary d-block mt-3 btn-signin">CREATE</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
