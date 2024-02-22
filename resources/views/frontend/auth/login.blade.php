@extends('frontend.frontendLayout.mainLayout')
@push('title')
    <title>login</title>
@endpush
@section('mainContent')
    <section class="login-signup section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="login">
                        <div class="text-center"><a href="index.html"><img src="{{asset('frontend/theme/images/logos/logo.png')}}" alt=""
                                    class="img-fluid"></a></div>

                        <h3 class="mt-4">Login Here</h3>
                        <p class="mb-5">Enter your valid mail & password</p>
                        <form action="{{route('login.store')}}" class="login-form row" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="loginemail">Email</label>
                                    <input type="text" id="loginemail" class="form-control" name="email"
                                        placeholder="Enter mail" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="loginPassword">Password</label>
                                    <input type="password" id="loginPassword" class="form-control" name="password"
                                        placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Login</button>

                                <p class="mt-5 mb-0">Not a member yet? <a href="{{route('register')}}">Register Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
