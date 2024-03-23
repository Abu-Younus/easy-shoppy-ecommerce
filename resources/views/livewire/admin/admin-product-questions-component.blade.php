@section('page-title')
    Product Questions & Answer | Admin |
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
                                    <h5>Product Questions & Answers</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control" wire:model="status">
                                                    <option value="#">All</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="replied">Replied</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Date</label>
                                                <input type="date" class="form-control" wire:model="date" />
                                            </div>
                                        </div>
                                    </div><br>
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>User Name</th>
                                                    <th>Product Name</th>
                                                    <th>Question</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--Product All Questions Show-->
                                                @foreach($questions as $key=>$question)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$question->user->name}}</td>
                                                    <td><a title="Details" href="{{route('product.details',['slug'=>$question->product->slug])}}" style="color:rgb(78, 78, 78)">{{substr($question->product->name,0,30)}}..</a></td>
                                                    <td>{{$question->question}}</td>
                                                    <td>
                                                        @if ($question->is_reply)
                                                            <span class="badge badge-success" style="background-color: green; color: white;">Replied</span>
                                                        @else
                                                            <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d F, Y',strtotime($question->date)) }}</td>
                                                    <td>
                                                        @if ($question->is_reply)
                                                            <a title="Reply" href="#" wire:click.prevent="replyCheck({{ $question->id }})"><i class="fa fa-reply fa-2x text-info"></i></a>
                                                        @else
                                                            <a title="Reply" href="{{route('admin.product.question.reply',['question_id'=>$question->id])}}"><i class="fa fa-reply fa-2x text-info"></i></a>
                                                        @endif
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this question?') || event.stopImmediatePropagation()" wire:click.prevent="deleteQuestion({{$question->id}})" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$questions->links()}}
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
