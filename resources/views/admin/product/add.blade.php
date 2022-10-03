@extends('admin.layout')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('content')

    <!-- Mido div Add product -->

    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="horizontal-form-layouts">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Add product</h4>
                        </div>

                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form" method="post" action="{{ route('admin.products.create') }}"
                                    enctype="multipart/form-data" class="form form-horizontal needs-validation">
                                    @csrf

                                    <div class="form-body">

                                        <div class="col-md-12">
                                            <!-- user id -->
                                            {{ Form::label('User_ID', 'User', ['class' => 'col-md-12']) }}
                                            <select name="user_id" id=""
                                                class="form-control select2 select2-hidden-accessible">
                                                <?php foreach ($users as $key => $user) { ?>
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                <?php } ?>
                                            </select>
                                            <!-- user id -->
                                        </div>
                                        <div class="col-md-12">
                                            <!-- jop id -->
                                            {{ Form::label('job_id', 'job', ['class' => 'col-md-12']) }}
                                            <select name="job_id" id=""
                                                class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                                data-placeholder="Select a State" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($jobs as $key => $jobs) { ?>
                                                <option value="{{ $jobs->id }}"> {{ $jobs->ar_name }} </option>
                                                <?php } ?>
                                            </select>
                                            <!-- jop id -->
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Category-->
                                            {{ Form::label('Category', 'Category', ['class' => 'col-md-12']) }}
                                            <select name="categories[]" id=""
                                                class="form-control select2 select2-hidden-accessible" multiple=""
                                                style="width: 100%;" data-placeholder="Select a State" tabindex="-1"
                                                aria-hidden="true">
                                                <?php foreach ($categories as $key => $categories) { ?>
                                                <option value="{{ $categories->id }}"> {{ $categories->ar_name }}
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <!-- Category -->
                                        </div>





                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('Title_name', 'Title product', ['class' => 'col-md-12']) }}
                                                {{ Form::text('ar_title', '', ['class' => 'form-control', 'id' => 'Title', 'placeholder' => 'ENTER Your Title product', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('en_description', 'description product', ['class' => 'col-md-12']) }}
                                                {{ Form::textarea('en_description', '', ['class' => 'form-control', 'id' => 'en_description', 'placeholder' => 'ENTER Your description product', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('quantity', 'quantity product', ['class' => 'col-md-12']) }}
                                                {{ Form::text('quantity', '', ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'ENTER Your quantity product', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('price-per-day', 'price per day product', ['class' => 'col-md-12']) }}
                                                {{ Form::text('price_per_day', '', ['class' => 'form-control', 'id' => 'price_per_day', 'placeholder' => 'ENTER Your price per day product 00,0', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('replacement_cost', 'replacement cost product ', ['class' => 'col-md-12']) }}
                                                {{ Form::text('replacement_cost', '', ['class' => 'form-control', 'id' => 'replacement_cost', 'placeholder' => 'ENTER Your Replacement cost product 00,0', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('status', 'status product', ['class' => 'col-md-12']) }}
                                                <!-- status -->
                                                <select name="status" id="" class="form-control">
                                                    <?php foreach ($status as $key => $statu) { ?>
                                                    <option value="{{ $statu->id }}"> {{ $statu->ar_name }}</option>
                                                    <?php } ?>
                                                </select>
                                                <!-- status -->

                                                <!-- {{ Form::text('status', '', ['class' => 'form-control', 'id' => 'status', 'placeholder' => 'status product']) }}
                                                        <div class="invalid-tooltip">
                                                            Name is Required
                                                        </div> -->

                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('delivery_types', 'delivery types product', ['class' => 'col-md-12']) }}
                                                <!-- delivery_types -->
                                                <select name="delivery_types" id="" class="form-control">
                                                    <?php foreach ($delivery_types as $key => $deliverytype)
                                                    { ?>
                                                    <option value="{{ $deliverytype->id }}">
                                                        {{ $deliverytype->ar_name }}
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <!-- delivery_types -->

                                                <!-- {{ Form::text('delivery_types', '', ['class' => 'form-control', 'id' => 'delivery_types', 'placeholder' => 'delivery_types product', 'required']) }}
                                                        <div class="invalid-tooltip">
                                                            Name is Required
                                                        </div> -->

                                            </div>
                                        </div>

                                        <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('categories', 'categories product', ['class' => 'col-md-12']) }}
                                                {{ Form::text('categories', '', ['class' => 'form-control', 'id' => 'categories', 'placeholder' => 'categories product', 'required']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('ar_name', 'ar Name product', ['class' => 'col-md-12']) }}
                                                {{ Form::text('ar_name', '', ['class' => 'form-control', 'id' => 'ar_name', 'placeholder' => 'ar Name product']) }}
                                                <div class="invalid-tooltip">
                                                    Name is Required
                                                </div>
                                            </div>
                                        </div> -->


                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                {{ Form::label('photo', 'Add photo product', ['class' => 'col-md-12']) }}
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    {{ Form::file('images[]', ['data-name' => 'image', ' data-type' => 'single', 'class' => 'form-control files', 'required', 'multiple']) }}
                                                    <div class="output_photos">
                                                        <div class="msg"></div>
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

            <!-- Mido div Add product -->

        @endsection

        @push('scripts')

            <!--select2-->
            <script src="{{ asset('admin_files/assets//plugins/select2/js/select2.js') }}"></script>
            <script src="{{ asset('admin_files/assets//js/pages/select2/select2-init.js') }}"></script>
            <!-- end js include path -->

            <!-- @mido Edit -->
            <script>
                type = "text/javascript" >
                    $(document).ready(function() {
                        $('.select2').select2({
                            closeOnSelect: false
                        });
                    });

            </script>
            <!-- @end -->

        @endpush
