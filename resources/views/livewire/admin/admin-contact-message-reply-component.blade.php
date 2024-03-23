@section('page-title')
    Contact Messages Reply | Admin |
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
                                            <h5>Contact Message Reply</h5>
                                        </div>
                                        <!--All Contacts Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.contact')}}" class="btn btn-info btn-sm pull-right">All Contacts</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <!--Contact Message Show-->
                                        <div class="col-md-12">
                                            <p><b>Name: </b>{{ $contact->name }}</p>
                                            <p><b>Email: </b>{{ $contact->email }}</p>
                                            <p><b>Phone: </b>{{ $contact->phone }}</p>
                                            <p><b>Comment: </b>{{ $contact->comment }}</p>
                                            <p><b>Date: </b>{{ Carbon\Carbon::parse($contact->created_at)->format('d F Y, g:i A') }}</p>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Reply Sent Customer Email</h5>
                                        </div>
                                        <div class="panel-body">
                                            <!--Contact Messages Reply Form-->
                                            <form class="form-horizontal" wire:submit.prevent="sendContactMessageReply()" onsubmit="$('#processing').show();">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Reply Message <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" id="reply_message" placeholder="Reply Message" wire:model="reply_message"></textarea>
                                                        @error('reply_message') <p class="text-danger">{{$message}}</p> @enderror
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
    </div>
</div>

