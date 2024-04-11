@extends ('layouts.master')

@section('title')
    <title>AgroRent</title>
@endsection

@section('style')
    <link href="{{ asset('template/css/contactUs.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <div class="contactUs">
        <div class="nav-bar">
            <div class="left-side">
                <div class="logo">
                    <img src="{{ asset('template/img/logo.png') }}" title="AgroRent" alt="AgroErent-Logo">
                </div>
            </div>

            <div class="right-side">

                <ul id="nav-links">
                    <li><a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i>Home</a></li>
                    <li><a href="{{ route('rent') }}"><i class="fa fa-bus" aria-hidden="true"></i>Rent machinery</a></li>
                    <li><a href="{{ route('buyandsell') }}"><i class="fa fa-bus" aria-hidden="true"></i>Buy machinery</a>
                    </li>
                    <li><a href="{{ route('contact') }}"><i class="fa fa-fw fa-envelope"></i>Contact Us</a></li>
                </ul>

            </div>


            @guest()
                <a href="{{ route('get.login') }}"><button id="login"><i class="fa fa-fw fa-user"></i>Login</button></a>
            @else
                <a href="{{ route('logout') }}"><button id="login"><i class="fas fa-sign-out"></i><span
                            style="margin-left: 8px">Logout</span></button></a>
            @endguest


            <button class="right-bar">
                <span class="bar"></span>
            </button>

        </div>

        <div class="mobile_nav">

            <ul id="mobile_nav_links">
                <li><a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i>Home</a></li>
                <li><a href="{{ route('rent') }}"><i class="fa fa-bus" aria-hidden="true"></i>Rent machinery</a></li>
                <li><a href="{{ route('buyandsell') }}"><i class="fa fa-bus" aria-hidden="true"></i>Buy and Sell</a>
                </li>
                <li><a href="{{ route('contact') }}"><i class="fa fa-fw fa-envelope"></i>Contact Us</a></li>
            </ul>

            @guest
                <a href="{{ route('get.login') }}"><button id="mobile_login">
                        <i class="fa fa-fw fa-user"></i>Login
                    </button></a>
            @else
                <a href="{{ route('logout') }}"><button id="mobile_login">
                        <i class="fas fa-sign-out"></i><span style="margin-left: 6px">Logout</span>
                    </button></a>
            @endguest

            <div class="mobile_footer">
                <p>Copyright&copy; 2024 AgroRent | All Rights Reserved</p>
            </div>

        </div>

        <div class="contact_container">
            <div class="heading">
                <p>Rent our Products</p>
            </div>
            <div class="sub-para">
                <p>Want to rent this machine per hour basis? Fill the form below to get in touch with AgroRent team.
                </p>
            </div>
            <div class="form-container">
                <form action="{{ route('contact') }}" method="get">
                    @csrf

                    <div class="input-row">

                        <div class="input-group">
                            <label id="fnames" for="fname">Username</label>
                            <input class="fname" id="fname" name="fname" type="text" placeholder="Your Full Name">
                        </div>

                        <div class="input-group">
                            <label id="emails" for="emial">Email Address</label>
                            <input class="email" id="email" name="email" type="text"
                                placeholder="example@youremail.com">
                        </div>

                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label id="phones" for="phone">Phone No</label>
                            <input class="phone" id="phone" name="phone" type="tele" placeholder="Your Phone No">
                        </div>

                        <div class="input-group">
                            <label id="subjects" for="subject">Subject</label>
                            <select id="subject" name="subject" name="subject">
                                <option value="General Question">General Question</option>
                                <option value="Review">Review</option>
                                <option value="About Products">About Products</option>
                            </select>
                        </div>
                    </div>

                    <label id="message" for="Message">Message</label>
                    <textarea id="Message" name="message"></textarea>
                    <button class="submit" id="submit" type="submit">Send Message</button>

            </div>

            </form>
        </div>

    </div>


    <section class="footer">
        <p>&copy;2024 AgroRent | All Rights Reserved</p>
    </section>
@endsection
