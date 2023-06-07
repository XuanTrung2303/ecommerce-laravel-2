    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
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
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> oganic@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
