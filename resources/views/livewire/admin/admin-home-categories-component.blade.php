@section('page-title')
    Home Categories | Admin |
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
                                            <h5>Manage Home Categories</h5>
                                        </div>
                                        <!--All Categories List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.categories')}}" class="btn btn-info btn-sm pull-right">All Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Home Category Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateHomeCategory" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Choose Categories <span class="text-danger">*</span></label>
                                            <div class="col-md-4" wire:ignore>
                                                <select class="sel_categories form-control" name="categories[]" multiple wire:model="select_categories">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No of Products <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control input-md" placeholder="No of Products" wire:model="numberofproducts"/>
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
                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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

@push('scripts')
    <script>
        //select home categories function
        $(document).ready(function() {
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e) {
                var data = $('.sel_categories').select2("val");
                @this.set('select_categories',data);
            });
        });
    </script>
@endpush
