@extends('admin.layout')

@push('head')

@endpush

@section('content')

<div class="content-body">
    <!-- Basic form layout section start -->

    <!-- Ajax sourced data -->
    <section id="ajax">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">
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

                            <div class="table-responsive">
                              
                            {{-- mo2men@dataTable --}}
                                <table class="display table-data mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                    style="width: 100%">
                                {{-- endEdit@dataTable --}}
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>City</th>
                                            <th>Email</th>
                                            <th>Membership</th>
                                            <th>Mobile</th>
                                            <th>Doc request</th>
                                            <th>tickets</th>
                                            <th>Recovery</th>
                                            <th>Max amount</th>
                                            <th>Payment information</th>
                                            <th>Reveiws</th>
                                            <th>Status</th>
                                            <th>Products</th>
                                            <th>submitted Orders</th>
                                            <th>Tenant</th>
                                            <th>Rented</th>
                                            <th>Transactions</th>
                                            <th>Signup</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $k => $user_val)

                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $user_val->name }}</td>
                                            <td>{{ $user_val->username }}</td>
                                            {{-- <td>{{ $user_val->email }}</td>
                                            <td>{{ $user_val->phone }}</td> --}}
                                            <td>{{ $user_val->city ? $user_val->city->en_name : '' }}</td>

                                            <td>{{ $user_val->email }}
                                                <!-- @midoshriks_upadte_is_documented_email -->
                                                <a class="active-email" data-id="{{ $user_val->id }}"
                                                    data-email_verified={{ $user_val->email_verified }}
                                                    data-action="{{ route('admin.user.active.email', ['id' => $user_val->id]) }}"
                                                    href="javascript:void(0)">
                                                    @if ($user_val->email_verified == 0)
                                                    <i style="color:red" class="fa fa-check-circle"></i>
                                                    @elseif($user_val->email_verified == 1 )
                                                    <i style="color:green" class="fa fa-check-circle"></i>
                                                    @endif
                                                </a>
                                                <!-- @endUpadet -->
                                            </td>

                                            <td>{{ $user_val->phone }}
                                                <!-- @midoshriks_upadte_is_documented_phone -->
                                                <a class="active-phone" data-id="{{ $user_val->id }}"
                                                    data-phone_verified={{ $user_val->phone_verified }}
                                                    data-action="{{ route('admin.user.active.phone', ['id' => $user_val->id]) }}"
                                                    href="javascript:void(0)">
                                                    @if ($user_val->phone_verified == 0)
                                                    <i style="color:red" class="fa fa-check-circle"></i>
                                                    @elseif($user_val->phone_verified == 1 )
                                                    <i style="color:green" class="fa fa-check-circle"></i>
                                                    @endif
                                                </a>
                                                <!-- @endUpadet -->
                                            </td>

                                            <td>
                                                {{$user_val->membership}}
                                            </td>


                                            <!-- @midoshriks_upadte_is_documented -->
                                            <td>
                                                <a href="/admin/user/edit/documentation/{{ $user_val->id }}">
                                                    @if ($user_val->is_documented != 1)
                                                    <i style="color:red" class="fa fa-check-circle"></i>
                                                    @elseif($user_val->is_documented == 1 )
                                                    <i style="color:green" class="fa fa-check-circle"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <!-- @endUpadet -->
                                            {{-- <td>
                                                        @if ($user_val->is_documented == 1 && $user_val->status != 'activated')
                                                            <i class="fa fa-check-circle"></i>
                                                        @elseif($user_val->is_documented == 1 && $user_val->status ==
                                                            'activated')
                                                            <i style="color:green" class="fa fa-check-circle"></i>
                                                        @endif
                                                    </td> --}}


                                            <!-- @midoshriks@userSupport -->
                                            <td>
                                                @if ($user_val->reports->count() > 0)
                                                <a href="/admin/user/tickets/{{ $user_val->id }}">
                                                    <small style="margin-right: 10px;"
                                                        class="badge badge-danger"></small>
                                                    <i class="fa fa-comment fa-2x"></i>
                                                </a>
                                                @endif
                                            </td>




                                            <td>
                                                {{$user_val->recover}}
                                            </td>

                                            <td>
                                                @if ($user_val->max_amount > 0 && $user_val->max_amount != null)
                                                {{$user_val->max_amount}}
                                                @else
                                                {{ \App\Models\GeneralSettings::first()->max_amount}}
                                                @endif
                                            </td>
                                            <!-- @endEdit -->

                                            <!-- @midoshriks -->
                                            <td>
                                                <a href="/admin/user/paymentinformation/{{ $user_val->id }}">
                                                    <small style="margin-right: 10px;"
                                                        class="badge badge-danger"></small>
                                                    <i class="fa fa-credit-card fa-2x"></i>
                                                </a>
                                            </td>
                                            <!-- @endEdite -->

                                            <td>
                                                <a href="/admin/user/reveiws/{{ $user_val->id }}">
                                                    <small style="margin-right: 10px;"
                                                        class="badge badge-danger">{{ $user_val->reviewers ? $user_val->reviewers->count() : 0 }}</small>
                                                    {{-- <i class="fa fa-star fa-2x"></i> --}}
                                                    @for ($i = 0; $i < $user_val->stars; $i++)
                                                        <i class="fa fa-star fa-2x"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $user_val->stars; $i++)
                                                            <i class="fa fa-star-o fa-2x"></i>
                                                            @endfor
                                                </a>
                                            </td>

                                            <td>
                                                @if ($user_val->status == 'activated')
                                                <small class="badge badge-success">Activated</small>
                                                @elseif($user_val->status == 'deactivated')
                                                <small class="badge badge-info">Deactivated</small>
                                                @elseif($user_val->status == 'blocked')
                                                <small class="badge badge-danger">Blocked</small>
                                                @endif
                                            </td>
                                            <td>
                                                <small
                                                    class="badge badge-danger">{{ $user_val->products->count() }}</small>
                                                <a href="{{ route('admin.user.products', $user_val->id) }}"
                                                    class="btn btn-primary btn-xs mr-2">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <small
                                                    class="badge badge-danger">{{ $user_val->submittedOrders->count() }}</small>
                                                <a href="{{ route('admin.user.submittedorders', $user_val->id) }}"
                                                    class="btn btn-primary btn-xs mr-2">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <small
                                                    class="badge badge-danger">{{ $user_val->orders->count() }}</small>
                                                <a href="/admin/user/{{$user_val->id}}/orders?type=tenant"
                                                    class="btn btn-primary btn-xs mr-2">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <small
                                                    class="badge badge-danger">{{ $user_val->owner->count() }}</small>
                                                <a href="/admin/user/{{$user_val->id}}/orders?type=rented"
                                                    class="btn btn-primary btn-xs mr-2">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.user.transacions', $user_val->id) }}"
                                                    class="btn btn-primary btn-xs mr-2">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </td>
                                            <!-- @midoshriks@show_create_Time -->
                                            <td>
                                                {{ $user_val->created_at }}
                                            </td>
                                            <!-- @endEdit -->
                                            <td class="">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                                        type="button" data-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.user.edit', ['id' => $user_val->id]) }}">
                                                                <i class="icon-pencil"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="delete-item" data-id="{{ $user_val->id }}"
                                                                data-action="{{ route('admin.user.delete', ['id' => $user_val->id]) }}"
                                                                href="javascript:void(0)">
                                                                <i class="icon-trash"></i> Delete
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {{-- mo2men@dataTable --}}
                            {{-- {{ $users->appends(['level'=> request()->get('level') ])->links() }} --}}
                            {{-- endEdit@dataTable --}}
                                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Ajax sourced data -->

    <!-- // Basic form layout section end -->
