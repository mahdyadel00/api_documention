@extends('admin.layout')

@push('head')

@endpush
@section('content')

    <div class="content-body">
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">{{ $title }}</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
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

                                </div>
                                <form id="form"  method="post"  action="{{route("admin.settings.cash_back_percentage.update")}}"  class="form form-horizontal needs-validation">
                                    @csrf
                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none" class="alert alert-danger col-md-10 mb-2">
                                                <ul></ul>
                                            </div>


                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label("cash_back_percentage", "Cash Back Percentage",['class' => 'col-md-12']) }}
                                                    {{ Form::number("cash_back_percentage", $general_setting->cash_back_percentage , ['class' => 'form-control' , 'id' =>  "cash_back_percentage", 'placeholder'=>"Cash Back %","required"]) }}

                                                </div>
                                                
                                                 <div class="form-group">
                                                    {{ Form::label("application_percentage", "Application Percentage",['class' => 'col-md-12']) }}
                                                    {{ Form::number("application_percentage", $general_setting->application_percentage , ['class' => 'form-control' , 'id' =>  "application_percentage", 'placeholder'=>"Application Percentage %","required"]) }}

                                                </div>
                                                
                                                 <div class="form-group">
                                                    {{ Form::label("tax_percentage", "Taxes Percentage",['class' => 'col-md-12']) }}
                                                    {{ Form::number("tax_percentage", $general_setting->tax_percentage , ['class' => 'form-control' , 'id' =>  "tax_percentage", 'placeholder'=>"Taxes %","required"]) }}

                                                </div>      
                                                
                                                
                                                 <div class="form-group">
                                                    {{ Form::label("service_fees", "Service Fees",['class' => 'col-md-12']) }}
                                                    {{ Form::number("service_fees", $general_setting->service_fees , ['class' => 'form-control' , 'id' =>  "service_fees", 'placeholder'=>"Service Fees 0","required"]) }}
                                                </div>


                                                <div class="form-group">
                                                    {{ Form::label("max_amount", "Max Amount",['class' => 'col-md-12']) }}
                                                    {{ Form::number("max_amount", $general_setting->max_amount , ['class' => 'form-control' , 'id' =>  "max_amount", 'placeholder'=>"Max Amount 0","required"]) }}
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-actions right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>
        <!-- // Basic form layout section end -->
    </div>


@endsection

@push('scripts')

@endpush
