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
                                    <table class="table-data mdl-data-table ml-table-striped mdl-js-data-table is-upgraded">
                                        {{-- endEdit@dataTable --}}
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Owner</th>
                                                <th>Status</th>
                                                <th>Quantity</th>
                                                <th>Job</th>
                                                <th>Cost price</th>
                                                <th>Prices
                                                    <br />Day / Month / Year
                                                </th>
                                                <th>Created At</th>
                                                <th>Rental times</th>
                                                <th>Chat Product</th>
                                                <th>All Reviews</th>
                                                <th>Hidden</th>
                                                <th>Blocked</th>
                                                <th>Deleted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $k => $product)

                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>{{ $product->en_title }}</td>
                                                    <td>
                                                        @if ($product->photos && $product->photos->count() > 0)
                                                            <img style="width:80px;height:50px;border: 1px solid #ddd;border-radius:4px "
                                                                src="{{ asset('uploads/' . $product->photos[0]->image) }}" />
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($product->main_categories as $category)
                                                            <small class="badge badge-info"> {{ $category->en_name }}
                                                            </small>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ @$product->user->name }}</td>
                                                    <td>
                                                        @if ($product->status_val)
                                                            <small
                                                                class='badge badge-danger'>{{ $product->status_val->en_name }}</small>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>
                                                        @if ($product->job)
                                                            <small
                                                                class='badge badge-success'>{{ $product->job->en_name }}</small>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->replacement_cost }}SAR</td>
                                                    <td>{{ $product->price_per_day . '/' . $product->price_per_week . '/' . $product->price_per_month }}
                                                        SAR</td>


                                                    <td>{{ $product->created_at }}</td>
                                                    <td>{{ $product->rental_times->count() }}</td>
                                                    <td><a href="/admin/product/chat_product/{{ $product->id }}"><small
                                                                class="badge badge-danger">{{ $product->messages ? $product->messages->count() : 0 }}</small><i
                                                                class="fa fa-comment-o"></i></a></td>
                                                    <td>
                                                        <a href="/admin/products/reveiws/{{ $product->id }}">
                                                            <small
                                                                class="badge badge-danger">{{ $product->reviewers ? $product->reviewers->count() : 0 }}</small>
                                                            @for ($i = 0; $i < $product->stars; $i++)
                                                                <i class="fa fa-star fa-2x"></i>
                                                            @endfor
                                                            @for ($i = 0; $i < 5 - $product->stars; $i++)
                                                                <i class="fa fa-star-o fa-2x"></i>
                                                            @endfor
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <label class="switchToggle">
                                                            <input type="checkbox" data-id="{{ $product->id }}" disabled
                                                                {{ $product->is_active == 0 ? 'checked' : '' }}>
                                                            <span class="slider green round"></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="switchToggle">
                                                            <input type="checkbox" data-id="{{ $product->id }}"
                                                                class="is_blocked"
                                                                {{ $product->is_blocked == 1 ? 'checked' : '' }}>
                                                            <span class="slider green round"></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="switchToggle">
                                                            <input type="checkbox" data-id="{{ $product->id }}" disabled
                                                                {{ $product->is_deleted == 1 ? 'checked' : '' }}>
                                                            <span class="slider green round"></span>
                                                        </label>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{-- {{ $products->links() }} --}}
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
