@section('page-title')
    Open Ticket Details | Admin |
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
                                        <div class="col-md-6">
                                            <h5>Ticket ({{ $showTicket->user->name }})</h5>
                                        </div>
                                        <!--All Tickets List Link Button-->
                                        <div class="col-md-6">
                                            <a title="All Tickets" href="{{route('admin.show.tickets')}}" class="btn btn-info btn-sm pull-right">All Tickets</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <!--Ticekt Show-->
                                        <div class="col-md-8">
                                            <p><b>Subject: </b>{{ $showTicket->subject }}</p>
                                            <p><b>Service: </b>{{ $showTicket->service }}</p>
                                            <p><b>Priority: </b>{{ $showTicket->priority }}</p>
                                            <p><b>Message: </b>{{ $showTicket->message }}</p>
                                        </div>
                                        <!--Ticket Image Show-->
                                        <div class="col-md-4">
                                            <a href="{{ $showTicket->image }}" target="_blank">
                                                <img src="{{ asset('assets/images/tickets') }}{{ '/' }}{{ $showTicket->image }}" height="200px" />
                                            </a>
                                        </div>
                                    </div>
                                    <!--All Ticket Replies Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>All Replies</h5>
                                        </div>
                                        <div class="panel-body">
                                            <div style="height: 350px; overflow-y:scroll">
                                                <!--All Tickets Reply Show with Admin and Customer Check-->
                                                @foreach ($replies as $reply)
                                                    <div class="panel panel-default" @if($reply->user->utype === 'ADM') style="margin-left: 20px;" @endif>
                                                        <div class="panel-heading" @if($reply->user->utype === 'ADM') style="background-color: darkcyan; color:white;" @else style="background-color: darkorange; color:white;" @endif>
                                                            <span><i class="fa fa-user text-muted" style="margin-right: 4px; color: white;"></i>@if($reply->user->utype === 'ADM') Admin @else {{ $reply->user->name }} @endif</span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <blockquote class="blockquote">
                                                                <p>{{ $reply->message }}</p>
                                                                <footer class="blockquote-footer">{{ date('d F, Y',strtotime($reply->reply_date)) }}</footer>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!--Ticket Reply Message Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Reply Message</h5>
                                        </div>
                                        <div class="panel-body">
                                            <!--Ticket Reply Message Form-->
                                            <form wire:submit.prevent="storeAdminTicket()">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-4 control-label">Message <span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" placeholder="Message" wire:model="message"></textarea>
                                                            @error('message') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                    </div>
                                                    <!--Ticket Reply Image-->
                                                    <div class="form-group col-md-6">
                                                        <label class="col-md-2 control-label">Image</label>
                                                        <div class="col-md-10">
                                                            <input type="file" class="input-file" wire:model="image" />
                                                            @if($image)
                                                                <img src="{{$image->temporaryUrl()}}" width="80"/>
                                                            @endif
                                                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"></label>
                                                    <div class="col-md-10">
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




