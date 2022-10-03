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
                            <h4 class="card-title">{{ $title ?? '' }} {{ @$payment->user->name }}</h4>
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
                                    <style>
                                        .mdl-data-table td{
                                            text-align: center
                                        }
                                    </style>
                                <div class="table-responsive">
                                    <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded" >
                                        <thead style="font-size: 18px;">
                                            {{-- @foreach ($userPayment as $k => $Payment) --}}
                                                <tr >
                                                    <td>Name</td>
                                                    <td>{{ @$payment->user->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{ @$payment->country }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Bank</td>
                                                    <td>{{ @$payment->bank_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Account Number</td>
                                                    <td>{{ @$payment->account_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td>IBAN Number</td>
                                                    <td>{{ @$payment->iban }}</td>
                                                </tr>
                                            {{-- @endforeach --}}
                                        </thead>
                                        <tbody>


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
