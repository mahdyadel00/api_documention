@extends('admin.layout')

@push('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')

<div class="content-body">
    <!-- Basic form layout section start -->

    <!-- Ajax sourced data -->
    <section id="ajax">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
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
                            @if (Session::has('success'))
                            <div class="alert round alert-success alert-icon-left mb-2" role="alert">
                                <span class="alert-icon">
                                    <i class="ft-info"></i>
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ Session::get('success') }}</strong>

                            </div>

                            @endif

                            <div class="table-responsive">
                                <form method="post" action="{{ route('admin.orders.search') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span>Status: </span>
                                            <select name="status_id" class="form-control">
                                                <option {{ request()->get('status_id') == 'all' ? 'selected' : '' }} value="all">All</option>
                                                @foreach ($satuses as $status_val)
                                                <option {{ request()->get('status_id') == $status_val->id ? 'selected' : '' }} value="{{ $status_val->id }}">{{ $status_val->en_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <span>From - To :</span>

                                            <input type="text" class="form-control" autocomplete="off" name="from_to_date" value="{{ isset($from) ? $from->format('m/d/Y') . ' - ' . $to->format('m/d/Y') : '' }}" />
                                        </div>
                                        <div class="col-md-3">
                                            <button style="margin-top: 25px;" name="submit" type="submit" class="btn btn-primary" value="1">Filter</button>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <hr />
                                </form>
                                {{-- mo2men@dataTable --}}
                                <table class="table-data mdl-data-table ml-table-striped mdl-js-data-table is-upgraded">
                                    {{-- endEdit@dataTable --}}
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Owner</th>
                                            <th>Tenant</th>
                                            <th>Product</th>
                                            <th>Delivery method</th>
                                            <th>Status</th>
                                            <th>Sub Total</th>
                                            <th>Taxes</th>
                                            <!-- @midoshriks@order -->
                                            <th>service fees</th>
                                            <!-- @endUpdate -->

                                            <th>Total</th>
                                            <th>App Commission</th>
                                            <th>Owner Total</th>

                                                {{-- mo2men@accountant --}}
                                                <th >From Date</th>
                                                <th >To Date</th>
                                                {{-- endEdit@accountant --}}
                                            <th style="width: 168px;">Created At</th>
                                            <th>Chat Logs</th>
                                            <th>Transactions</th>
                                            <th>Details</th>
                                            <th>PDF</th>
                                            <!-- <th>All Reviews</th> -->
                                            <th>Cancel</th>
                                            <!-- <th>reveiws</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $k => $order)

                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->products && $order->products->count() > 0 ? @$order->products[0]->product->user->name : '' }}
                                            </td>
                                            <td>{{ @$order->user->name }}</td>
                                            <td>{{ $order->products && $order->products->count() > 0 ? $order->products[0]->product->en_title : '' }}
                                            </td>
                                            <td>{{ $order->products && $order->products->count() > 0 && $order->products[0]->delivery_type != null ? $order->products[0]->delivery_type_obj->en_name : '' }}
                                            </td>
                                            <td><small class='badge badge-dark'>{{ $order->status->en_name }}</small>
                                            </td>
                                            <td>{{ $order->sub_total }} SAR</td>
                                            <td>{{ $order->tax_amount }} SAR</td>
                                            <!-- @endUpdate -->

                                            <!-- @midoshriks@order -->
                                            <td>{{ $order->service_fees }} SAR</td>
                                            <!-- @endUpdate -->
                                            <td>{{ $order->total }} SAR</td>
                                            <td>{{ $order->application_amount }} SAR</td>
                                            <td>{{ $order->owner_total }} SAR</td>

                                            {{-- mo2men@accountant --}}
                                            <td>{{ @$order->products[0]->from_date }}</td>
                                            <td>{{ @$order->products[0]->to_date }}</td>
                                            {{-- endEdit@accountant --}}
                                                    {{-- mo2men@date --}}
                                            {{-- <td>{{ $order->created_at }}</td> --}}
                                            <td>{{ date("Y-m-d H:i:s", strtotime($order->created_at." +3 hours"))  }}</td>
                                                    {{-- endEdit@date --}}

                                            <td><a href="{{ route('admin.orders.chat.logs', $order->id) }}"><small class="badge badge-danger">{{ $order->messages ? $order->messages->count() : 0 }}</small>
                                                    <i class="fa fa-comment-o"></i></a></td>
                                            <td><a href="{{ route('admin.order.transacions', $order->id) }}"> <i class="fa fa-money"></i></a></td>
                                            <td><a href="{{ route('admin.order.details', $order->id) }}"> <i class="fa fa-search"></i></a></td>
                                            <!--<td><a class="btn btn-primary order-modal" data-toggle="modal" data-id="{{ $order->id }}" data-target="#order_modal"><i class="fa fa-search"></i></a></td>-->
                                            <td><a href="{{ route('order.invoice.pdf', $order->id) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></td>

                                            <td>
                                                <label class="switchToggle">
                                                    <input type="checkbox" data-id="{{ $order->id }}" class="cancel-order" {{ $order->status_id == 17 ? 'checked disabled' : '' }}>
                                                    <span class="slider green round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {{-- mo2men@dataTable --}}
                            {{-- @if (request()->get('type')) --}}
                            {{-- {{ $orders->appends(['type'=> request()->get('type') ])->links() }} --}}
                            {{-- @else --}}
                            {{-- {{ $orders->links() }} --}}
                            {{-- @endif --}}
                            {{-- endEdit@dataTable --}}

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
    $('body').on('click', '.cancel-order', function() {

        var id = $(this).data("id");
        var _this = $(this);
        swal({
            title: "Are you sure?",
            text: "Are You sure want to Cancel !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Cancel it!",
            closeOnConfirm: false,
            id: id,
            _this: $(this),
            _token: _token
        }, function() {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.order.change_cancel_status') }}",
                data: {
                    id: id,
                    is_cancel: 1,
                    _token: _token,
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        });
    });


    $(document).on("click", ".order-modal", function() {
        var id = $(this).attr("data-id");
        $("#ajax_content").html("");
        $.ajax({
            type: "POST",
            url: "{{ route('admin.user.order') }}",
            data: {
                id: id,
                _token: _token,
            },
            success: function(response) {
                if (response.status == true) {
                    $("#ajax_content").html(response.render_data);
                }
            }
        });
    });
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        $('input[name="from_to_date"]').daterangepicker({
            //      autoUpdateInput: false,
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });

        $('input[name="from_to_date"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>
@endpush