<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('page-title') Easy Shoppy</title>
    <!--Favicon Show-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo-favicon') }}/{{ $setting->favicon }}">
    <!--Font Awesome Link-->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<!--All Css Files-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/color-01.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/custom_style.css">
    <!--Css cdn link-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
                                <!--Hotline-->
								<li class="menu-item" >
									<a title="Hotline: {{ $setting->phone }}" href="{{ route('contact') }}" ><span class="icon label-before fa fa-mobile"></span>Hotline: {{ $setting->phone }}</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-en.png')}}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-hun.png')}}" alt="lang-hun"></span>Bangla</a></li>
									</ul>
								</li>
                                <!--Authentication Check & Login, Register-->
								@if(Route::has('login'))
									@auth
                                        <!--Admin & Role Admin Auth Check-->
										@if(Auth::user()->utype === 'ADM' || Auth::user()->utype === 'ROLE_ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('admin.dashboard')}}"><i class="fa fa-home" style="margin-right: 4px;"></i>Dashboard</a>
													</li>
                                                    @if (Auth::user()->user_role == 1)
                                                        <li class="menu-item" >
                                                            <a title="User Role" href="{{ route('admin.user.role') }}"><i class="fa fa-user" style="margin-right: 4px;"></i>User Role</a>
                                                        </li>
                                                    @endif
                                                    @if (Auth::user()->settings == 1)
                                                        <li class="menu-item" >
                                                            <a title="Settings" href="{{ route('admin.settings') }}"><i class="fa fa-gear" style="margin-right: 4px;"></i>Settings</a>
                                                        </li>
                                                    @endif
													<li class="menu-item" >
														<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" style="margin-right: 4px;"></i>Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
                                        <!--Customer Auth Check-->
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('user.dashboard')}}"><i class="fa fa-home" style="margin-right: 4px;"></i>Dashboard</a>
													</li>
													<li class="menu-item" >
														<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" style="margin-right: 4px;"></i>Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
										@endif
									@else
                                        <!--Login Register Button-->
										<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
                            <!--Website Logo-->
							<a href="/" class="link-to-home">
                                <img src="{{asset('assets/images/logo-favicon')}}/{{ $setting->logo }}" alt="mercado">
                            </a>
						</div>
                        <!--Search Component Show-->
						@livewire('front-end.header-search-component')

						<div class="wrap-icon right-section">
                            <!--Wishlist Count Component-->
							@livewire('front-end.wishlist-count-component')
                            <!--Cart Count Component-->
							@livewire('front-end.cart-count-component')

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
                        <!--Weekly Featured, Hot Sale, Top New, Top Selling & Top Rated Product Container-->
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>

					<div class="primary-nav-section">
                        <!--Navigation Menu Container-->
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
                                <!--All Categories Fetch-->
                                @php
                                    $categories = App\Models\Category::where('active_status', 1)->get();
                                @endphp
                                <!--Categories Count-->
                                @if ($categories->count() > 0)
                                    <li class="menu-item menu-item-has-children parent dropdown">
                                        <a title="Categories" href="#" data-toggle="dropdown">Categories <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu" style="margin-left: 45px;">
                                            <!--All Categories Show-->
                                            @foreach ($categories as $category)
                                                <li class="menu-item"><a href="{{route('product.category',['category_slug'=>$category->slug])}}"><img src="{{ asset('assets/images/category') }}/{{ $category->icon }}" width="16" height="16" />{{ $category->name }}</a></li>
                                                <hr class="divider"/>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                                <!--All Menu Item-->
								<li class="menu-item">
									<a href="{{ route('shop') }}" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="{{ route('product.cart') }}" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="{{ route('checkout') }}" class="link-term mercado-item-title">Checkout</a>
								</li>
                                <li class="menu-item">
									<a href="{{ route('blogs') }}" class="link-term mercado-item-title">Blogs</a>
								</li>
								<li class="menu-item">
									<a href="{{ route('contact') }}" class="link-term mercado-item-title">Contact Us</a>
								</li>
                                <li class="menu-item">
									<a href="{{ route('about') }}" class="link-term mercado-item-title">About Us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{$slot}}
    <!--Footer Component-->
	@livewire('front-end.footer-component')
    <!--All JS Files-->
	<script src="{{asset('/')}}assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('/')}}assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
	<script src="{{asset('/')}}assets/js/jquery.flexslider.js"></script>
	<script src="{{asset('/')}}assets/js/chosen.jquery.min.js"></script>
	<script src="{{asset('/')}}assets/js/owl.carousel.min.js"></script>
	<script src="{{asset('/')}}assets/js/jquery.countdown.min.js"></script>
	<script src="{{asset('/')}}assets/js/jquery.sticky.js"></script>
	<script src="{{asset('/')}}assets/js/functions.js"></script>
	<script src="{{asset('/')}}assets/js/sweetalert.min.js"></script>
    <!--All JS cdn-->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.tiny.cloud/1/l3ykktihenlvyyj7jk6npxhhp8wemv3xv87o1s7h7147z2my/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    @livewireScripts

	@stack('scripts')
</body>
</html>
