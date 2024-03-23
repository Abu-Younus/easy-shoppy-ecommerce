@section('page-title')
    My Ticket Add |
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
                            <!--Add Open Ticket Panel-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Add Open Ticket</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('user.open.tickets') }}" class="btn btn-info btn-sm pull-right">All Tickets</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Add Open Ticket Form-->
                                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="storeTickets" onsubmit="$('#processing').show();">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-md-4 control-label">Subject <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Subject" class="form-control" wire:model="subject" />
                                                    @error('subject') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-4 control-label">Image</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="input-file" wire:model="image" />
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" width="80"/>
                                                    @endif
                                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-md-4 control-label">Service <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" wire:model="service">
                                                        <option>Select Service</option>
                                                        <option value="technical">Technical</option>
                                                        <option value="payment">Payment</option>
                                                        <option value="affiliate">Affiliate</option>
                                                        <option value="return">Return</option>
                                                        <option value="refund">Refund</option>
                                                    </select>
                                                    @error('service') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-md-4 control-label">Priority <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" wire:model="priority">
                                                        <option>Select Priority</option>
                                                        <option value="low">Low</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="high">High</option>
                                                    </select>
                                                    @error('priority') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Message <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" placeholder="Message" cols="45" rows="8" wire:model="message"></textarea>
                                                @error('message') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:10px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label class="col-md-2 control-label"></label>
                                            <div class="col-md-6">
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


