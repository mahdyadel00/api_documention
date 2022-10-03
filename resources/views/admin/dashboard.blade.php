                    {{-- mo2men@accountant --}}
                    @extends('admin.layout')

@section('content')
    <style>
        .info-box {
            width: 110%;
        }

    </style>
    <div class="content-body">

        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-orange" style="min-height: 160px;">
                        <span class="info-box-icon push-bottom"><i class="material-icons">shopping_cart</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Orders</span>
                            <span class="info-box-number">{{ $orders_count }}</span>
                            <div style="clear: both"></div>
                            <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-dark"><i class="fa fa-share"></i>
                                More</a>
                        </div>
                        <p><b>New orders: </b>{{ $new_orders }}</p>
                        <p><b>Orders in progress: </b>{{ $progress_orders }}</p>
                        <p><b>Compeleted orders: </b>{{ $compeleted_orders }}</p>
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-purple">
                        <span class="info-box-icon push-bottom"><i class="fa fa-cubes"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="info-box-number">{{ $products_count }}</span>
                            <div style="clear: both"></div>
                            <a href="{{ route('admin.products') }}" class="btn btn-sm btn-dark"><i
                                    class="fa fa-share"></i> More</a>
                        </div>

                        <p><b>Blocked products: </b>{{ $blocked_products }}</p>
                        <p><b>Inactive products: </b>{{ $disabled_products }}</p>
                        <p><b>Active Products: </b>{{ $activated_products }}</p>
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-cyan">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Clients</span>
                            <span class="info-box-number">{{ $clients_count }}</span>
                            <div style="clear: both"></div>
                            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-dark"><i class="fa fa-share"></i>
                                More</a>
                        </div>
                        <p><b>Active Users: </b>{{ $activated_users }}</p>
                        <p><b>Inactive Users: </b>{{ $disabled_users }}</p>
                        <p><b>Blocked Users: </b>{{ $blocked_users }}</p>
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <!-- @midoshriks --> --}}
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-yellow">
                        <!-- <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span> -->
                        <span class="info-box-icon push-bottom"><i class="fa fa-bullhorn"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Submitted Order</span>
                            <span class="info-box-number">{{ $SubmittedOrder_count }}</span>
                            <div style="clear: both"></div>
                            <a href="{{ route('admin.submittedorder') }}" class="btn btn-sm btn-dark"><i
                                    class="fa fa-share"></i> More</a>
                        </div>
                        <p><b>Active Products: </b>{{ $activated_SubmittedOrder }}</p>
                        <p><b>Blocked products: </b>{{ $blocked_SubmittedOrder }}</p>
                        <p><b>Inactive products: </b>{{ $disabled_SubmittedOrder }}</p>
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <!-- @endEdite --> --}}
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-black" style="min-height: 160px;">
                        <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Orders</span>
                            <span class="info-box-number">{{ number_format($total_orders, 2) }} </span><span>SAR</span>

                        </div>
                        <p><b>Total Tax: </b>{{ number_format($total_tax, 2) }} <span>SAR</span></p>
                        <p><b>Service Fees: </b>{{ number_format($service_fees, 2) }} <span>SAR</span></p>
                        {{-- <p><b>Cash back Total: </b>{{ number_format($cash_back_amount, 2) }}</p> --}}
                        <p><b>Application Total: </b>{{ number_format($application_amount, 2) }} <span>SAR</span></p>
                        <p><b>Users Total: </b>{{ number_format($owner_total, 2) }} <span>SAR</span></p>
                        {{-- <p><b>Inactive products: </b>{{ $disabled_SubmittedOrder }}</p> --}}
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
          


                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue" style="min-height: 160px;">
                        <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Application dues</span>
                            <span class="info-box-number">{{ number_format($application_amount + $total_tax + $service_fees, 2) }} </span><span>SAR</span>

                        </div>
                        <p><b>Application Total: </b>{{ number_format($application_amount, 2) }} <span>SAR</span></p>
                        <p><b>Total Tax: </b>{{ number_format($total_tax, 2) }} <span>SAR</span></p>
                        <p><b>Service Fees: </b>{{ number_format($service_fees, 2) }} <span>SAR</span></p>
                        
                        <p style="color:red"><b>Pending Total: </b>{{ number_format($total_unpaid, 2) }} <span>SAR</span></p>

                        
                        {{-- <p><b>Cash back Total: </b>{{ number_format($cash_back_amount, 2) }}</p> --}}
                        {{-- <p><b>Inactive products: </b>{{ $disabled_SubmittedOrder }}</p> --}}
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>




                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-pink" style="min-height: 160px;">
                        <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Wallets</span>
                            <span class="info-box-number">{{ number_format($wallet_total, 2) }} </span><span>SAR</span>

                        </div>
                   
                        <div style="clear: both"></div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
          
                <!-- /.col -->
            </div>
        </div>
        <!-- end widget -->
        <!-- chart start -->
        <div class="row">
            <div class="col-sm-8">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Total Rents</header>
                    </div>
                    <div class="card-body no-padding height-9">
                        <div class="row">
                            <canvas id="canvas1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Best Renting Products</header>

                    </div>
                    <div class="card-body no-padding height-9">
                        <div class="row">
                            <canvas id="chartjs_pie"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@push('scripts')

    <!-- chart js -->
    <script src="{{ asset('admin_files/assets/plugins/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/chart-js/utils.js') }}"></script>
    <script>
        $(document).ready(function() {
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100);
            };

            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: JSON.parse('{!! json_encode($order_products_values) !!}'),
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.purple,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.blue,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: JSON.parse('{!! json_encode($order_products_keys) !!}'),
                },
                options: {
                    responsive: true,
                    tooltips: {
                        callbacks: {
                            title: function(tooltipItem, data) {
                                return data['labels'][tooltipItem[0]['index']];
                            },
                            label: function(tooltipItem, data) {
                                return data['datasets'][0]['data'][tooltipItem['index']] + " times";
                            },
                            afterLabel: function(tooltipItem, data) {
                                var dataset = data['datasets'][0];
                                var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset[
                                    "_meta"][0]['total']) * 100);
                                return '(' + percent + '%)';
                            }
                        },
                    },
                }
            };

            var ctx = document.getElementById("chartjs_pie").getContext("2d");
            window.myPie = new Chart(ctx, config);
        });

        $(document).ready(function() {
            var color = Chart.helpers.color;

            var barChartData = {
                labels: JSON.parse('{!! json_encode($orders_per_month_keys) !!}'),
                datasets: [{
                        type: 'bar',
                        label: 'Total Rents Bar',
                        backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.red,
                        data: JSON.parse('{!! json_encode($orders_per_month_values) !!}')
                    }, {
                        type: 'line',
                        label: 'Total Rents Curve',
                        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.blue,
                        data: JSON.parse('{!! json_encode($orders_per_month_values) !!}')
                    },
                    /*{
                        type: 'bar',
                        label: 'Dataset 3',
                        backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.green,
                        data: JSON.parse('{!! json_encode($orders_per_month_values) !!}')
                    }*/
                ]
            };

            var ctx = document.getElementById("canvas1").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Total Rents per month'
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Price SAR'
                            },
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return value >= 1000 ?
                                        value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                                        ' SAR' :
                                        value + ' SAR';
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(t, d) {
                                var xLabel = d.datasets[t.datasetIndex].label;
                                var yLabel = t.yLabel >= 1000 ?
                                    t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' SAR' :
                                    t.yLabel + ' SAR';
                                return xLabel + ': ' + yLabel;
                            }
                        }
                    },
                }
            });


        });

    </script>

@endpush
                {{-- endEdit@accountant --}}
