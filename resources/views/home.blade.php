@extends ('layouts.master')

@section('title')
    <title>AgroRent</title>
@endsection

@section('style')
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <div class="home">
        <div class="nav-bar">
            <div class="left-side">
                <div class="logo">
                    <img src="{{ asset('template/img/logo.png') }}" title="AgroRent" alt="AgroErent-Logo" />
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

        <div class="hero-image">
            <video autoplay muted>
                <source src="{{ asset('template/img/video.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </div>

    <div class="sub-home">
        <div class="looking-for">
            <div class="card">
                <div class="img">
                    <img src="{{ asset('template/img/machine-1.jpeg') }}" />
                </div>
                <div class="description">
                    <p>looking to buy a machine?</p>
                    <a href="{{ route('dashboard') }}"><span id="arrow">&rarr;</span></a>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="{{ asset('template/img/machine-2.jpeg') }}" />
                </div>
                <div class="description">
                    <p>looking to rent a machine?</p>
                    <a href="{{ route('dashboard') }}"><span id="arrow">&rarr;</span></a>
                </div>
            </div>

            <div class="card">
                <div class="img">
                    <img src="{{ asset('template/img/machine-3.jpeg') }}" />
                </div>
                <div class="description">
                    <p>
                        looking to sell a machine?
                        <a href="{{ route('dashboard') }}"><span id="arrow">&rarr;</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="sub-hero-image" id="sub-hero-image"></div>

    <div class="about-agzone">
        <div class="about">
            <div class="image">
                <p id="inc">About AgroRent</p>
                <img src="{{ asset('template/img/AgroErent.jpg') }}" />
            </div>
            <div class="about-para">
                <p>
                    Farming equipment rental system - <span>AgroRent</span> is a
                    bangladeshi digital platorm which enables farmers or user to search
                    for what kind of equipment they want. They can book an equipment for
                    daily or monthly basis. Every farmer does not have sufficient money
                    to buy every equipment which is required for farming. So, here we
                    are trying to provide service to farmer or user that they can take
                    equipment on rent per hour basis. Also one can sell their machine if
                    they want and farmer can buy machine at cheaper rate from this
                    platorm. Comprehensive services that deliver equipment’s when and
                    where needed, with minimum waste of resources.
                </p>
            </div>
        </div>
    </div>

    <section class="services">
        <div class="heading">
            <p>Our Services</p>
        </div>
        <div class="service-image"></div>

        <div class="cards">
            <div class="actual-card">
                <div class="card-image">
                    <img src="{{ asset('template/img/buy (2).png') }}" />
                </div>
                <div class="content">
                    <div class="head"></div>
                    <p id="para">
                        Farmer can buy an equipment at cheaper rate from here. Want to
                        learn more?
                    </p>
                    <a href="{{ route('dashboard') }}">
                        <p id="more">Learn More</p>
                    </a>
                </div>
            </div>
            <div class="actual-card">
                <div class="card-image">
                    <img src="{{ asset('template/img/sell (2).png') }}" />
                </div>
                <div class="content">
                    <div class="head"></div>
                    <p id="para">
                        Farmer can sell an equipment for the sake of helping others. Want
                        to learn more?
                    </p>
                    <a href="{{ route('dashboard') }}">
                        <p id="more">Learn More</p>
                    </a>
                </div>
            </div>
            <div class="actual-card">
                <div class="card-image">
                    <img src="{{ asset('template/img/rent (2).png') }}" />
                </div>
                <div class="content">
                    <div class="head"></div>
                    <p id="para">
                        Farmer can rent an equipment per hour basis from here. Want to
                        learn more?
                    </p>
                    <a href="{{ route('dashboard') }}">
                        <p id="more">Learn More</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <p>&copy;2024 AgroRent | All Rights Reserved</p>
    </section>
@endsection
