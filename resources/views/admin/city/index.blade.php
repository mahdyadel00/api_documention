@extends('admin.layout')

@push('head')

@endpush

@section('content')

    <div class="content-body"><!-- Basic form layout section start -->

        <!-- Ajax sourced data -->
        <section id="ajax">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$title}}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body card-dashboard">
                                @if(Session::has('success'))
                                    <div class="alert round alert-success alert-icon-left mb-2" role="alert">
                                        <span class="alert-icon">
                                            <i class="ft-info"></i>
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{Session::get('success')}}</strong>

                                    </div>

                                @endif

                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered table-hover table-checkable order-column" style="width: 100%" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name(Ar)</th>
                                            <th>Name(En)</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cities as $k=>$city)

                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $city->ar_name }}</td>
                                                <td>{{ $city->en_name }}</td>

                                               

                                                <td class="">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="{{ route('admin.city.edit',['id' => $city->id]) }}">
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="delete-item" data-id="{{ $city->id }}" data-action="{{ route('admin.city.delete',['id' => $city->id]) }}" href="javascript:void(0)">
                                                                    <i class="icon-trash"></i> Delete
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $cities->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Ajax sourced data -->

        <!-- // Basic form layout section end -->
    </div>






@endsection

@push('scripts')

    <script>
        $('body').on('click', '.delete-item', function () {

            var id = $(this).data("id");
            var _this = $(this);
            swal({
                title: "Are you sure?",
                text: "Are You sure want to delete !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                id:id,
                _this:$(this),
                _token:_token
            }, function () {
                $.ajax({
                    type: "DELETE",
                    url: _this.attr("data-action"),
                    data: {
                        id:id,
                        _token:_token,
                        _method:"DELETE"
                    },
                    success: function (data) {
                        if(data.delete == true){
                            swal("Deleted!", "This Item has been deleted.", "success");
                            setTimeout(function(){
                                window.location.reload();
                            },1300);
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            });





        });


    </script>

@endpush
