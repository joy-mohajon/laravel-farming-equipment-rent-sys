@extends ('layouts.master')

@section('title')
    <title>Signup</title>
@endsection

@section('style')
    <link href="{{ asset('template/css/registration.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <div class="container">
        <div class="left-side">
            <p>welcome to our<br>website</p>
        </div>

        <div class="content-side">
            <div class="login-heading">
                <img src="{{ asset('template/img/logo.png') }}" title="AgroErent" alt="AgroErent">
            </div>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="sub-heading">
                <p>Create Your Free Account</p>
            </div>
            <div id="error"></div>
            <div class="form">
                <form id="form" action="{{ route('post.signup') }}" method="post">
                    @csrf

                    <label for="fname">Username</label><br>
                    <input class="fname" id="UserName" name="name" type="text" value="{{ old('name') }}"
                        placeholder="Sample852#" required><br>

                    <label for="email">Email</label><br>
                    <input class="email" id="Email" name="email" type="email" value="{{ old('email') }}"
                        placeholder="Example@email.com" required><br>

                    <label for="password">New Password</label><br>
                    <input class="password" id="password" name="password" type="password" placeholder="Enter Password"
                        required><br>


                    <label for="cpassword">Confirm Password</label><br>
                    <input class="cpassword" id="Cpassword" name="password_confirmation" type="password"
                        placeholder="Confirm Password" required><br>

                    <div class="form-group">
                        {{-- <label for="userRole">Choose Role</label> --}}
                        <select class="custom_select" id="userRole" name="role" required>
                            <option disabled selected>Register as..</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"> {{ $role->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error style="color: red" :messages="$errors->first('role')" />
                    </div>

                    <input id="submit" name="submit" type="submit" value="Create your account">

                </form>
            </div>

            <div class="sign-in-option">
                <p>Already have an account? <a href="{{ route('get.login') }}">Sign in</a></p>
            </div>
        </div>
    </div>
@endsection
