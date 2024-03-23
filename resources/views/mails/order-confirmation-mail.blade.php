<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta charset="utf-8"> <!-- utf-8 works for most cases -->
		<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
		<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
		<title>Order Confirmation</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
		<link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
		<!-- CSS Reset : BEGIN -->
		<style>
			/* What it does: Remove spaces around the email design added by some email clients. */
			/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
			html,
			body {
				margin: 0 auto !important;
				padding: 0 !important;
				height: 100% !important;
				width: 100% !important;
				background: #f1f1f1;
			}
			/* What it does: Stops email clients resizing small text. */
			* {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
			}
			/* What it does: Stops Outlook from adding extra spacing to tables. */
			table,
			td {
				mso-table-lspace: 0pt !important;
				mso-table-rspace: 0pt !important;
			}
			/* What it does: Fixes webkit padding issue. */
			table {
				border-spacing: 0 !important;
				border-collapse: collapse !important;
				table-layout: fixed !important;
				margin: 0 auto !important;
			}
			/* What it does: Uses a better rendering method when resizing images in IE. */
			img {
				-ms-interpolation-mode:bicubic;
			}
			/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
			a {
				text-decoration: none;
			}

			.primary{
				background: #17bebb;
			}
			.bg_white{
				background: #ffffff;
			}
			.bg_light{
				background: #f7fafa;
			}
			.bg_black{
				background: #000000;
			}
			.bg_dark{
				background: rgba(0,0,0,.8);
			}
			.email-section{
				padding:2.5em;
			}
			/*BUTTON*/
			.btn{
				padding: 10px 15px;
				display: inline-block;
			}
			.btn.btn-primary{
				border-radius: 5px;
				background: #17bebb;
				color: #ffffff;
			}
			.btn.btn-white{
				border-radius: 5px;
				background: #ffffff;
				color: #000000;
			}
			.btn.btn-white-outline{
				border-radius: 5px;
				background: transparent;
				border: 1px solid #fff;
				color: #fff;
			}
			.btn.btn-black-outline{
				border-radius: 0px;
				background: transparent;
				border: 2px solid #000;
				color: #000;
				font-weight: 700;
			}
			.btn-custom{
				color: rgba(0,0,0,.3);
				text-decoration: underline;
			}
			h1,h2,h3,h4,h5,h6{
				font-family: 'Work Sans', sans-serif;
				color: #000000;
				margin-top: 0;
				font-weight: 400;
			}
			/*LOGO*/
			.logo h1{
				margin: 0;
			}
			.logo h1 a{
				color: #17bebb;
				font-size: 24px;
				font-weight: 700;
				font-family: 'Work Sans', sans-serif;
			}
			/*HERO*/
			.hero{
				position: relative;
				z-index: 0;
			}
			.hero .text{
				color: rgba(0,0,0,.3);
			}
			.hero .text h2{
				color: #000;
				font-size: 34px;
				margin-bottom: 15px;
				font-weight: 300;
				line-height: 1.2;
			}
			.hero .text h3{
				font-size: 24px;
				font-weight: 200;
			}
			.hero .text h2 span{
				font-weight: 600;
				color: #000;
			}
			/*PRODUCT*/
			.product-entry{
				display: block;
				position: relative;
				float: left;
				padding-top: 20px;
			}
			.product-entry .text{
				width: calc(100% - 125px);
				padding-left: 20px;
			}
			.product-entry .text h3{
				margin-bottom: 0;
				padding-bottom: 0;
			}
			.product-entry .text p{
				margin-top: 0;
			}
			.product-entry img, .product-entry .text{
				float: left;
			}

			ul.social{
				padding: 0;
			}
			ul.social li{
				display: inline-block;
				margin-right: 10px;
			}
			/*FOOTER*/
			.footer{
				border-top: 1px solid rgba(0,0,0,.05);
				color: rgba(0,0,0,.5);
			}
			.footer .heading{
				color: #000;
				font-size: 20px;
			}
			.footer ul{
				margin: 0;
				padding: 0;
			}
			.footer ul li{
				list-style: none;
				margin-bottom: 10px;
			}
			.footer ul li a{
				color: rgba(0,0,0,1);
			}

            #progressbar {
                margin-bottom: 3vh;
                overflow: hidden;
                color: green;
                padding-left: 0px;
                margin-top: 3vh
            }

            #progressbar li {
                list-style-type: none;
                font-size: 10px;
                width: 20%;
                float: left;
                position: relative;
                font-weight: 400;
                color: rgb(160, 159, 159);
            }

            #progressbar #step1:before {
                content: "";
                color: green;
                width: 5px;
                height: 5px;
                margin-left: 0px !important;
                /* padding-left: 11px !important */
            }

            #progressbar #step2:before {
                content: "";
                color: #fff;
                width: 5px;
                height: 5px;
                margin-left: 32%;
            }

            #progressbar #step3:before {
                content: "";
                color: #fff;
                width: 5px;
                height: 5px;
                margin-right: 32% ;
                /* padding-right: 11px !important */
            }

            #progressbar #step4:before {
                content: "";
                color: #fff;
                width: 5px;
                height: 5px;
                margin-right: 0px !important;
                /* padding-right: 11px !important */
            }

            #progressbar #step5:before {
                content: "";
                color: #fff;
                width: 5px;
                height: 5px;
                margin-right: 0px !important;
                /* padding-right: 11px !important */
            }

            #progressbar li:before {
                line-height: 29px;
                display: block;
                font-size: 12px;
                background: #ddd;
                border-radius: 50%;
                margin: auto;
                z-index: -1;
                margin-bottom: 1vh;
            }

            #progressbar li:after {
                content: '';
                height: 2px;
                background: #ddd;
                position: absolute;
                left: 0%;
                right: 0%;
                margin-bottom: 2vh;
                top: 1px;
                z-index: 1;
            }
            .progress-track{
                padding: 0 8%;
            }
            #progressbar li:nth-child(2):after {
                margin-right: auto;
            }

            #progressbar li:nth-child(1):after {
                margin: auto;
            }

            #progressbar li:nth-child(3):after {
                float: left;
                width: 68%;
            }
            #progressbar li:nth-child(4):after {
                margin-left: auto;
                width: 132%;
            }

            #progressbar  li.active{
                color: black;
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
                background: green;
            }
		</style>
	</head>

	<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
		<center style="width: 100%; background-color: #f1f1f1;">
			<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
			&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
			</div>
			<div style="max-width: 600px; margin: 0 auto;" class="email-container">
				<!-- BEGIN BODY -->
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
					<tr>
					<td valign="middle" class="bg_light footer email-section">
						<div class="progress-track">
                            <!--Order Status Check for Progressbar-->
                            <ul id="progressbar">
                                @if($order->status == 'pending' && !$order->is_return_order)
                                    <li class="step0 active" id="step1">Pending</li>
                                    <li class="step0" id="step2">Ordered</li>
                                    <li class="step0 text-center" id="step3">Packed</li>
                                    <li class="step0 text-right" id="step4">Shipped</li>
                                    <li class="step0 text-right" id="step5">Delivered</li>
                                @elseif($order->status == 'ordered' && !$order->is_return_order)
                                    <li class="step0 active" id="step1">Pending</li>
                                    <li class="step0 active" id="step2">Ordered</li>
                                    <li class="step0 text-center" id="step3">Packed</li>
                                    <li class="step0 text-right" id="step4">Shipped</li>
                                    <li class="step0 text-right" id="step5">Delivered</li>
                                @elseif($order->status == 'packed' && !$order->is_return_order)
                                    <li class="step0 active" id="step1">Pending</li>
                                    <li class="step0 active" id="step2">Ordered</li>
                                    <li class="step0 active text-center" id="step3">Packed</li>
                                    <li class="step0 text-right" id="step4">Shipped</li>
                                    <li class="step0 text-right" id="step5">Delivered</li>
                                @elseif($order->status == 'shipped' && !$order->is_return_order)
                                    <li class="step0 active" id="step1">Pending</li>
                                    <li class="step0 active" id="step2">Ordered</li>
                                    <li class="step0 active text-center" id="step3">Packed</li>
                                    <li class="step0 active text-right" id="step4">Shipped</li>
                                    <li class="step0 text-right" id="step5">Delivered</li>
                                @elseif($order->status == 'delivered' && !$order->is_return_order)
                                    <li class="step0 active" id="step1">Pending</li>
                                    <li class="step0 active" id="step2">Ordered</li>
                                    <li class="step0 active text-center" id="step3">Packed</li>
                                    <li class="step0 active text-right" id="step4">Shipped</li>
                                    <li class="step0 active text-right" id="step5">Delivered</li>
                                @elseif($order->status == 'refund' && $order->is_return_order)
                                    @if ($order->transaction->status == 'refunded')
                                        <li class="step0 active" id="step1">Progress</li>
                                        <li class="step0 active" id="step2"></li>
                                        <li class="step0 active text-center" id="step3"></li>
                                        <li class="step0 active text-right" id="step4"></li>
                                        <li class="step0 active text-right" id="step5">Refund</li>
                                    @else
                                        <li class="step0 active" id="step1">Progress</li>
                                        <li class="step0 active" id="step2"></li>
                                        <li class="step0 active text-center" id="step3"></li>
                                        <li class="step0 text-right" id="step4"></li>
                                        <li class="step0 text-right" id="step5">Refund</li>
                                    @endif
                                @elseif($order->status == 'canceled' && !$order->is_return_order)
                                    <span class="badge badge-danger" style="background-color: red; color: white;">Order is canceled!</span>
                                @endif
                            </ul>
                        </div>
					</td>
					</tr><!-- end: tr -->
				</table>

				<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
					<tr>
					<td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td class="logo" style="text-align: left;">
									<h1><a href="#"><img src="{{ asset('assets/images/logo-favicon') }}/{{ $setting->logo }}" /></a></h1>
								</td>
							</tr>
						</table>
					</td>
					</tr><!-- end tr -->
							<tr>
					<td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td style="padding: 0 2.5em; text-align: left;">
									<div class="text">
										<h2>Hi, {{$order->first_name}} {{$order->last_name}}</h2>
										<h4>Your order has been successfully placed.</h4>
									</div>
								</td>
							</tr>
						</table>
					</td>
					</tr><!-- end tr -->
					<tr>
						<div style="width: 100% !important; overflow-x: scroll;">
                            <table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                                        <th width="80%" style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px">Item</th>
                                        <th width="20%" style="text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px">Price Total</th>

                                    </tr>
                                    @foreach($order->orderItems as $item)
                                        <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                                            <td valign="middle" width="80%" style="text-align:left; padding: 0 2.5em;">
                                                <div class="product-entry">
                                                    <img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;">
                                                    <div class="text">
                                                        <h3>{{$item->product->name}}</h3>
                                                        <h5>Price: {{ $setting->currency }}{{$item->price}}</h5>
                                                        <h5>Qty: {{$item->quantity}}</h5>
                                                        @if($item->options)
                                                            <span>
                                                                @foreach(unserialize($item->options) as $key=>$value)
                                                                    <p><b>{{$key}}: </b>{{$value}}</p>
                                                                @endforeach
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td valign="middle" width="20%" style="text-align:left; padding: 0 2.5em;">
                                                <span class="price" style="color: #000; font-size: 20px;">{{ $setting->currency }}{{$item->price * $item->quantity}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" style="border-top:1px solid #ccc;"></td>
                                        <td style="font-size:15px; font-weight:bold; border-top:1px solid #ccc;"><b>Subtotal: </b>{{ $setting->currency }}{{$order->subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="font-size:15px; font-weight:bold;"><b>Discount: </b>{{ $setting->currency }}{{$order->discount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="font-size:15px; font-weight:bold;"><b>Tax: </b>{{ $setting->currency }}{{$order->tax}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="font-size:15px; font-weight:bold;"><b>Shipping: </b>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td style="font-size:18px; font-weight:bold;"><b>Total: </b>{{ $setting->currency }}{{$order->total}}</td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" style="text-align:left; padding: 1em 2.5em;">
                                            <p><a href="http://127.0.0.1:8000" class="btn btn-primary">Continue</a></p>
                                        </td>
                                    </tr>
                            </table>
                        </div>
					</tr><!-- end tr -->
				<!-- 1 Column Text + Button : END -->
				</table>
				<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
					<tr>
					<td valign="middle" class="bg_light footer email-section">

					</td>
					</tr><!-- end: tr -->
					<tr>
					<td class="bg_white" style="text-align: center;">
						<p>Thanks By <a href="#" style="color: rgba(0,0,0,.8);">Easy Shoppy Team.</a></p>
					</td>
					</tr>
				</table>
			</div>
		</center>
	</body>
</html>
