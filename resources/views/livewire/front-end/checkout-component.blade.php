@section('page-title')
 Checkout |
@endsection

<main id="main" class="main-site">
        <!--Main Container-->
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
                <!--Place Order Submit Form-->
				<form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
					<div class="row">
						<div class="col-md-12">
                            <!--Billing Info-->
							<div class="wrap-address-billing">
								<h3 class="box-title">Billing Address</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">First name<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Your first name" wire:model="firstname">
										@error('firstname') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
										@error('lastname') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
									<label for="email">Email Address<span>*</span></label>
										<input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
										@error('email') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="11 digits format" wire:model="mobile">
										@error('mobile') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="line1">Line 1<span>*</span></label>
										<input type="text" name="line1" value="" placeholder="Line 1" wire:model="line1">
										@error('line1') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="line2">Line 2</label>
										<input type="text" name="line2" value="" placeholder="Street at apartment number" wire:model="line2">
										@error('line2') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input type="text" name="country" value="" placeholder="Enter your country" wire:model="country">
										@error('country') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postcode / ZIP<span>*</span></label>
										<input type="number" name="zip-code" value="" placeholder="Your post/zip code" wire:model="zipcode">
										@error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="state">State<span>*</span></label>
										<input type="text" name="state" value="" placeholder="Your state" wire:model="state">
										@error('state') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Town / City<span>*</span></label>
										<input type="text" name="city" value="" placeholder="City name" wire:model="city">
										@error('city') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form fill-wife">
										<label class="checkbox-field">
											<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
											<span>Ship to a different address?</span>
										</label>
									</p>
								</div>
							</div>
						</div>
                        <!--Shipping Info Different Check-->
						@if($ship_to_different)
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Shipping Address</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">First name<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Your first name" wire:model="shipping_firstname">
										@error('shipping_firstname') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Your last name" wire:model="shipping_lastname">
										@error('shipping_lastname') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess<span>*</span></label>
										<input type="email" name="email" value="" placeholder="Type your email" wire:model="shipping_email">
										@error('shipping_email') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="11 digits format" wire:model="shipping_mobile">
										@error('shipping_mobile') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="line1">Line 1<span>*</span></label>
										<input type="text" name="line1" value="" placeholder="Line 1" wire:model="shipping_line1">
										@error('shipping_line1') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="line2">Line 2</label>
										<input type="text" name="line2" value="" placeholder="Street at apartment number" wire:model="shipping_line2">
										@error('shipping_line2') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input type="text" name="country" value="" placeholder="Enter your country" wire:model="shipping_country">
										@error('shipping_country') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postcode / ZIP<span>*</span></label>
										<input type="number" name="zip-code" value="" placeholder="Your post/zip code" wire:model="shipping_zipcode">
										@error('shipping_zipcode') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="state">State<span>*</span></label>
										<input type="text" name="state" value="" placeholder="Your state" wire:model="shipping_state">
										@error('shipping_state') <p class="text-danger">{{$message}}</p> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Town / City<span>*</span></label>
										<input type="text" name="city" value="" placeholder="City name" wire:model="shipping_city">
										@error('shipping_city') <p class="text-danger">{{$message}}</p> @enderror
									</p>
								</div>
							</div>
						</div>
						@endif
					</div>
                    <!--Payment Method-->
					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Payment Method</h4>
                            <!--Stripe Details-->
							@if($paymentmode == 'card')
							<div class="wrap-address-billing">
								@if(Session::has('stripe_error'))
									<div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
								@endif
								<p class="row-in-form">
									<label for="card-no">Card Number<span>*</span></label>
									<input type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no">
									@error('card_no') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="exp-month">Expiry Month<span>*</span></label>
									<input type="text" name="exp-month" value="" placeholder="MM" wire:model="exp_month">
									@error('exp_month') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="exp-year">Expiry Year<span>*</span></label>
									<input type="text" name="exp-year" value="" placeholder="YYYY" wire:model="exp_year">
									@error('exp_year') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="cvc">CVC<span>*</span></label>
									<input type="password" name="cvc" value="" placeholder="CVC" wire:model="cvc">
									@error('cvc') <p class="text-danger">{{$message}}</p> @enderror
								</p>
							</div>
							@endif
							<div class="choose-payment-methods">
                                <!--Cash On Delivery-->
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
									<span>Cash on Delivery</span>
									<span class="payment-desc">Order now pay on delivery!</span>
								</label>
                                <!--Stripe-->
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
									<span>Debit/Credit Card</span>
									<span class="payment-desc">You can pay with your credit</span>
								</label>
                                <!--Bkash/Rocket/Nagad-->
								<label class="payment-method">
									<input name="payment-method" id="payment-method-paypal" value="bkash" type="radio" wire:model="paymentmode">
									<span>bkash</span>
									<span class="payment-desc">You can pay with your bkash account</span>
								</label>
							</div>
                            <!--Gran Total-->
							@if(Session::has('checkout'))
							<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{$setting->currency}}{{Session::get('checkout')['total']}}</span></p>
							@endif
                            <!--Order Place Processing Loader-->
							@if($errors->isEmpty() && !Session::has('quantity_error'))
							<div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px; padding-left:37px; color:green; display:none;">
								<i class="fa fa-spinner fa-pulse fa-fw"></i>
								<span>Processing...</span>
							</div>
							@endif
                            <!--Database Product Quantity Check with Cart Item Quantity befor order place-->
							@if(Session::has('quantity_error'))
							<div class="alert alert-danger" role="alert">{{Session::get('quantity_error')}}</div>
							@endif
                            <!--Place Order Button-->
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
                        <!--Coupon Check-->
						@if(!Session::has('coupon'))
						<div class="summary-item shipping-method">
							<div wire:click.prevent="applyCouponCode">
								<h4 class="title-box">Coupon Code</h4>
								@if(Session::has('coupon_message'))
								<div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
								@endif
								<p class="row-in-form">
									<label for="coupon-code">Enter your coupon code</label>
									<input type="text" name="coupon-code" placeholder="Coupon Code" wire:model="couponCode" />
								</p>
								<button type="submit" class="btn btn-small">Apply</button>
							</div>
						</div>
						@endif
					</div>
				</form>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
