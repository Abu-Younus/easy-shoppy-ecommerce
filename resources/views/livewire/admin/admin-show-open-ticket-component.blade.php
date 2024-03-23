@section('page-title')
    Open Tickets | Admin |
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
                                    <h5>Ticket List</h5>
                                </div>
                                <div class="panel-body">
                                    <!--Tickets Search for Ticket Type, Status and Date-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Ticket Type</label>
                                                <select class="form-control" wire:model="type">
                                                    <option value="#">All</option>
                                                    <option value="technical">Technical</option>
                                                    <option value="payment">Payment</option>
                                                    <option value="affiliate">Affiliate</option>
                                                    <option value="return">Return</option>
                                                    <option value="refund">Refund</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control" wire:model="status">
                                                    <option value="#">All</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1">Replied</option>
                                                    <option value="2">Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Date</label>
                                                <input type="date" class="form-control" wire:model="date" />
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div style="width: 100% !important; overflow-x: scroll">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>User</th>
                                                    <th>Subject</th>
                                                    <th>Service</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Tickets Show-->
                                                @foreach($tickets as $key=>$ticket)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$ticket->user->name}}</td>
                                                    <td>{{$ticket->subject}}</td>
                                                    <td>{{$ticket->service}}</td>
                                                    <td>{{$ticket->priority}}</td>
                                                    <td>
                                                        <!--Ticket Status Check-->
                                                        @if($ticket->status == 0)
                                                            <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                                        @elseif($ticket->status == 1)
                                                            <span class="badge badge-success" style="background-color: green; color: white;">Replied</span>
                                                        @elseif($ticket->status == 2)
                                                            <span class="badge badge-muted">Closed</span>
                                                        @endif
                                                    </td>
                                                    <td>{{date('d F, Y',strtotime($ticket->date))}}</td>
                                                    <td>
                                                        <a title="Details" href="{{ route('admin.open.ticket.details',['ticket_id'=>$ticket->id]) }}" class="text-info"><i class="fa fa-eye fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this ticket?') || event.stopImmediatePropagation()" wire:click.prevent="deleteTicket({{$ticket->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$tickets->links()}}
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
