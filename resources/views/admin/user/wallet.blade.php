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
                                    <table class="mdl-data-table ml-table-striped ml-table-bordered mdl-js-data-table is-upgraded" style="width: 100%" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order</th>
                                            <th>Amount</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php    
                                            $total = 0;
                                        @endphp
                                        @foreach($wallet_logs as $k=>$wallet)
                                            @php
                                                $total += $wallet->amount;
                                            @endphp
                                            <tr>
                                                <td style="width:80px">{{ $k+1 }}</td>
                                                <td>{{ $wallet->order_id }}</td>
                                                <td>{{ $wallet->amount }} SAR</td>
                                                <td>{{ $wallet->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $wallet_logs->links() }}
                                
                                <div>
                                    <h3>Total Cash Back {{ $total }} SAR</h3>
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
