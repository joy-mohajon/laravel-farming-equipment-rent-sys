@extends ('layouts.master')

@section('title')
    <title>Login</title>
@endsection

@section('style')
    <link href="{{ asset('template/css/loginStyle.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <div class="container">
        <div class="image-side"></div>
        <div class="content-side">
            <div class="login-heading">
                <img src="{{ asset('template/img/logo.png') }}" title="AgroErent" alt="AgroErent">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p id="sub-heading-1">Login</p>
            <p id="sub-heading-2">Log to your account</p>
            <p id="sub-heading-3">Thank you for get back to AgroRent,lets access our the best recommendation for you</p>
            <div class="form">
                <form action="{{ route('post.login') }}" method="post">
                    @csrf

                    <label for="email">Email</label><br>
                    <input class="username" id="email" name="email" type="email" placeholder="Email or Phone Number"
                        required>

                    <label for="Password">Password</label><br>
                    <input class="Password" id="Password" name="password" type="password" placeholder="Password" required>

                    <div class="rememberme">
                        <div class="rem">
                            <input id="remember-me-check" type="checkbox">
                            <label id="rem" for="remember-me">Remember me</label>
                        </div>
                        <a id="reser-password" href="{{ route('get.forgot.password') }}">Reset Password?</a>
                    </div>
                    <button class="submit" name="submit" type="submit">Sign In</button>
                </form>
            </div>
            <p id="footer">Don't have an account yet? <a href="{{ route('get.signup') }}">Register here</a></p>
        </div>
    </div>
@endsection
