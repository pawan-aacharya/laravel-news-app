@extends('frontend.frontendLayout.mainLayout')
@push('title')
    <title>register</title>
@endpush
@section('mainContent')
    <section class="login-signup section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="signup">
                        <div class="text-center"><a href=""><img
                                    src="{{ asset('frontend/theme/images/logos/logo.png') }}" alt=""
                                    class="img-fluid"></a></div>
                        <h3 class="mt-4">Sign Up Here</h3>
                        <p class="mb-5">Join with us and feel better</p>
                        <form action="{{ route('register.store') }}" method="POST" class="signup-form row">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="f-name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="First name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email-address">Email</label>
                                    <input type="email" class="form-control" name="email" id="email-address"
                                        placeholder="Enter a valid mail">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-s">Password</label>
                                    <input type="password" class="form-control" id="password-s" name="password"
                                        placeholder="A strong password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-s">Password</label>
                                    <input type="password" class="form-control" id="password-s" name="password_confirmation"
                                        placeholder="A strong password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                                <p class="mt-5 mb-0">Already a member? <a href="{{ route('login') }}">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
