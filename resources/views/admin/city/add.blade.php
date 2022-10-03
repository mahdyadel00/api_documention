@extends('admin.layout')

@push('head')

@endpush
@section('content')


    <div class="content-body"><!-- Basic form layout section start --> 
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Add Page</h4>
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
                                <form id="form"  method="post"  action="{{route("admin.city.store")}}" enctype="multipart/form-data"  class="form form-horizontal needs-validation">
                                    @csrf

                                    <div class="form-body">

                                        <div class="row">


                                                 <div class="col-md-10">
                                                        <div class="form-group">
                                                            {{ Form::label("en_name", "Name (En)",['class' => 'col-md-3']) }}
                                                            {{ Form::text("en_name", '' , ['class' => 'form-control' , 'id' =>  "en_name", 'placeholder'=>"","required"]) }}
                                                            <div class="invalid-tooltip">
                                                                Name is Required
                                                            </div>
                                                        </div>
                                                    </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("ar_name", "Name (Ar)",['class' => 'col-md-3']) }}
                                                    {{ Form::text("ar_name", '' , ['class' => 'form-control' , 'id' =>  "ar_name", 'placeholder'=>"","required"]) }}
                                                  
                                                </div>
                                            </div>




                                        </div>

                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
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

    <script>




    </script>

@endpush
