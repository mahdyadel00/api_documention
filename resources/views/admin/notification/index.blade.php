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
                            <h4 class="card-title" style="margin: 0;">Send Notification</h4>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert round alert-success alert-icon-left mb-2" role="alert">
                                        <span class="alert-icon">
                                            <i class="ft-info"></i>
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session()->get('success') }}</strong>

                                    </div>

                                @endif
                                <div class="card-text">

                                </div>
                                {{-- mo2men@mail --}}
                                @if ( request()->get('send') == 'mail')                                    
                                <form id="form"  method="post"  action="{{route("admin.notifications.send_mail")}}"  class="form form-horizontal needs-validation">
                                    @else
                                    <form id="form"  method="post"  action="{{route("admin.notifications.send")}}"  class="form form-horizontal needs-validation">
                                    @endif
                                    {{-- endEdit@mail --}}
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                                 <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label>Clients</label>
                                                            <select name="users[]" multiple="multiple" id="users" class="select2 select2_multiple form-control" required >
                                                               @foreach ($users as $k => $user)
                                                                   <option  value="{{$user->id}}">{{$user->name}}</option>
                                                               @endforeach
                                                           </select>
                                                            <input type="checkbox" id="checkbox" > 
                                                            <label style="cursor: pointer" for="checkbox">Select All</label>
                                                        </div>
                                                    </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" required />
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Message (Body)</label>
                                                    <input type="text" name="body" class="form-control" required />
                                                </div>
                                            </div>



                                        </div>

                                        <div class="form-actions right">
                                            <button type="submit" class="btn btn-danger mr-1">
                                                <i class="ft-x"></i> Send
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

$(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#users").find('option').prop("selected",true);
        $("#users").trigger('change');
      } else { //deselect all
        $("#users").find('option').prop("selected",false);
        $("#users").trigger('change');
      }
  });
});

</script>

@endpush
