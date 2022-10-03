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
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Total</th>
                                            <th>Details</th>
                                            <th style="width: 168px;">Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $k=>$order)
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach($order->products as $product)
                                                @php
                                                    $total += $product->no_days*  $product->quantity * $product->rent_price;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->status->en_name }}</td>
                                                <td>{{ $order->note }}</td>
                                                <td>{{ $total }} SAR</td>
                                                <td><a class="btn btn-primary order-modal" data-toggle="modal" data-id="{{ $order->id }}" data-target="#order_modal"><i class="fa fa-search"></i></a></td>
                                                <td>{{ $order->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Ajax sourced data -->

        <!-- // Basic form layout section end -->
    </div>



<!-- The Modal -->
<div class="modal" id="order_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="ajax_content">
      
    </div>
  </div>
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


        $(document).on("click",".order-modal",function () {
            var id = $(this).attr("data-id");
            $("#ajax_content").html("");
            $.ajax({
                type: "POST",
                url:"{{ route('admin.user.order') }}",
                data: {
                    id:id,
                    _token:_token,
                },
                success: function (response) {
                    if(response.status == true){
                       $("#ajax_content").html(response.render_data);
                    }
                }
            });
        });
        
        


    </script>

@endpush
