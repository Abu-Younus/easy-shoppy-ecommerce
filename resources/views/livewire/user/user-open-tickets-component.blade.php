@section('page-title')
    My Tickets |
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
                                            <h4>All Tickets</h4>
                                        </div>
                                        <!--Add Open Ticket Button-->
                                        <div class="col-md-6">
                                            <a href="{{ route('user.add.open.ticket') }}" class="btn btn-danger btn-sm pull-right">Open Ticket</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Customer All Tickets List Show-->
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Date</th>
                                                    <th>Subject</th>
                                                    <th>Service</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tickets as $key=>$ticket)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{date('d F, Y',strtotime($ticket->date))}}</td>
                                                        <td>{{ $ticket->subject }}</td>
                                                        <td>{{ $ticket->service }}</td>
                                                        <td>{{ $ticket->priority }}</td>
                                                        <td>
                                                            @if($ticket->status == 0)
                                                                <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                                            @elseif($ticket->status == 1)
                                                                <span class="badge badge-success" style="background-color: green; color: white;">Replied</span>
                                                            @elseif($ticket->status == 2)
                                                                <span class="badge badge-muted">Closed</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a title="View" href="{{ route('user.show.ticket',['ticket_id'=>$ticket->id]) }}" class="text-primary"><i class="fa fa-eye fa-2x"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

