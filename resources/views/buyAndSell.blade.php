@extends ('layouts.master')

@section('title')
    <title>AgroRent</title>
@endsection

@section('style')
    <link href="{{ asset('template/css/Buy and Sell.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <section class="header">
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
        </div>

    </section>

    <div class="hero-image">

        <div class="rent-a-machine-text">
            <h1>Want to Buy a Machine?</h1>
        </div>
    </div>

    <section class="Add-Post">
        <!-- <button class="post_btn">
                            Add Post
                        </button> -->

    </section>

    <!--Products-->
    <section class="rent-box">

        <!--Garden Tractor-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/garden-tractor.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Garden Tractor</p>
            </div>
            <div class="price">
                <p>৳ 34,0000</p>
                <div class="star1">☆</div>
                <div class="star1">☆</div>
                <div class="star1">☆</div>
                <div class="star1">☆</div>
                <div class="star1">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Dumb Truck-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/dumb truck.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Dumb Truck</p>
            </div>
            <div class="price">
                <p>৳ 54,55,000</p>
                <div class="star4">☆</div>
                <div class="star4">☆</div>
                <div class="star4">☆</div>
                <div class="star4">☆</div>
                <div class="star4">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Utility Tractor-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/utility-tractor.jpg') }}">
            </div>
            <div class="machine-name">
                <p>utility Tractor</p>
            </div>
            <div class="price">
                <p>৳ 34,22,640</p>
                <div class="star8">☆</div>
                <div class="star8">☆</div>
                <div class="star8">☆</div>
                <div class="star8">☆</div>
                <div class="star8">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--excavator-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/excavator.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Excavator</p>
            </div>
            <div class="price">
                <p>৳ 5,74,000</p>
                <div class="star2">☆</div>
                <div class="star2">☆</div>
                <div class="star2">☆</div>
                <div class="star2">☆</div>
                <div class="star2">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Cement Mixer-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/cement-mixer.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Cement Mixer</p>
            </div>
            <div class="price">
                <p>৳ 2,52,000</p>
                <div class="star5">☆</div>
                <div class="star5">☆</div>
                <div class="star5">☆</div>
                <div class="star5">☆</div>
                <div class="star5">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Mover-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/mover.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Mover</p>
            </div>
            <div class="price">
                <p>৳ 2,46,000</p>
                <div class="star3">☆</div>
                <div class="star3">☆</div>
                <div class="star3">☆</div>
                <div class="star3">☆</div>
                <div class="star3">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Fork Lift-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/fork-lift.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Fork Lift</p>
            </div>
            <div class="price">
                <p>৳ 1,63,000</p>
                <div class="star6">☆</div>
                <div class="star6">☆</div>
                <div class="star6">☆</div>
                <div class="star6">☆</div>
                <div class="star6">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

        <!--Earth Moving truck-->
        <div class="boxes">
            <div class="hero_img">
                <img src="{{ asset('template/img/earth-moving-truck.jpg') }}">
            </div>
            <div class="machine-name">
                <p>Earth Moving Truck</p>
            </div>
            <div class="price">
                <p>৳ 7,21,000</p>
                <div class="star7">☆</div>
                <div class="star7">☆</div>
                <div class="star7">☆</div>
                <div class="star7">☆</div>
                <div class="star7">☆</div>
            </div>
            <div class="rent">
                <a href="{{ route('dashboard') }}">Buy</a>
                {{-- <a href="{{ route('dashboard') }}">Sell</a> --}}
            </div>
        </div>

    </section>


    <section class="footer">
        <p>&copy;2024 AgroRent | All Rights Reserved</p>
    </section>
@endsection
