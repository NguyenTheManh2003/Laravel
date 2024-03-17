<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-menu li {
        list-style: none;
        padding: 10px;
    }

    .dropdown-menu li a {
        text-decoration: none;
        color: #333;
        display: block;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

<head>
    <!-- CSS Bootstrap -->


    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>
        Giftos</title>
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}frontend/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/') }}frontend/css/responsive.css" rel="stylesheet" />
</head>

<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="">
                <span>
                    REDSTORE
                </span>
                {{-- <a><img src="frontend\images/logo-white.png" width="125px" alt=""></a> --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/productsPage/">
                            PRODUCT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.html">
                            ABOUT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact.contact') }}" class="nav-link" href="contact.html">CONTACT</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>ACCOUNT</span>
                    <ul class="dropdown-menu">
                        @guest <!-- Check if the user is a guest (not logged in) -->
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('reg.index') }}">Register</a></li>
                        @else
                            <!-- If the user is logged in -->
                            <li>Welcome, {{ Auth::user()->name }}</li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endguest
                    </ul>
                </div>

                <div class="user_option">
                    <a href="{{ route('shopping.cart') }}">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                    {{-- <span class="text-danger" id="cart-quantity">({{ count(session('cart')) }})</span> --}}
                    @if (session('cart'))
                        <span class="text-danger" id="cart-quantity">({{ count(session('cart')) }})</span>
                    @else
                        <span class="text-danger" id="cart-quantity">(0)</span>
                    @endif

                    {{-- <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form> --}}
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    @section('banner')
        <section class="slider_section">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Welcome To Our <br>
                                                REDSHOP
                                            </h1>
                                            <p>
                                                Giảm giá và Ưu đãi: Thông báo về các chương trình giảm giá, ưu đãi đặc
                                                biệt hoặc các mã giảm giá để thu hút người dùng mua sắm.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="frontend/images/image1.png" alt="" width= />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Welcome To Our <br>
                                                REDSHOP
                                            </h1>
                                            <p>
                                                Khuyến mãi mùa: Thông báo về các chương trình khuyến mãi đặc biệt cho
                                                các dịp lễ, mùa, hoặc sự kiện đặc biệt như Black Friday, Giáng Sinh, Tết
                                                Nguyên Đán, vv.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="frontend/images/image1.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Welcome To Our <br>
                                                REDSHOP
                                            </h1>
                                            <p>
                                                Thông báo về vận chuyển và giao hàng: Cập nhật thông tin về chính sách
                                                vận chuyển, giao hàng mới hoặc các dịch vụ vận chuyển đặc biệt.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="frontend/images/image1.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <img src="images/line.png" alt="" />
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @yield('captcha')


    <!-- end slider section -->
</div>
