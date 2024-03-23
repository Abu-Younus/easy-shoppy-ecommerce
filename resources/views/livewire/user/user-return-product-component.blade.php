@section('page-title')
    My Return Orders |
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
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Return Product</h5>
                                        </div>
                                        <!--All Orders Button-->
                                        <div class="col-md-6">
                                            <a href="{{ route('user.orders') }}" class="btn btn-info btn-sm pull-right">All Orders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Return Order Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeReturnProduct" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Return Reason <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Return Reason" class="form-control" wire:model="return_reason" />
                                                @error('return_reason') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Return Payment <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <div class="choose-payment-methods">
                                                    <label class="payment-method">
                                                        <input name="payment-method" id="payment-method-bank" value="bkash" type="radio" wire:model="return_payment">
                                                        <span>bkash</span>
                                                    </label>
                                                    <label class="payment-method">
                                                        <input name="payment-method" id="payment-method-visa" value="nagad" type="radio" wire:model="return_payment">
                                                        <span>Nagad</span>
                                                    </label>
                                                    <label class="payment-method">
                                                        <input name="payment-method" id="payment-method-paypal" value="account" type="radio" wire:model="return_payment">
                                                        <span>Bank Account</span>
                                                    </label>
                                                </div>
                                                @error('return_payment') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Return Payment Type-->
                                        @if ($return_payment == 'bkash')
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Your bkash Number <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Your bkash Number" class="form-control" wire:model="bkash_number" />
                                                    @error('bkash_number') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        @endif

                                        @if ($return_payment == 'nagad')
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Your Nagad Number <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Your Nagad Number" class="form-control" wire:model="nagad_number" />
                                                    @error('nagad_number') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        @endif

                                        @if ($return_payment == 'account')
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Bank Name <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Bank Name" class="form-control" wire:model="bank_name" />
                                                    @error('bank_name') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Account Number <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Account Number" class="form-control" wire:model="account_number" />
                                                    @error('account_number') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        @endif

                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:10px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
