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
                            <h4 class="card-title" style="margin: 0;">Add Category</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form"  method="post"  action="{{route("admin.job.store")}}" enctype="multipart/form-data"  class="form form-horizontal needs-validation">
                                    @csrf

                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none" class="alert alert-danger col-md-10 mb-2">

                                                <ul>

                                                </ul>
                                            </div>


                                                 <div class="col-md-10">
                                                        <div class="form-group">
                                                            {{ Form::label("en_name", "En Name ",['class' => 'col-md-3']) }}
                                                            {{ Form::text("en_name", '' , ['class' => 'form-control' , 'id' =>  "en_name", 'placeholder'=>"En Name ","required"]) }}
                                                            <div class="invalid-tooltip">
                                                                Name is Required
                                                            </div>
                                                        </div>
                                                    </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("ar_name", "ar Name ",['class' => 'col-md-3']) }}
                                                    {{ Form::text("ar_name", '' , ['class' => 'form-control' , 'id' =>  "ar_name", 'placeholder'=>"ar Name "]) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
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
