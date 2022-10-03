@extends('admin.layout')

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')

<!-- @midoshriks-3 -->
    <!-- Basic form layout section start -->
    <div class="content-body">
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Edit: {{ $status->ar_title }}</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form"  method="post"  action="{{route("admin.report_status.store.update",$status->id)}}" enctype="multipart/form-data"  class="form form-horizontal needs-validation">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="model" value="support_help">

                                    <div class="form-body">

                                        <div class="row">

                                            <!-- <div id="error_from" style="display:none" class="alert alert-danger col-md-10 mb-2">
                                                <ul>
                                                </ul>
                                            </div> -->

                                            <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::label('ar_name', 'ar name', ['class' => 'col-md-12']) }}
                                            {{ Form::text('ar_name', @$status->ar_name, ['class' => 'form-control', 'id' => 'ar_name', 'placeholder' => 'Entery your ar name', 'required']) }}
                                            <div class="invalid-tooltip">
                                                Name is Required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::label('en_name', 'en name', ['class' => 'col-md-12']) }}
                                            {{ Form::text('en_name', @$status->en_name, ['class' => 'form-control', 'id' => 'en_name', 'placeholder' => 'Entery your en name', 'required']) }}
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