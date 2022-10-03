@extends('admin.layout')

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')


    <div class="content-body"><!-- Basic form layout section start -->
        <section id="horizontal-form-layouts">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin: 0;">Edit: {{ $status->en_name }}</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">

                                </div>
                                <form id="form"  method="post"  action="{{route("admin.distinguish.status.update",$status->id)}}" enctype="multipart/form-data"  class="form form-horizontal needs-validation">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">

                                        <div class="row">

                                            <div id="error_from" style="display:none" class="alert alert-danger col-md-10 mb-2">

                                                <ul>

                                                </ul>
                                            </div>


                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("en_name", "En Name ",['class' => 'col-md-3']) }}
                                                    {{ Form::text("en_name", $status->en_name , ['class' => 'form-control' , 'id' =>  "en_name", 'placeholder'=>"En Name ","required"=>"required"]) }}

                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("ar_name", "ar Name ",['class' => 'col-md-3']) }}
                                                    {{ Form::text("ar_name", $status->ar_name , ['class' => 'form-control' , 'id' =>  "ar_name", 'placeholder'=>"ar Name "]) }}

                                                </div>
                                            </div>
                                            
                                              <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("ar_description", "Ar Description ",['class' => 'col-md-3']) }}
                                                    {{ Form::textarea("ar_description", $status->ar_description , ['class' => 'form-control' , 'id' =>  "ar_description", 'placeholder'=>"Ar Description ","required"=>"required"]) }}

                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("en_description", "En Description ",['class' => 'col-md-3']) }}
                                                    {{ Form::textarea("en_description", $status->en_description , ['class' => 'form-control' , 'id' =>  "en_description", 'placeholder'=>"En Description "]) }}

                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12 col-xs-12">


                                                <div class="form-group">
                                                    {{ Form::label("photo", "photo ",['class' => 'col-md-3']) }}
                                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                                        {{ Form::file("image" , ['data-name' => 'image' , ' data-type' =>  "single",'class'=>'form-control files']) }}

                                                        <img src="{{ asset('thumbs/'.$status->image) }}" style="width:100px;height:80px" />
                                                        <div class="output_photos">
                                                            <div class="msg"></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            
                                            
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("price_for_once", "Price for Once",['class' => 'col-md-3']) }}
                                                    {{ Form::text("price_for_once",$status->price_for_once , ['class' => 'form-control' , 'id' =>  "price_for_once"]) }}
                                                   
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("price_for_twice", "Price for Twice ",['class' => 'col-md-3']) }}
                                                    {{ Form::text("price_for_twice",$status->price_for_twice , ['class' => 'form-control' , 'id' =>  "price_for_twice"]) }}
                                                   
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-10">
                                                <div class="form-group">
                                                    {{ Form::label("price_for_three_times", "Price for 3 times",['class' => 'col-md-3']) }}
                                                    {{ Form::text("price_for_three_times", $status->price_for_three_times , ['class' => 'form-control' , 'id' =>  "price_for_three_times"]) }}
                                                   
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
