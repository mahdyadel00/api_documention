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
                        @if (@$documentations->id)
                        <h4 class="card-title" style="margin: 0;">Edit: {{ @$documentations->user->name }}</h4>
                        @else
                        <h4 class="card-title" style="margin: 0;">Add new Documentation: {{ @$user->name }}</h4>
                        @endif
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text">

                            </div>
                            {{-- {{$documentation}} --}}
                            @if (@$documentations->id_image)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img src='{{ asset('uploads/' . $documentations->id_image) }}' />
                                </div>
                            </div>
                            @endif

                            @if (@$documentations->id)
                            <form id="form" method="post"
                                action="{{route("admin.user.documentations.update",@$documentations->id)}}"
                                enctype="multipart/form-data" class="form form-horizontal needs-validation">
                                @method('PATCH')
                                @else
                                <form id="form" method="post" action="{{route("admin.user.documentation.create")}}"
                                    enctype="multipart/form-data" class="form form-horizontal needs-validation">
                                    @endif
                                    @csrf

                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none"
                                                class="alert alert-danger col-md-12 mb-2">
                                                <ul>
                                                </ul>
                                            </div>


                                            <input type="hidden" name="user_id" value="{{$user->id}}">

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('ar_title', 'full name ar', ['class' => 'col-md-12']) }}
                                                    {{ Form::text('full_name_ar', @$documentations->full_name_ar, ['class' => 'form-control', 'id' => 'full_name_ar', 'placeholder' => 'Entery your ar name', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('full_name_ar', 'full name en', ['class' => 'col-md-12']) }}
                                                    {{ Form::text('full_name_en', @$documentations->full_name_en, ['class' => 'form-control', 'id' => 'full_name_en', 'placeholder' => 'Entery your en name', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("gender", "Gender",['class' => 'col-md-6']) }}
                                                    {{ Form::select("gender" ,[''=>'select','male'=>'male','female'=>'female'] , @$documentations->gender,['class' => 'form-control' , 'id' =>  "gender", 'placeholder'=>""]) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('birth_day', 'Date of Birth', ['class' => 'col-md-12']) }}
                                                    {{ Form::date('birth_day', @$documentations->birth_day, ['class' => 'form-control', 'id' => 'birth_day', 'placeholder' => 'Entery your Date of Birth', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('nationality', 'Nationality', ['class' => 'col-md-12']) }}
                                                    {{ Form::text('nationality', @$documentations->nationality, ['class' => 'form-control', 'id' => 'nationality', 'placeholder' => 'Entery your Nationality', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('id_number', 'ID Number', ['class' => 'col-md-12']) }}
                                                    {{ Form::text('id_number', @$documentations->id_number, ['class' => 'form-control', 'id' => 'id_number', 'placeholder' => 'Entery your ID Number', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('id_create_date', 'The date of issuance of the identity card', ['class' => 'col-md-12']) }}
                                                    {{ Form::date('id_create_date', @$documentations->id_create_date, ['class' => 'form-control', 'id' => 'id_create_date', 'placeholder' => 'Entery your The date of issuance of the identity card', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label('id_expire_date', 'The expiry date of the residency ID', ['class' => 'col-md-12']) }}
                                                    {{ Form::date('id_expire_date', @$documentations->id_expire_date, ['class' => 'form-control', 'id' => 'id_expire_date', 'placeholder' => 'Entery your The expiry date of the residency ID', 'required']) }}
                                                    <div class="invalid-tooltip">
                                                        Name is Required
                                                    </div>
                                                </div>
                                            </div>



                                            {{-- <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::label('iban', 'iban', ['class' => 'col-md-12']) }}
                                            {{ Form::text('iban', @$documentations->iban, ['class' => 'form-control', 'id' => 'id_number', 'placeholder' => 'Entery your iban', 'required']) }}
                                            <div class="invalid-tooltip">
                                                Name is Required
                                            </div>
                                        </div>
                                    </div> --}}

                        </div>

                        <div>
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
                        @if ( @$documentations->user_id)
                        <div class="form-actions right">
                            <form method="post"
                                action="{{ route('admin.user.documentation.approve',$documentations->user_id) }}">
                                @csrf
                                <input type="hidden" name="wallet_id" value="{{ $documentations->user_id }}" />
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        </div>
                        @endif

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