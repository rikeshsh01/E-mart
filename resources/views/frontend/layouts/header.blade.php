<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789" href="#"><span
                                        class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="profile-pic" href="#">
                                            @if (Auth::user()->photo)
                                                <img src="{{ Auth::user()->photo }}" alt="img" width="30"
                                                    style="border-radius: 50%;">
                                            @else

                                                <img src="{{ Helper::userDefaultImage() }}" alt="img" width="30"
                                                    style="border-radius: 50%;">

                                            @endif
                                            @php
                                                $first_name = explode(' ', auth()->user()->full_name);
                                            @endphp
                                            <span class="text-white font-medium">{{ $first_name[0] }}</span>
                                        </span>



                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li class="menu-item"><a title="Dashboard"
                                                href="{{ route('user.account') }}">Dashboard</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('user.order') }}">Order List</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('user.wishlist') }}">Wish List</a></li>
                                        <li class="menu-item"><a title="My Account"
                                                href="{{ route('user.myaccount') }}">My Account</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('user.logout') }}">LogOut</a></li>
                                    </div>
                                </div>


                            @else
                                <div class="dropdown">
                                    <button class=" dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Log In
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('user.auth') }}">Login</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('user.register') }}">Register</a></li>
                                    </div>
                                </div>


                            @endauth

                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="/" class="link-to-home"><img src="{{ asset('frontend/assets/images/logoo.png') }}"
                                alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>

                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">All Category</a>



                                    <ul class="list-cate">
                                        @foreach ($topCategories as $item)
                                            <li class="level-1">
                                                <a
                                                    href="{{ route('product-category', $item->id) }}">{{ $item -> title }}</a>

                                                @foreach ($item -> child as $child)

                                                    <li class="level-2">
                                                        <a
                                                            href="{{ route('product-category', $child->id) }}">{{ $child->title }}</a>
                                                    </li>

                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>


                                    {{-- <ul class="list-cate">
										
										<li class="level-1">-Electronics</li>
										<li class="level-2">Batteries & Chargens</li>
										<li class="level-2">Headphone & Headsets</li>
										<li class="level-2">Mp3 Player & Acessories</li>
										
									</ul> --}}
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="{{route('wishlist')}}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">{{Cart::instance('wishlist')->count()}}</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('cart.list')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">{{Cart::instance('shopping')->count()}}</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                    class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div>

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                        aria-hidden="true"></i></a>
                            </li>

                            <li class="menu-item">
                                <a href="" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="shop.html" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('cart.list')}}" class="link-term mercado-item-title ">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('cart.checkout1')}}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item">
                                <a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
