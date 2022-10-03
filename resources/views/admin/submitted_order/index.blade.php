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
                            <h4 class="card-title">{{ $title ?? '' }}</h4>
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
                                    <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Owner</th>
                                                <!-- <th>Status</th> -->
                                                <th>Quantity</th>
                                                <th>Job</th>
                                                <th>Cost price</th>
                                                <!-- <th>Prices -->
                                                <!-- <br />Day / Month / Year -->
                                                </th>
                                                <th>Created At</th>
                                                <!-- <th>Rental times</th> -->
                                                <th>Chat submittedOrder</th>
                                                <!-- <th>All Reviews</th> -->
                                                <th>Blocked</th>
                                                <!-- <th>reveiws</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($submittedOrders as $k => $submittedOrder)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>

                                                    <td>{{ $submittedOrder->en_title }}</td>

                                                    <td>
                                                        @if ($submittedOrder->photos && count($submittedOrder->photos) > 0)
                                                            <img style="width:80px;height:50px;border: 1px solid #ddd;border-radius:4px "
                                                                src="{{ asset('uploads/' . $submittedOrder->photos[0]) }}" />
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{-- {{$submittedOrder->main_categories}} --}}
                                                        <!-- <span>error category</span> -->
                                                        @if ($submittedOrder->main_categories && count($submittedOrder->main_categories) > 0)
                                                            @foreach ($submittedOrder->main_categories as $category)
                                                                <small class="badge badge-info"> {{ $category->en_name }}
                                                                </small>
                                                            @endforeach
                                                        @endif
                                                    </td>

                                                    <td>{{ @$submittedOrder->user->name }}</td>

                                                    <td>{{ $submittedOrder->quantity }}</td>

                                                    <td>
                                                        @if ($submittedOrder->job)
                                                            <small
                                                                class='badge badge-success'>{{ $submittedOrder->job->en_name }}</small>
                                                        @endif
                                                    </td>

                                                    <td>{{ $submittedOrder->replacement_cost }}SAR</td>
                                                    {{-- mo2men@date --}}
                                                    {{-- <td>{{ $submittedOrder->created_at }}</td> --}}
                                                    <td>{{ date("Y-m-d H:i:s", strtotime($submittedOrder->created_at." +3 hours"))  }}</td>
                                                    {{-- endEdit@date --}}
                                                    <!-- <td>{{ $submittedOrder->price_per_day . '/' . $submittedOrder->price_per_week . '/' . $submittedOrder->price_per_month }} SAR</td> -->

                                                    <!-- @mido -->
                                                    <td><a
                                                            href="/admin/submittedorder/chat_submittedOrder/{{ $submittedOrder->id }}"><small
                                                                style="margin-right: 10px;"
                                                                class="badge badge-danger">{{ $submittedOrder->messages ? $submittedOrder->messages->count() : 0 }}</small><i
                                                                class="fa fa-comment-o fa-2x"></i></a></td>

                                                    <td>
                                                        <label class="switchToggle">
                                                            <input type="checkbox" data-id="{{ $submittedOrder->id }}"
                                                                class="is_blocked"
                                                                {{ $submittedOrder->is_blocked == 1 ? 'checked' : '' }}>
                                                            <span class="slider green round"></span>
                                                        </label>
                                                    </td>

                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

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

                    <form id="submittedOrderForm" name="submittedOrderForm" class="form-horizontal">

                        <input type="hidden" name="submittedOrder_id" id="submittedOrder_id">

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
                            swal("Deleted!", "This Item has been deleted.", "success");
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


        $(document).on("click", ".is_blocked", function() {
            var id = $(this).attr("data-id");
            var is_blocked = $(this).prop('checked');

            $.ajax({
                type: "POST",
                url: "{{ route('admin.submittedOrder.change_block_status') }}",
                data: {
                    id: id,
                    is_blocked: (is_blocked == true) ? 1 : 0,
                    _token: _token,
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.reload();
                    }
                }
            });
        })

    </script>

@endpush