</div>




<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">

                    <input type="hidden" name="product_id" id="product_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="" maxlength="50" required="">

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-2 control-label">Details</label>

                        <div class="col-sm-12">

                            <textarea id="detail" name="detail" required="" placeholder="Enter Details"
                                class="form-control"></textarea>

                        </div>

                    </div>



                    <div class="col-sm-offset-2 col-sm-10">

                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


@endsection

@push('scripts')

<script>
    $('body').on('click', '.delete-item', function() {

            var id = $(this).data("id");
            var _this = $(this);
            swal({
                title: "Are you sure?",
                text: "Are You sure want to delete !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                id: id,
                _this: $(this),
                _token: _token
            }, function() {
                $.ajax({
                    type: "DELETE",
                    url: _this.attr("data-action"),
                    data: {
                        id: id,
                        _token: _token,
                        _method: "DELETE"
                    },
                    success: function(data) {
                        if (data.delete == true) {
                            swal("Deleted!", "User has been deleted.", "success");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1300);
                        }

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });





        });


        // @midoshriks@active-email
        $('body').on('click', '.active-email', function() {

            var id = $(this).data("id");
            var email_verified = $(this).data("email_verified");
            var _this = $(this);
            console.log(email_verified);

            swal({
                title: "Are you sure?",
                text: (email_verified == 0) ? "Are You sure want to active email !" :
                    "Are You sure want to deactive email !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: (email_verified == 0) ? "green" : "red",
                confirmButtonText: (email_verified == 0) ? "Yes, active email it!" :
                    "Yes, deactive email it!",
                closeOnConfirm: false,
                id: id,
                _this: $(this),
                _token: _token
            }, function() {
                $.ajax({
                    type: "put",
                    url: _this.attr("data-action"),
                    data: {
                        id: id,
                        email_verified: email_verified = 1,
                        _token: _token,
                        _method: "put"
                    },
                    success: function(data) {
                        console.log(email_verified);
                        if (data.email_verified == 1) {
                            swal("active!", "User has been active email.", "success");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1300);
                        } else {
                            swal("Deactive!", "User has been deactive email.", "info");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1300);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });
        });

        // @midoshriks@active-phone
        $('body').on('click', '.active-phone', function() {
            var id = $(this).data("id");
            var _this = $(this);
            var phone_verified = $(this).data("phone_verified");
            swal({
                title: "Are you sure?",
                text: (phone_verified == 0) ? "Are You sure want to active phone !" :
                    "Are You sure want to deactive phone !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: (phone_verified == 0) ? "green" : "red",
                confirmButtonText: (phone_verified == 0) ? "Yes, active phone it!" :
                    "Yes, deactive phone it!",
                closeOnConfirm: false,
                id: id,
                _this: $(this),
                _token: _token
            }, function() {
                $.ajax({
                    type: "put",
                    url: _this.attr("data-action"),
                    data: {
                        id: id,
                        phone_verified: phone_verified = 1,
                        _token: _token,
                        _method: "put"
                    },
                    success: function(data) {
                        if (data.phone_verified == 1) {
                            swal("active!", "User has been active phone.", "success");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1300);
                        } else {
                            swal("Deactive!", "User has been deactive phone.", "info");
                            setTimeout(function() {
                                window.location.reload();
                            }, 1300);
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });
        });

</script>

@endpush