    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> oganic@colorlib.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @guest()
                            <div class="header__top__right">
                                <div class="header__top__right__language header__top__right__auth">
                                    <a class="d-line" href="{{ route('login') }}"><i class="fa fa-user"></i>
                                        Login</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                                </div>
                            </div>
                        @else
                            <div class="header__top__right">
                                <div class="header__top__right__language header__top__right__auth ">
                                    <div><a class="d-line" href="#"><i class="fa fa-user"></i>
                                            {{ auth()->user()->name }}</a></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="#">Profile</a></li>
                                    </ul>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="#"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i
                                            class="fa fa-user"></i> Logout</a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('homepage') }}"><img src="{{ asset('frontend/img/logo.png') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                            <li><a href="#">Shop</a>
                                <ul class="header__menu__dropdown">
                                    @foreach ($menu_categories as $menu_category)
                                        <li><a
                                                href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <ul class="header__menu__dropdown">
                                @foreach ($menu_categories as $menu_category)
                                    <li><a
                                            href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 0288.000.000</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
