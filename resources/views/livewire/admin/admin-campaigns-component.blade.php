@section('page-title')
    Campaigns | Admin |
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
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>All Campaigns</h5>
                                        </div>
                                        <!--Add Campaign and All Coupons Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.addcampaign')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px;">Add Campaign</a>
                                            <a href="{{route('admin.coupons')}}" class="btn btn-info btn-sm pull-right" style="margin-right:5px;">All Coupons</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Sub Title</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Discount</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Campaigns List Show-->
                                                @foreach($campaigns as $key=>$campaign)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    @if($campaign->image != null)
                                                    <td><img src="{{asset('assets/images/campaigns')}}/{{$campaign->image}}" alt="{{$campaign->title}}" width="80" /></td>
                                                    @endif
                                                    <td>{{$campaign->title}}</td>
                                                    <td>{{$campaign->subtitle}}</td>
                                                    <td>{{$campaign->start_date}}</td>
                                                    <td>{{$campaign->end_date}}</td>
                                                    <td>{{$campaign->discount}}</td>
                                                    <td>{{$campaign->month.', '.$campaign->year}}</td>
                                                    <td>
                                                        @if($campaign->status == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                        @else
                                                            <p class="badge badge-success" style="background-color: red; color: white;">Inacitve</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.editcampaign',['slug'=>$campaign->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this campaign?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCampaign({{$campaign->id}})" style="margin-left: 5px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                        <a title="Campaign Product" href="{{route('admin.campaign.product',['campaign_slug'=>$campaign->slug])}}" class="text-primary"><i class="fa fa-plus fa-2x text-success"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$campaigns->links()}}
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


