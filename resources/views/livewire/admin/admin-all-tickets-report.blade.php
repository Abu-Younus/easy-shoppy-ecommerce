<!DOCTYPE html>
<html lang="en">
    <!--All Tickets Report Header-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Tickets Report | Admin | Easy Shoppy</title>
    </head>
    <!--All Tickets Report Body-->
    <body>
        <!--All Tickets Report Show-->
        <h3 style="text-align: center;">Tickets Report</h3>
        <hr class="divide-gray-700" style="border: 1px solid"/>
        <div style="width: 100% !important; overflow-x: scroll">
            <table border="1" cellspacing="0" cellpadding="0" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>User</th>
                        <th>Subject</th>
                        <th>Service</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!--All Tickets Show-->
                    @foreach($tickets as $key=>$ticket)
                        <tr>
                            <td style="padding-left: 10px; padding-right: 10px;">{{++$key}}</td>
                            <td style="padding-left: 10px; padding-right: 10px;">{{$ticket->user->name}}</td>
                            <td style="padding-left: 10px; padding-right: 10px;">{{$ticket->subject}}</td>
                            <td style="padding-left: 10px; padding-right: 10px;">{{$ticket->service}}</td>
                            <td style="padding-left: 10px; padding-right: 10px;">{{$ticket->priority}}</td>
                            <td style="padding-left: 10px; padding-right: 10px;">
                                @if($ticket->status == 0)
                                    <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                @elseif($ticket->status == 1)
                                    <span class="badge badge-success" style="background-color: green; color: white;">Replied</span>
                                @elseif($ticket->status == 2)
                                    <span class="badge badge-muted">Closed</span>
                                @endif
                            </td>
                            <td style="padding-left: 10px; padding-right: 10px;">{{date('d F, Y',strtotime($ticket->date))}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
