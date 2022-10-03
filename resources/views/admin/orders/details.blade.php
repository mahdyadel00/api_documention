@extends('admin.layout')

@push('head')

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
                        <h4 class="card-title">Order #{{ $order->id }}</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <h4 class="col-md-12">Tenant:</h4>
                                <div class="col-md-6">
                                    <b>Name : </b>{{ @$order->user->name . ' ' . @$order->user->last_name }}
                                </div>

                                <div class="col-md-6">
                                    <b>phone : </b>{{ @$order->user->phone }}
                                </div>

                                <div class="col-md-6">
                                    <b>E-mail : </b>{{ @$order->user->email }}
                                </div>

                                <div class="col-md-6">
                                    <b>City : </b>{{ @$order->user->city ? $order->user->city->name : '' }}
                                </div>


                                <div class="col-md-6">
                                    <b>full_name_ar : </b>{{ @$order->user->documentation ? $order->user->documentation->full_name_ar : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>full_name_en : </b>{{ @$order->user->documentation ? $order->user->documentation->full_name_en : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>gender : </b>{{ @$order->user->documentation ? $order->user->documentation->gender : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>birth_day : </b>{{ @$order->user->documentation ? $order->user->documentation->birth_day : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_number : </b>{{ @$order->user->documentation ? $order->user->documentation->id_number : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_create_date : </b>{{ @$order->user->documentation ? $order->user->documentation->id_create_date : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_expire_date : </b>{{ @$order->user->documentation ? $order->user->documentation->id_expire_date : '' }}
                                </div>





                                <hr style="width:100%" />
                                <h4 class="col-md-12">Owner:</h4>
                                <div class="col-md-6">
                                    <b>Name : </b>{{ @$order->owner->name . ' ' . @$order->owner->last_name }}
                                </div>

                                <div class="col-md-6">
                                    <b>phone : </b>{{ @$order->owner->phone }}
                                </div>

                                <div class="col-md-6">
                                    <b>E-mail : </b>{{ @$order->owner->email }}
                                </div>

                                <div class="col-md-6">
                                    <b>City : </b>{{ @$order->owner->city ? @$order->owner->city->name : '' }}
                                </div>


                                <div class="col-md-6">
                                    <b>full_name_ar : </b>{{ @$order->owner->documentation ? @$order->owner->documentation->full_name_ar : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>full_name_en : </b>{{ @$order->owner->documentation ? @$order->owner->documentation->full_name_en : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>gender : </b>{{ @$order->owner->documentation ? $order->owner->documentation->gender : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>birth_day : </b>{{ @$order->owner->documentation ? $order->owner->documentation->birth_day : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_number : </b>{{ @$order->owner->documentation ? $order->owner->documentation->id_number : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_create_date : </b>{{ @$order->owner->documentation ? $order->owner->documentation->id_create_date : '' }}
                                </div>
                                <div class="col-md-6">
                                    <b>id_expire_date : </b>{{ @$order->owner->documentation ? $order->owner->documentation->id_expire_date : '' }}
                                </div>

                                <hr style="width:100%" />
                                <h4 class="col-md-12">Details:</h4>
                                <div class="col-md-6">
                                    <b>Id : </b>{{ $order->id }}
                                </div>

                                <div class="col-md-6">
                                    <b>Created At : </b>
                                    {{-- mo2men@date --}}
                                    {{-- {{ $order->created_at }} --}}
                                    {{ @date("Y-m-d H:i:s", strtotime($delay_log->created_at." +3 hours")) }}
                                    {{-- endEdit@date --}}
                                </div>


                                @foreach ($order->products as $product)
                                <table class="table table-striped table-bordered" border="0" cellspacing="0"
                                    cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td><b>Main Photo</b></td>
                                            <td>
                                                @if ($product->product->main_photo && $product->product->main_photo !=
                                                '')
                                                <img style="width:80px;height:50px;border: 1px solid #ddd;border-radius:4px "
                                                    src="{{ asset('uploads/' . $product->product->main_photo) }}" />
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Title</b></td>
                                            <td>
                                                <p>Ar: {{ $product->product->ar_title }}</p>
                                                <p>En: {{ $product->product->en_title }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>description</b></td>
                                            <td>
                                                <p>Ar: {{ $product->product->ar_description }}</p>
                                                <p>En: {{ $product->product->en_description }}</p>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><b>From - To :</b></td>
                                            <td> <b>From:
                                                </b>{{ \Carbon\Carbon::parse($product->from_date)->format(' M d, Y') }}
                                                - <b>To:</b>
                                                {{ \Carbon\Carbon::parse($product->to_date)->format(' M d, Y') }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Quantity</b></td>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Days</b></td>
                                            <td>
                                                {{ $product->no_days }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><b>Prices: </b></td>
                                            <td>
                                                Price/Day:&nbsp;{{ $product->price_per_day }} SAR <br />

                                                @if ($product->price_per_month != 0 && $product->price_per_month != '')
                                                Price/Month:&nbsp;{{ $product->price_per_month }} SAR<br />
                                                @endif

                                                @if ($product->price_per_year != 0 && $product->price_per_year != '')
                                                Price/Year:&nbsp;{{ $product->price_per_year }} SAR
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><b>{{ $product->total }} SAR</b></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <br />
                                @endforeach

                                <div class="col-md-6">
                                    <b>Sub Total : </b>{{ $order->sub_total }} SAR
                                </div>

                                <div class="col-md-6">
                                    <b>Tax : </b>{{ $order->tax_amount }} SAR
                                </div>

                                <div class="col-md-6">
                                    <b>Application Commission : </b>{{ $order->application_amount }} SAR
                                </div>

                                <div class="col-md-6">
                                    <b>Owner Total : </b>{{ $order->owner_total }} SAR
                                </div>

                                <div class="col-md-6">
                                    <b>Total : </b>{{ $order->total }} SAR
                                </div>



                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Logs</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">


                            <div class="table-responsive">
                                <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($payment_logs->logs as $k => $payment)

                                        <tr>
                                            <td style="width:80px">{{ $k + 1 }}</td>
                                            <td>{{ $payment->order_id }}</td>
                                            <td>{{ $payment->payment_method }}</td>
                                            <td>{{ $payment->amount }} SAR</td>
                                            {{-- mo2men@date --}}
                                            {{-- <td>{{ $payment->created_at }}</td> --}}
                                            <td>{{ @date("Y-m-d H:i:s", strtotime($payment->created_at." +3 hours")) }}</td>
                                            {{-- endEdit@date --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3>Total Payment {{ $payment_logs->total }} SAR</h3>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Wallet Logs</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table
                                    class="mdl-data-table ml-table-striped ml-table-bordered mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Payment method</th>
                                            <th>From</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($wallet_logs->logs as $k => $wallet)

                                        <tr>
                                            <td style="width:80px">{{ $k + 1 }}</td>
                                            <td>{{ $wallet->order_id }}</td>
                                            <td>{{ $wallet->sign . $wallet->amount }} SAR</td>
                                            <td>{{ $wallet->type }}</td>
                                            <td>{{ $wallet->payment_method }}</td>
                                            <td>{{ $wallet->from ? $wallet->from->name : '' }}</td>
                                            {{-- mo2men@date --}}
                                            {{-- <td>{{ $wallet->created_at }}</td> --}}
                                            <td>{{ @date("Y-m-d H:i:s", strtotime($wallet->created_at." +3 hours")) }}</td>
                                            endEdit@date
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <h3>Total Wallet {{ $wallet_logs->total }} SAR</h3>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Status Logs</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">


                            <div class="table-responsive">
                                <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>Status</th>
                                            <th>By</th>
                                            <th>At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($order_status_logs as $k => $status_val)

                                        <tr>
                                            <td style="width:80px">{{ $k + 1 }}</td>

                                            <td>{{ $status_val->status->en_name }}
                                                @if ($status_val->status->en_name == 'Cancel Order')
                                                <br>
                                                Reason:
                                                {{ $order->owner_refuse_reason ? $order->owner_refuse_reason : $order->renter_refuse_reason }}
                                                @endif
                                            </td>
                                            <td>{{ @$status_val->user->name }}</td>
                                            {{-- mo2men@date --}}
                                            {{-- <td>{{ @$status_val->created_at }}</td> --}}
                                            <td>{{ @date("Y-m-d H:i:s", strtotime($status_val->created_at." +3 hours")) }}</td>
                                            {{-- endEdit@date --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Extended Orders</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">


                            <div class="table-responsive">
                                <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>Status</th>
                                            <th>Duration</th>
                                            <th>Payment method</th>
                                            <th>Sub Total</th>
                                            <th>Total</th>
                                            <th>owner total</th>
                                            <th>cash back amount</th>
                                            <th>Application Commission</th>
                                            <th>Tax</th>
                                            <!-- @midoshriks@order_details -->
                                            <th>service fees</th>
                                            <!-- @midoshriks@order_details_paid -->
                                            <th>paid</th>
                                            <!-- @endEdit -->
                                            <th>PDF</th>
                                            <th>At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($extended_orders as $k => $extended_order)

                                        <tr>
                                            <td style="width:80px">{{ $k + 1 }}</td>

                                            <td>
                                                {{ $extended_order->status->en_name }}
                                                <br>
                                                {{$extended_order->reason}}

                                            </td>
                                            <td>{{ $extended_order->duration }}</td>
                                            <td>{{ $extended_order->payment_method }}</td>
                                            <td>{{ $extended_order->sub_total }}</td>
                                            <td>{{ $extended_order->total }}</td>
                                            <td>{{ $extended_order->owner_total }}</td>
                                            <td>{{ $extended_order->cash_back_amount }}</td>
                                            <td>{{ $extended_order->application_amount }}</td>
                                            <td>{{ $extended_order->tax_amount }}</td>
                                            <!-- @midoshriks@order_details -->
                                            <td>Not found</td>
                                            <!-- @endEdit -->
                                            <!-- @midoshriks@order_details_paid -->
                                            <td>{{ $extended_order->paid }}</td>
                                            <!-- @endEdit -->
                                            <td><a href="{{ route('extended_order.invoice.pdf', $extended_order->id) }}"
                                                    class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></td>
                                                {{-- mo2men@date --}}
                                                    {{-- <td>{{ $extended_order->created_at }}</td> --}}
                                            <td>{{ @date("Y-m-d H:i:s", strtotime($extended_order->created_at." +3 hours")) }}</td>
                                                {{-- endEdit@date --}}

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>






                <!-- @midoshriks@DelayLogs -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Delay Logs</h4>

                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">


                            <div class="table-responsive">
                                <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>Status</th>
                                            <th>Duration</th>
                                            <th>Sub Total</th>
                                            <th>Total</th>
                                            <th>owner total</th>
                                            <th>cash back amount</th>
                                            <th>Application Commission</th>
                                            <th>Tax</th>
                                            <!-- @midoshriks@order_details -->
                                            <th>service fees</th>
                                            <!-- @midoshriks@order_details_paid -->
                                            <th>paid</th>
                                            <!-- @endEdit -->
                                            {{-- <th>PDF</th> --}}
                                            <th>At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($delay_logs as $k => $delay_log)

                                        <tr>
                                            <td style="width:80px">{{ $k + 1 }}</td>
                                            <td>Delay</td>
                                            <td>{{ $delay_log->duration }}</td>
                                            <td>{{ $delay_log->sub_total }}</td>
                                            <td>{{ $delay_log->total }}</td>
                                            <td>{{ $delay_log->owner_total }}</td>
                                            <td>{{ $delay_log->cash_back_amount }}</td>
                                            <td>{{ $delay_log->application_amount }}</td>
                                            <td>{{ $delay_log->tax_amount }}</td>
                                            <!-- @midoshriks@order_details -->
                                            <td>Not found</td>
                                            <!-- @endEdit -->
                                            <!-- @midoshriks@order_details_paid -->
                                            <td>{{ $delay_log->paid }}</td>
                                            <!-- @endEdit -->
                                            {{-- <td><a href="{{ route('extended_order.invoice.pdf', $extended_order->id) }}"
                                            class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></td> --}}
                                            {{-- mo2men@date --}}
                                            <td>{{ $delay_log->created_at }}</td>
                                            <td>{{ @date("Y-m-d H:i:s", strtotime($delay_log->created_at." +3 hours")) }}</td>
                                                {{-- endEdit@date --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- @endEdit -->
            </div>
        </div>
    </section>
</div>


@endsection

@push('scripts')

<script>

</script>

@endpush