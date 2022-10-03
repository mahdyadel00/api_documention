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
                            <h4 class="card-title">Deposit / Withdraw</h4>

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

                                <form method="post"
                                    action="{{ route('admin.user.transacion.action', $user_details->id) }}">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('type', 'Transaction Type', ['class' => 'col-md-12']) }}
                                            <select class="form-control" name="type">
                                                <option value="deposit">Deposit</option>
                                                <option value="withdrawal">Withdrawal</option>
                                                <option value="refunds">Refunds</option>
                                                <option value="debts">Debts</option>
                                                <option value="recover">Recover</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('amount', 'Amount', ['class' => 'col-md-12']) }}
                                            {{ Form::number('amount', '', ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '']) }}

                                        </div>
                                    </div>

                                    <div class="form-actions right">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Accounting Transactions</h4>

                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table style="text-align: center"
                                        class="mdl-data-table ml-table-striped ml-table-bordered mdl-js-data-table is-upgraded"
                                        style="width: 100%">
                                        <tbody>
                                            <tr>
                                                <th>Recover</th>
                                                <td>{{ $user_details->recover }} SAR</td>
                                                {{-- <td>{{ $debts->recover }} SAR</td> --}}
                                            </tr>

                                            {{-- <tr>
                                                <th>Refunds</th>
                                                <td>{{ $user_details->refunds }} SAR</td>

                                            </tr> --}}
                                        </tbody>
                                    </table>
                                    <h3>Max Value {{ $max_amount }} SAR</h3>
                                    <div>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Transactions</h4>

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
                                                <th>Amount</th>
                                                <th>Type</th>

                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($pending_transactions as $k => $wallet)

                                                <tr>
                                                    <td style="width:80px">{{ $k + 1 }}</td>
                                                    <td>{{ $wallet->sign . $wallet->amount }} SAR</td>
                                                    <td>{{ $wallet->type }}</td>

                                                    <td>{{ $wallet->created_at }}</td>
                                                    <td>
                                                        <form method="post"
                                                            action="{{ route('admin.user.transacion.approve', $wallet->user_id) }}">
                                                            @csrf
                                                            <input type="hidden" name="wallet_id"
                                                                value="{{ $wallet->id }}" />
                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>

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
                                                    <td>{{ $payment->created_at }}</td>
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
                                                    <td>{{ $wallet->created_at }}</td>
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

    </script>

@endpush
