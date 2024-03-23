@section('page-title')
    Contacts | Admin |
@endsection

<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
    </style>
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
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>Contact Messages</h5>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Comment</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Contact Messages List Show-->
                                                @foreach($contacts as $key=>$contact)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$contact->name}}</td>
                                                    <td>{{$contact->email}}</td>
                                                    <td>{{$contact->phone}}</td>
                                                    <td>{{$contact->comment}}</td>
                                                    <td>
                                                        @if($contact->is_reply == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">Replied</p>
                                                        @else
                                                            <p class="badge badge-danger" style="background-color: red; color: white;">Pending</p>
                                                        @endif
                                                    </td>
                                                    <td>{{Carbon\Carbon::parse($contact->created_at)->format('d F Y, g:i A')}}</td>
                                                    <td>
                                                        <!--Contact Messages Admin Reply Check-->
                                                        @if ($contact->is_reply == 1)
                                                            <a title="Reply" href="#" wire:click.prevent="replyCheck({{ $contact->id }})"><i class="fa fa-reply fa-2x text-info"></i></a>
                                                        @else
                                                            <a title="Reply" href="{{ route('admin.contact.message.reply',['contact_id'=>$contact->id]) }}"><i class="fa fa-reply fa-2x text-info"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$contacts->links()}}
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
