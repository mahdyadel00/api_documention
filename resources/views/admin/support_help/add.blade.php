@extends('admin.layout')

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')

    <!-- @midoShriks-2 -->

    <!-- Basic form layout section start -->
    <div class="content-body">
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Add status</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form"  method="post"  action="{{route("admin.support_help.store")}}" enctype="multipart/form-data"  class="form form-horizontal needs-validation">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                            <!-- <div id="error_from" style="display:none" class="alert alert-danger col-md-10 mb-2">
                                                <ul>
                                                </ul>
                                            </div> -->


                                    <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::label('ar_title', 'ar title', ['class' => 'col-md-12']) }}
                                            {{ Form::text('ar_title', '', ['class' => 'form-control', 'id' => 'ar_title', 'placeholder' => 'Entery your ar title', 'required']) }}
                                            <div class="invalid-tooltip">
                                                Name is Required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::label('en_title', 'en title', ['class' => 'col-md-12']) }}
                                            {{ Form::text('en_title', '', ['class' => 'form-control', 'id' => 'en_title', 'placeholder' => 'Entery your en title', 'required']) }}
                                            <div class="invalid-tooltip">
                                                Name is Required
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('ar_desc', 'ar description', ['class' => 'col-md-12']) }}
                                            {{ Form::textarea('ar_desc', '', ['class' => 'form-control', 'id' => 'ar_desc', 'placeholder' => 'Entery your ar description', 'required']) }}
                                            <div class="invalid-tooltip">
                                                Name is Required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('en_desc', 'en description', ['class' => 'col-md-12']) }}
                                            {{ Form::textarea('en_desc', '', ['class' => 'form-control', 'id' => 'en_desc', 'placeholder' => 'Entery your en description', 'required']) }}
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

    <!--select2-->
    <script src="{{ asset('admin_files/assets//plugins/select2/js/select2.js') }}" ></script>
    <script src="{{ asset('admin_files/assets//js/pages/select2/select2-init.js') }}" ></script>
    <!-- end js include path -->

    <script>
    </script>

@endpush