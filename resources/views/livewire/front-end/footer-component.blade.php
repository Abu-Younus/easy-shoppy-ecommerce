<div>
    <!--Footer-->
    <footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
                <!--Site Detail-->
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Guarantee</h4>
								<p class="fc-desc">30 Days Money Back</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">
                <!--Main Footer Container-->
				<div class="container">

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
                                <!--Contact Details-->
								<h3 class="item-header">Contact Details</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->address}}</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->phone}}</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->email}}</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

							<div class="wrap-footer-item">
                                <!--Hotline-->
								<h3 class="item-header">Hot Line</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">Call Us toll Free</span>
										<b class="phone-number">{{$setting->phone2}}</b>
									</div>
								</div>
							</div>

							<div class="wrap-footer-item footer-item-second">
                                <!--Newsletter-->
								<h3 class="item-header">Sign up for newsletter</h3>
								<div class="item-content">
									<div class="wrap-newletter-footer">
										<form wire:submit.prevent="storeSubscribe()" class="frm-newletter" id="frm-newletter">
											<input type="email" class="input-email" name="email" placeholder="Enter your email address" wire:model="email">
                                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                            <button class="btn-submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
                                    <!--Customer Account, Order Tracking and Wishlist-->
									<h3 class="item-header">My Account</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="{{ route('user.dashboard') }}" class="link-term">My Account</a></li>
                                                <li class="menu-item"><a href="{{ route('contact') }}" class="link-term">Contact Us</a></li>
												<li class="menu-item"><a href="{{ route('user.orders') }}" class="link-term">Order History</a></li>
												<li class="menu-item"><a href="#" class="link-term">Order Tracking</a></li>
												<li class="menu-item"><a href="{{ route('product.wishlist') }}" class="link-term">Wishlist</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item twin-item">
                                    <!--All Pages-->
									<h3 class="item-header">Infomation</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
                                                @foreach ($pages as $page)
                                                    <li class="menu-item"><a href="{{ route('page',['page_slug'=>$page->slug]) }}" class="link-term">{{ $page->name }}</a></li>
                                                @endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
                                <!--Payment Details-->
								<h3 class="item-header">We Using Safe Payments:</h3>
								<div class="item-content">
									<div class="wrap-list-item wrap-gallery">
										<img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
                                <!--Social Site Details-->
								<h3 class="item-header">Social network</h3>
								<div class="item-content">
									<div class="wrap-list-item social-network">
										<ul>
											<li><a href="{{$setting->twiter}}" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->facebook}}" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->pinterest}}" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->instagram}}" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->youtube}}" class="link-to-item" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
                                <!--Mobile Application Details-->
								<h3 class="item-header">Dowload App</h3>
								<div class="item-content">
									<div class="wrap-list-item apps-list">
										<ul>
											<li><a href="#" class="link-to-item" title="our application on apple store"><figure><img src="{{asset('assets/images/apple-store.png')}}" alt="apple store" width="128" height="36"></figure></a></li>
											<li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="{{asset('assets/images/google-play-store.png')}}" alt="google play store" width="128" height="36"></figure></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="wrap-back-link">
					<div class="container">
						<div class="back-link-box">
                            <!--Quick Links-->
							<h3 class="backlink-title">Quick Links</h3>
							<div class="back-link-row">
								<ul class="list-back-link" >
									@foreach($categories as $category)
										<li><span class="row-title">{{$category->name}}: </span></li>
										@foreach($category->subCategories as $subCategory)
										    <li><a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$subCategory->slug])}}" class="redirect-back-link" title="{{$subCategory->name}}">{{$subCategory->name}}</a></li>
										@endforeach
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
                        <!--Copyright Paragraph-->
						<p class="coppy-right-text">Copyright © 2023 Easy Shoppy. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
                            <!--Site Pages-->
							<ul>
                                @foreach ($pages as $page)
                                    <li class="menu-item"><a href="{{ route('page',['page_slug'=>$page->slug]) }}" class="link-term">{{ $page->name }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
</div>
