@extends('admin.layout')

@push('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')

    <div class="content-body"><!-- Basic form layout section start -->

        <!-- Ajax sourced data -->
        <section id="ajax">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$title ?? ''}}</h4>
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
                                    
                                    <table  class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Chat Logs</th>
                                            <!-- <th>Product</th>
                                            <th>Delivery method</th>
                                            <th>Status</th>
                                            <th>Sub Total</th>
                                            <th>Taxes</th>
                                            <th>Total</th>
                                            <th>App Commission</th>
                                            <th>Owner Total</th>
                                            <th style="width: 168px;">Created At</th>
                                            <th>Chat Logs</th>
                                            <th>Transactions</th>
                                            <th>Details</th>
                                            <th>PDF</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($messages as $K=> $message)
                                        <tr>
                                        <td> <?= $i; $i++?> </td>
                                        <td>{{$message->name}}</td>
                                        {{-- <!-- @mido --> --}}
                                        <td><a href="/admin/submittedorder/chat/logs/{{$submittedOrder->id}}/{{$submittedOrder->user->id}}/{{$message->user_id}}"><small class="badge badge-danger">{{ $message->total }}</small> <i class="fa fa-comment-o"></i></a></td>
                                        
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
        </section>
        <!--/ Ajax sourced data -->

        <!-- // Basic form layout section end -->
    </div>

@endsection

