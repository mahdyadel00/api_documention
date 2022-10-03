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
                            <h4 class="card-title" style="margin: 0;">Edit: {{ $user->name }}</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form" method="post" action="{{ route('admin.user.update', $user->id) }}"
                                    enctype="multipart/form-data" class="form form-horizontal needs-validation">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none"
                                                class="alert alert-danger col-md-12 mb-2">

                                                <ul>

                                                </ul>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('name', 'Name ', ['class' => 'col-md-3']) }}
                                                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name ', 'required']) }}
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('username', 'username ', ['class' => 'col-md-3']) }}
                                                    {{ Form::text('username', $user->username, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'username ', 'required']) }}
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('email', 'Email', ['class' => 'col-md-3']) }}
                                                    {{ Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail', 'required']) }}

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('phone', 'Phone', ['class' => 'col-md-3']) }}
                                                    {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone', 'required']) }}

                                                </div>
                                            </div>


                                            <!-- @midoshriks@Membership -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('membership', 'Membership', ['class' => 'col-md-3']) }}
                                                    {{ Form::text('membership', $user->membership, ['class' => 'form-control', 'id' => 'membership', 'placeholder' => 'membership', 'required']) }}
                                                </div>
                                            </div>
                                            <!-- @endEdit -->

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label('cash_back_percentage', 'Cash Back Percentage', ['class' => 'col-md-12']) }}
                                                    {{ Form::number('cash_back_percentage', $user->cash_back_percentage, ['class' => 'form-control', 'id' => 'cash_back_percentage', 'placeholder' => 'Cash Back %']) }}

                                                </div>
                                            </div> 
                                        

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label('application_percentage', 'Application Percentage', ['class' => 'col-md-12']) }}
                                                    {{ Form::number('application_percentage', $user->application_percentage, ['class' => 'form-control', 'id' => 'application_percentage', 'placeholder' => 'Application Percentage %']) }}

                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label('tax_percentage', 'Taxes Percentage', ['class' => 'col-md-12']) }}
                                                    {{ Form::number('tax_percentage', $user->tax_percentage, ['class' => 'form-control', 'id' => 'tax_percentage', 'placeholder' => 'Taxes percentage %']) }}

                                                </div>
                                            </div>

                                                
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label('max_amount', 'Cash Back max_amount', ['class' => 'col-md-12']) }}
                                                    {{ Form::number('max_amount', $user->max_amount, ['class' => 'form-control', 'id' => 'max_amount', 'placeholder' => 'Max amount', "step"=>"0.01"]) }}

                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    {{ Form::label('status', 'Status', ['class' => 'col-md-12']) }}
                                                    <select name='status' class="form-control">
                                                        <option {{ $user->status == 'activated' ? 'selected' : '' }}
                                                            value="activated">Activated</option>
                                                        <option {{ $user->status == 'deactivated' ? 'selected' : '' }}
                                                            value="deactivated">Deactivated</option>
                                                        <option {{ $user->status == 'blocked' ? 'selected' : '' }}
                                                            value="blocked">Blocked</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('password', 'Password', ['class' => 'col-md-3']) }}
                                                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password']) }}

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-3']) }}
                                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Confirm Password']) }}

                                                </div>
                                            </div>

                                            <hr style="width:100%" />

                                            @if (0)
                                                <h4 class="col-md-12">Documented Info</h4>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('full_name_ar', 'Full Name (AR)', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('full_name_ar', $user->documentation->full_name_ar, ['class' => 'form-control', 'id' => 'full_name_ar', 'placeholder' => '']) }}

                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('full_name_en', 'Full Name (EN)', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('full_name_en', $user->documentation->full_name_en, ['class' => 'form-control', 'id' => 'full_name_en', 'placeholder' => '']) }}

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('id_number', 'ID Number', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('id_number', $user->documentation->id_number, ['class' => 'form-control', 'id' => 'id_number', 'placeholder' => '']) }}

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('id_create_date', 'ID Create Date', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('id_create_date', $user->documentation->id_create_date, ['class' => 'form-control', 'id' => 'id_create_date', 'placeholder' => '']) }}

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('id_expire_date', 'ID Expire Date', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('id_expire_date', $user->documentation->id_expire_date, ['class' => 'form-control', 'id' => 'id_expire_date', 'placeholder' => '']) }}

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('birth_day', 'birth Day', ['class' => 'col-md-6']) }}
                                                        {{ Form::date('birth_day', $user->documentation->birth_day, ['class' => 'form-control', 'id' => 'birth_day', 'placeholder' => '']) }}

                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('nationality', 'Nationality', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('nationality', $user->documentation->nationality, ['class' => 'form-control', 'id' => 'nationality', 'placeholder' => '']) }}

                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('bank_name', 'Bank name', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('bank_name', $user->documentation->bank_name, ['class' => 'form-control', 'id' => 'bank_name', 'placeholder' => '']) }}

                                                    </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('account_name', 'Account Name', ['class' => 'col-md-6']) }}
                                                        {{ Form::text('account_name', $user->documentation->account_name, ['class' => 'form-control', 'id' => 'account_name', 'placeholder' => '']) }}

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        {{ Form::label('gender', 'Gender', ['class' => 'col-md-6']) }}
                                                        {{ Form::select('gender', ['male' => 'male', 'female' => 'female'], $user->documentation->gender, ['class' => 'form-control', 'id' => 'gender', 'placeholder' => '']) }}
                                                    </div>
                                                </div>

                                                @if ($user->documentation->id_image)
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <img
                                                                src='{{ asset('uploads/' . $user->documentation->id_image) }}' />
                                                        </div>
                                                    </div>
                                                @endif



                                            @endif

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
