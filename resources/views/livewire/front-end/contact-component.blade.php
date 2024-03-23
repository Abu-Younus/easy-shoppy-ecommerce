@section('page-title')
 Contact Us |
@endsection

<div>
    <main id="main" class="main-site left-sidebar">
        <!--Main Container-->
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Contact us</span></li>
                </ul>
            </div>
            <div class="row">
                <div class=" main-content-area">
                    <div class="wrap-contacts ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-form">
                                <h2 class="box-title">Leave a Message</h2>
                                <!--Send Message Form-->
                                <form wire:submit.prevent="sendMessage" name="frm-contact" onsubmit="$('#processing').show();">

                                    <label for="name">Name<span>*</span></label>
                                    <input type="text" value="" id="name" name="name" wire:model="name" >
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror

                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" value="" id="email" name="email" wire:model="email" >
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror

                                    <label for="phone">Phone Number<span>*</span></label>
                                    <input type="text" value="" id="phone" name="phone" wire:model="phone" >
                                    @error('phone') <span class="text-danger">{{$message}}</span> @enderror

                                    <label for="comment">Comment<span>*</span></label>
                                    <textarea name="comment" id="comment" wire:model="comment"></textarea>
                                    @error('comment') <span class="text-danger">{{$message}}</span> @enderror

                                    @if($errors->isEmpty())
                                    <div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px; color:green; display:none;">
                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        <span>Processing...</span>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <input type="submit" name="ok" value="Submit" >
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-info">
                                <!--Site Map-->
                                <div class="wrap-map">
                                <iframe src="{{$setting->map}}" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <!--Contact Detail-->
                                <h2 class="box-title">Contact Detail</h2>
                                <div class="wrap-icon-box">

                                    <div class="icon-box-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Email</b>
                                            <p>{{$setting->email}}</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Phone</b>
                                            <p>{{$setting->phone}}</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Address</b>
                                            <p>{{$setting->address}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
</div>
