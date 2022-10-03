@extends('layouts.front')

@push('head')
<style>
    .inner-page-banner:not(.no-banner-image) {
        background-color: #ffffff;
        background-image: url(/img/about.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        background-position: center center;
        background-attachment: scroll;
    }
</style>
@endpush

@section('content')

<div class="inner-page-banner has-style">
    <div class="container">
        <div class="rq-title-container bredcrumb-title text-left">



            <h2 class="rq-title" style="margin-left: 85px;"> {{display($title)}}</h2>



            <!-- <h2 class="pull-left">News</h2> -->
            <ol class="breadcrumb rq-subtitle secondary ltr">
                <li id="crumbs">
                    <span class="current"> {{display($title)}}</span>
                    &nbsp; &#x2190; &nbsp;
                    <span typeof="v:Breadcrumb">
                        <a rel="v:url" property="v:title" href="/"> {{display('home')}}
                        </a>
                    </span>
                </li>
            </ol>
        </div>
    </div>
</div>


<div class="rq-listing-page rq-content-block">
    <div class="container">
            {!!@$page->ar_description!!}
    </div>
</div>


@endsection

@push('scripts')


@endpush