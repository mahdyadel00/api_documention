@extends('admin.layout')

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('content')


    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Add Advertisement</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
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
                                </div>
                                <form id="form" method="post" action="{{ route('admin.advertisement.store') }}"
                                    enctype="multipart/form-data" class="form form-horizontal needs-validation">
                                    @csrf

                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none"
                                                class="alert alert-danger col-md-10 mb-2">
                                                <ul> </ul>
                                            </div>


                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('en_title', 'Title', ['class' => 'col-md-3']) }}
                                                    {{ Form::text('en_title', '', ['class' => 'form-control', 'id' => 'en_title', 'placeholder' => '', 'required']) }}
                                                </div>
                                            </div>




                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('en_description', 'Description (en) ', ['class' => 'col-md-3']) }}
                                                    {{ Form::textarea('en_description', '', ['class' => ' form-control']) }}
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('ar_description', 'Description (ar) ', ['class' => 'col-md-3']) }}
                                                    {{ Form::textarea('ar_description', '', ['class' => ' form-control']) }}

                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('products', 'Products ', ['class' => 'col-md-12']) }}
                                                    {{-- {{ Form::select("product_id", $products ,null, ['class' => ' form-control select2', 'required' => 'required' ]) }} --}}
                                                    <select name="product_id" id="" class="form-control">
                                                        <option value="">choose</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->ar_title }} - {{ $product->user->username }} -
                                                                {{ $product->user->phone }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- @midoShriks@Advertisement_link -->
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('link', 'Enter you https:// URL: ', ['class' => 'col-md-12']) }}
                                                    {{ Form::url('link', '', ['class' => ' form-control']) }}
                                                </div>
                                            </div>
                                            <!-- @end@edit -->

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('is_active', 'Active ', ['class' => 'col-md-2']) }}
                                                    {{ Form::checkbox('is_active', 1, 1, ['class' => '']) }}

                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {{ Form::label('photo', 'photo ', ['class' => 'col-md-3']) }}
                                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                                        {{ Form::file('image', ['data-name' => 'image', ' data-type' => 'single', 'class' => 'form-control files', 'required']) }}
                                                        <div class="output_photos">
                                                            <div class="msg"></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <!--                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        {{ Form::label('link', 'Link (URL) ', ['class' => 'col-md-3']) }}
                                                        {{ Form::text('link', '', ['class' => 'form-control']) }}

                                                    </div>
                                                </div>-->


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
    <script src="{{ asset('admin_files/assets//plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('admin_files/assets//js/pages/select2/select2-init.js') }}"></script>
    <!-- end js include path -->


@endpush
