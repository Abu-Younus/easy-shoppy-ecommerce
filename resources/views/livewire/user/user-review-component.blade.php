@section('page-title')
    My Product Review |
@endsection

<div>
    <!--Main Container-->
    <div class="container-fluid" style="padding: 30px 0; margin-left:15px; margin-right:15px;">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Customer Dashboard Sidebar-->
                        <div class="col-md-4">
                            @livewire('user.user-dashboard-sidebar-component')
                        </div>
                        <!--Customer Dashboard Right Panel-->
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>Product Review</h5>
                                </div>
                                <div class="panel-body">
                                    <div id="review_form_wrapper">
                                        <div id="comments">
                                            <!--Product Image and Name Show-->
                                            <h2 class="woocommerce-Reviews-title">Add review for</h2>
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt="" src="{{asset('assets/images/products')}}/{{$orderItem->product->image}}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author">{{$orderItem->product->name}}</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div><!-- #comments -->

                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <!--Review Store Form-->
                                                <form wire:submit.prevent="addReview" id="commentform" class="comment-form" onsubmit="$('#processing').show();">
                                                    <div class="comment-form-rating">
                                                        <span>Your rating<span class="required">*</span></span>
                                                        <p class="stars">
                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                                            @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                                        @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                                    </p>
                                                    @if(!$review->images)
                                                    <p class="comment-form-comment">
                                                        <label for="newimages">Product Images</label>
                                                        <span>
                                                            <input id="newimages" name="newimages" type="file" class="input-file" wire:model="newimages" multiple/>
                                                            @if($newimages)
                                                                @foreach($newimages as $newimage)
                                                                    @if($newimage)
                                                                    <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach($images as $image)
                                                                    @if($image)
                                                                    <img src="{{asset('assets/images/review-images')}}/{{$image}}" width="120"/>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </p>
                                                    @else
                                                    <p class="comment-form-comment">
                                                        <label for="images">Product Images</label>
                                                        <span>
                                                            <input id="images" name="images" type="file" class="input-file" wire:model="images" multiple/>
                                                            @if($images)
                                                                @foreach($images as $image)
                                                                <img src="{{$image->temporaryUrl()}}" width="120"/>
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </p>
                                                    @endif
                                                    @if($errors->isEmpty())
                                                    <div id="processing" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                        <span>Processing...</span>
                                                    </div>
                                                    @endif
                                                    <p class="form-submit" style="margin-top:15px;">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
