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
                                    <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Price/Once</th>
                                                <th>Price/twice</th>
                                                <th>Price/3times</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Message</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($distinguish_products as $k => $product_val)
                                                @php
                                                    $product = $product_val->product;
                                                @endphp
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>{{ @$product->en_title }}</td>
                                                    <td>
                                                        @if (@$product->main_photo && @$product->main_photo != '')
                                                            <img style="width:80px;height:50px;border: 1px solid #ddd;border-radius:4px "
                                                                src="{{ asset('uploads/' . $product->main_photo) }}" />
                                                        @endif
                                                    </td>
                                                    <td>{{ $product_val->status->en_name }}</td>
                                                    <td>{{ @$product_val->user->name }}</td>

                                                    <td>
                                                        @if ($product_val->selected && in_array(0, $product_val->selected))
                                                            <span style="background: yellow;">
                                                        @endif

                                                        {{ $product_val->status->price_for_once }} SAR

                                                        @if ($product_val->selected && in_array(0, $product_val->selected))
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($product_val->selected && in_array(1, $product_val->selected))
                                                            <span style="background: yellow;">
                                                        @endif
                                                        {{ $product_val->status->price_for_twice }} SAR
                                                        @if ($product_val->selected && in_array(1, $product_val->selected))
                                                            </span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($product_val->selected && in_array(2, $product_val->selected))
                                                            <span style="background: yellow;">
                                                        @endif
                                                        {{ $product_val->status->price_for_three_times }} SAR
                                                        @if ($product_val->selected && in_array(2, $product_val->selected))
                                                            </span>
                                                        @endif

                                                    </td>
                                                    <td>{{ $product_val->from_date }}</td>
                                                    <td>{{ $product_val->to_date }}</td>
                                                    <td>{{ $product_val->message }}</td>

                                                    <td>{{ $product_val->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $distinguish_products->links() }}
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
                url: "{{ route('admin.product.change_block_status') }}",
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
