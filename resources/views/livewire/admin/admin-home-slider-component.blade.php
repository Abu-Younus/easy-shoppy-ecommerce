@section('page-title')
    Home Slider | Admin |
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
                                        <div class="col-md-6">
                                            <h5>All Sliders</h5>
                                        </div>
                                        <!--Add Home Slider Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.addhomeslider')}}" class="btn btn-info btn-sm pull-right">Add Slide</a>
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
                                                    <th>Subtitle</th>
                                                    <th>Price</th>
                                                    <th>Link</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Sliders Show-->
                                                @foreach($sliders as $key=>$slider)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><img src="{{asset('assets\images\sliders')}}/{{$slider->image}}" alt="" width="120"/></td>
                                                    <td>{{$slider->title}}</td>
                                                    <td>{{$slider->subtitle}}</td>
                                                    <td>{{$slider->price}}</td>
                                                    <td>{{$slider->link}}</td>
                                                    <td>
                                                        @if($slider->status == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                        @else
                                                            <p class="badge badge-success" style="background-color: red; color: white;">Inacitve</p>
                                                        @endif
                                                    </td>
                                                    <td>{{$slider->created_at}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edithomeslider',['slider_id'=>$slider->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this slide?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{$slider->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
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
