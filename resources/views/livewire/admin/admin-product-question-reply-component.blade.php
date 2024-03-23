@section('page-title')
    Product Question Reply | Admin |
@endsection

<div>
    <!--Main Container-->
    <div class="container-fluid" style="padding: 30px 0; margin-left:15px; margin-right:15px;">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Admin Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Admin Dashboard Sidebar-->
                        <div class="col-md-4" wire:ignore>
                            @livewire('admin.admin-dashboard-sidebar-component')
                        </div>
                        <!--Admin Dashboard Right Panel-->
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <!--Product Questions and Answer Text Check to Admin and Customer-->
                                        <div class="col-md-6">
                                            <h5>Product Question of <span style="color: grey">({{ $question->product->name }})</span></h5>
                                        </div>
                                        <!--All Product Questions Page Link Button-->
                                        <div class="col-md-6">
                                            <a title="All Questions" href="{{route('admin.product.questions')}}" class="btn btn-info btn-sm pull-right">All Questions</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Product Questions Details Panel-->
                                <div class="panel-body">
                                    <div class="row">
                                        <!--Product Question Details Show-->
                                        <div class="col-md-8">
                                            <p><b>Product Name: </b>{{ $question->product->name }}</p>
                                            <p><b>User Name: </b>{{ $question->user->name }}</p>
                                            <p><b>User Email: </b>{{ $question->user->email }}</p>
                                            @if ($question->user->profile->mobile)
                                                <p><b>User Mobile: </b>{{ $question->user->profile->mobile }}</p>
                                            @endif
                                            @if ($question->user->profile->line1)
                                                <p><b>User Address: </b>{{ $question->user->profile->line1 }}</p>
                                            @endif
                                            <p><b>Product Question: </b><span style="color: darkcyan">{{ $question->question }}</span></p>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('product.details',['slug'=>$question->product->slug]) }}">
                                                <img src="{{ asset('assets/images/products') }}{{ '/' }}{{ $question->product->image }}" alt="{{ $question->product->name }}" width="150" height="150" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--Product Question Reply Answer Panel-->
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                <h5>Reply Answer</h5>
                                            </div>
                                            <div class="panel-body">
                                                <!--Product Question Answer Reply Form-->
                                                <form class="form-horizontal" wire:submit.prevent="storeAnswer" onsubmit="$('#processing').show();">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Answer <span class="text-danger">*</span></label>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control" placeholder="Message" wire:model="answer"></textarea>
                                                            @error('answer') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                    </div>
                                                    <!--Progress Loader-->
                                                    @if($errors->isEmpty())
                                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-primary btn-sm">Reply</button>
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
        </div>
    </div>
</div>
