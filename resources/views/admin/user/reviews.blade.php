@extends('admin.layout')

@push('head')
<style>
    .msg_container_base {
        background: #e5e5e5;
        margin: 0;
        padding: 0 10px 10px;
        max-height: 300px;
        overflow-x: hidden;
    }

    .top-bar {
        background: #666;
        color: white;
        padding: 10px;
        position: relative;
        overflow: hidden;
    }

    .msg_receive {
        padding-left: 0;
        margin-left: 0;
    }

    .msg_sent {
        padding-bottom: 20px !important;
        margin-right: 0;
    }

    .messages {
        background: white;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        max-width: 100%;
    }

    .messages>p {
        font-size: 13px;
        margin: 0 0 0.2rem 0;
    }

    .messages>time {
        font-size: 11px;
        color: #ccc;
    }

    .msg_container {
        padding: 10px;
        overflow: hidden;
        display: flex;
    }

    .avatar {
        position: relative;
    }

    .base_receive>.avatar:after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border: 5px solid #FFF;
        border-left-color: rgba(0, 0, 0, 0);
        border-bottom-color: rgba(0, 0, 0, 0);
    }

    .base_sent {
        justify-content: flex-end;
        align-items: flex-end;
    }

    .base_sent>.avatar:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 0;
        border: 5px solid white;
        border-right-color: transparent;
        border-top-color: transparent;
        box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
    }

    .msg_sent>time {
        float: right;
    }



    .msg_container_base::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }

    .btn-group.dropup {
        position: fixed;
        left: 0px;
        bottom: 0;
    }

    .fa.fa-star {
        color: yellow;
    }
</style>
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
                        <h4 class="card-title"></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="mdl-data-table ml-table-striped mdl-js-data-table is-upgraded">
                            <thead>
                                <tr>
                                    <!-- <td>id</td> -->
                                    <!-- <td>product_id</td> -->
                                    <td>#</td>
                                    <td>name user</td>
                                    <td>star_user</td>
                                    <!-- <td>reviews_product</td> -->
                                    <!-- <td>name product</td> -->
                                    <!-- <td>user_id</td> -->
                                    <td>reviews_user</td>
                                    <!-- <td>reviews_id</td> -->
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($userReviews as $k => $reviews)

                                <tr>
                                    <td> {{ $k+1 }} </td>
                                    <!-- <td>{{ $reviews->product_id }}</td> -->

                                    <td>{{ $reviews->user->name }}</td>

                                    <td>
                                        @switch($reviews->star_user)

                                            @case(1)
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            @break

                                            @case(2)
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            @break

                                            @case(3)
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            @break

                                            @case(4)
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            @break

                                            @case(5)
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            <i class="fa fa-star fa-2x"></i>
                                            @break

                                            @default
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            <i class="fa fa-star-o fa-2x"></i>
                                            @endswitch
                                            

                                    </td>

                                    <!-- <td>{{ $reviews->reviews_product }}</td> -->

                                    <!-- <td>{{ $reviews->user_id }}</td> -->

                                    <td>{{ $reviews->reviews_user }}</td>

                                    <!-- <td>{{ $reviews->reviews_id }}</td> -->
                                    <!-- <td>{{ $reviews->product_id }}</td> -->

                                @endforeach
                                
                            </tbody>
                        </table>



                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/ Ajax sourced data -->

    <!-- // Basic form layout section end -->
</div>



<!-- The Modal -->
<div class="modal" id="order_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="ajax_content">

        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush