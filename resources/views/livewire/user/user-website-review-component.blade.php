@section('page-title')
    Write Website Review |
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
                                    <h5>Write Website Review</h5>
                                </div>
                                <div class="panel-body">
                                    <!--Website Review Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeReview" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Review <span class="text-danger">*</span></label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="review" cols="45" rows="8" wire:model="review"></textarea>
                                                @error('review') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="comment-form-rating">
                                                <label class="col-md-2 control-label">Rating <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
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
                                                        <input type="radio" id="rated-5" name="rating" value="5" wire:model="rating">
                                                        @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-2 control-label"></label>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
