@extends('layouts.front')

@push('head')
<style>
    .inner-page-banner:not(.no-banner-image) {
        background-color: #ffffff;
        background-image: url(/img/products.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        background-position: center center;
        background-attachment: scroll;
    }
</style>
@endpush

@section('content')

<div class="rq-page-content rtl">

    <div class="inner-page-banner"
        style="background-color: #FFF;background-image: url(/img/products.jpg);background-repeat: no-repeat;background-size: cover; -webkit-background-size: cover;background-position: right center;background-attachment: scroll; height: 70vh;">
        <div style="background: transparent" class="rq-overlay"></div>
        <div class="container">
            <div class="rq-title-container bredcrumb-title text-left">



                <h2 class="rq-title" style="margin-left: 100px;">{{$product->ar_title}}</h2>



                <!-- <h2 class="pull-left">News</h2> -->
                <ol class="breadcrumb rq-subtitle secondary ltr">
                    <li id="crumbs">
                        <span class="current">{{$product->ar_title}}</span>
                        &nbsp; &#x2190; &nbsp;
                        <span class="current">
                            <a href="/products">
                                {{display('products')}}
                            </a>
                        </span>
                        &nbsp; &#x2190; &nbsp;
                        <span typeof="v:Breadcrumb">
                            <a rel="v:url" property="v:title" href="/l"> {{display('home')}}
                            </a>
                        </span>
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="rq-listing-page rq-content-block">
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
            <div itemscope id="product-459"
                class="post-459 product type-product status-publish has-post-thumbnail product_cat-luxury product_cat-sports first instock shipping-taxable purchasable product-type-redq_rental">
                <div class="rq-product-page-right">
                    <div class="rq-listing-details">

                        <div class="rq-content-block2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="rq-listing-single turbo-content-listing-gallery">



                                        <div class="rq-listing-gallery-post">
                                            <div class="rq-gallery-content">
                                                <div class="details-slider owl-carousel">
                                                    <div class="item">
                                                        <img src="{{ asset('uploads/' . $product->photos[0]->image) }}"
                                                            alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="rq-title-container bredcrumb-title">
                                        <h2 class="rq-title light">{{$product->ar_title}}</h2>
                                        <span class="car-avarage-rating"> </span>
                                    </div>

                                    <div class="car-desc">
                                        <p>{{$product->ar_description}}</p>
                                    </div>


                                    <div class="rq-listing-promo-wrapper rq-custom">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="rq-listing-promo-content">
                                                    @if ($product->main_categories)

                                                    <div class="rq-listing-item col-md-4">
                                                        <span class="attribute-icon" style="float:right"><i
                                                                class="fas fa-hard-hat"></i></span>
                                                        <h6 class="rq-listing-item-title">{{display('categories')}}
                                                        </h6>

                                                        @foreach ($product->main_categories as $kc=>$category)
                                                        <h5 class="rq-listing-item-number">
                                                            - {{ $category->ar_name }}
                                                        </h5>
                                                        @endforeach

                                                    </div>
                                                    @endif
                                                    @if ($product->delivery_type_values)


                                                    <div class="rq-listing-item col-md-6">
                                                        <span class="attribute-icon" style="float:right"><i
                                                                class="fas fa-road"></i></span>
                                                        <h6 class="rq-listing-item-title">
                                                            {{display('delivery_type_values')}}</h6>
                                                        @foreach ($product->delivery_type_values as $kc=>$delivery)
                                                        <h5 class="rq-listing-item-number">
                                                            - {{ $delivery->ar_name }}
                                                        </h5>
                                                        @endforeach

                                                    </div>
                                                    @endif


                                                    <div class="rq-listing-item col-md-2">
                                                        <span class="attribute-icon" style="float:right"><i
                                                                class="fas fa-list"></i></span>
                                                        <h6 class="rq-listing-item-title">
                                                            {{display('Quantity')}} </h6>
                                                        <h5 class="rq-listing-item-number">{{ $product->quantity }}</h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div _ngcontent-rent-anything-server-c10="" class="column is-5">
                                    <h1 _ngcontent-rent-anything-server-c10="">{{$product->ar_title}}</h1>
                                    <div _ngcontent-rent-anything-server-c10="" class="tile is-ancestor">
                                        <div _ngcontent-rent-anything-server-c10="" class="tile is-parent">
                                            <div _ngcontent-rent-anything-server-c10="" class="tile is-child box">
                                                <!---->
                                                <div _ngcontent-rent-anything-server-c10="" class="columns">
                                                    @if ($product->price_per_day)
                                                    <div _ngcontent-rent-anything-server-c10="" class="column">
                                                        <h4 _ngcontent-rent-anything-server-c10=""
                                                            class="is-marginless"> 
                                                            {{$product->price_per_day}}
                                                            <span
                                                            class="woocommerce-Price-currencySymbol">{{display('SAR')}}</span>
                                                        </h4><span
                                                            _ngcontent-rent-anything-server-c10=""
                                                            class="is-gray-light">{{display('A day')}}</span>
                                                    </div>
                                                    @endif

                                                    @if ($product->price_per_week)
                                                    <div _ngcontent-rent-anything-server-c10="" class="column">
                                                        <h4 _ngcontent-rent-anything-server-c10=""
                                                            class="is-marginless">
                                                            {{$product->price_per_week}}
                                                            <span
                                                            class="woocommerce-Price-currencySymbol">{{display('SAR')}}</span>
                                                        </h4><span
                                                            _ngcontent-rent-anything-server-c10=""
                                                            class="is-gray-light">{{display('A week')}}</span>
                                                    </div>
                                                    @endif
                                                    @if ($product->price_per_month)

                                                    <div _ngcontent-rent-anything-server-c10="" class="column">
                                                        <h4 _ngcontent-rent-anything-server-c10=""
                                                            class="is-marginless">
                                                            {{$product->price_per_month}}
                                                            <span
                                                            class="woocommerce-Price-currencySymbol">{{display('SAR')}}</span>
                                                        </h4><span
                                                            _ngcontent-rent-anything-server-c10=""
                                                            class="is-gray-light">{{display('A month')}}</span>
                                                    </div>
                                                    @endif

                                                </div><br _ngcontent-rent-anything-server-c10="">
                                                <p _ngcontent-rent-anything-server-c10=""
                                                    class="is-gray-light is-marginless is-size-7">
                                                    Refundable deposit</p>
                                                <!---->
                                                <p _ngcontent-rent-anything-server-c10="">-</p>
                                                <!---->
                                                <!---->
                                                <hr _ngcontent-rent-anything-server-c10="">
                                                <h3 _ngcontent-rent-anything-server-c10="" class="is-hidden-mobile">
                                                    {{display('To start renting...')}}
                                                </h3>
                                                <h3 _ngcontent-rent-anything-server-c10=""
                                                    class="is-hidden-tablet is-hidden-desktop">To
                                                    {{display('start renting, download our app here:')}}</h3>
                                                <div _ngcontent-rent-anything-server-c10="" class="columns">
                                                    <div _ngcontent-rent-anything-server-c10=""
                                                        class="column is-7 is-hidden-mobile">
                                                        <p _ngcontent-rent-anything-server-c10="" class="primary-font">
                                                            {{display('Scan this QR code with your phone:')}}</p>
                                                        <img style="height: 160px; width: 160px;"
                                                            src="https://2d6qxj3uqdaw38d6lk27l0ao-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/apb-qr-code.png"
                                                            alt="">
                                                    </div>
                                                    <download-badge _ngcontent-rent-anything-server-c10=""
                                                        _nghost-rent-anything-server-c3="">
                                                        <div _ngcontent-rent-anything-server-c3=""
                                                            class="download-badge column">
                                                            <!---->
                                                            <p _ngcontent-rent-anything-server-c3=""
                                                                class="primary-font is-hidden-mobile">Or
                                                                {{display('download our app here:')}}</p><a
                                                                _ngcontent-rent-anything-server-c3="" class="ios"
                                                                href="https://myrent.page.link/get-app"
                                                                target="_blank"><img
                                                                    _ngcontent-rent-anything-server-c3=""
                                                                    alt="Download on the App Store"
                                                                    src="https://myrent.sg//assets/images/appstore-badge.svg"
                                                                    width="120"></a><a
                                                                _ngcontent-rent-anything-server-c3=""
                                                                href="https://myrent.page.link/get-app"
                                                                target="_blank"><img
                                                                    _ngcontent-rent-anything-server-c3=""
                                                                    alt="Get it on Google Play"
                                                                    src="https://myrent.sg//assets/images/playstore-badge.svg"
                                                                    width="135"></a>
                                                        </div>
                                                    </download-badge>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--col-lg-8  -->

                            </div>
                            <!--row-->


                            @if (count($products)>0)

                            <div class="row">
                                <div class="turbo-related-products">
                                    <section class="related products">
                                        <h2 class="rq-title rq-title-related">
                                            {{display('Related Products')}} </h2>
                                        <div class="rq-car-listing-wrapper products">
                                            <div class="rq-listing-choose rq-listing-grid">
                                                <div class="row">
                                                    @foreach ($products as $product)
                                                    <div
                                                        class="first col-lg-4 col-md-6 post-465 product type-product status-publish has-post-thumbnail product_cat-luxury product_cat-modern-trip product_cat-trip  instock shipping-taxable purchasable product-type-redq_rental">
                                                        <div class="listing-single">
                                                            <div class="listing-img">
                                                                <a href="/product/{{$product->id}}">
                                                                    <img width="368" height="260"
                                                                        src="{{ asset('uploads/' . $product->photos[0]->image) }}"
                                                                        class="attachment-turbo_shop_image size-turbo_shop_image"
                                                                        alt="tvs-scooty-zest-pic-10" loading="lazy" />
                                                                </a>
                                                            </div>
                                                            <div class="listing-details">
                                                                <h3 class="car-name">
                                                                    <a
                                                                        href="/product/{{$product->id}}">{{$product->ar_title}}</a>
                                                                </h3>

                                                                <ul>
                                                                    @if ($product->main_categories)
                                                                    <li>{{display('Categories')}} :
                                                                        @foreach ($product->main_categories as
                                                                        $kc=>$category)
                                                                        <span> {{ $category->ar_name }}

                                                                            @if ($kc+1 < count($product->
                                                                                main_categories))
                                                                                /
                                                                                @endif
                                                                        </span>
                                                                        @endforeach
                                                                        {{-- <span>1</span> --}}

                                                                    </li>
                                                                    @endif
                                                                    {{-- <li>Fuel :<span>Electricity</span></li> --}}
                                                                    @if ($product->delivery_type_values)

                                                                    <li>{{display('delivery_type_values')}} :
                                                                        @foreach ($product->delivery_type_values as
                                                                        $k=>$delivery)
                                                                        <span>
                                                                            {{ $delivery->ar_name }}
                                                                            @if ($k+1 < count($product->
                                                                                delivery_type_values))
                                                                                /
                                                                                @endif
                                                                        </span>
                                                                        @endforeach
                                                                        @endif


                                                                    </li>
                                                                    <li>{{display('Quantity')}}
                                                                        :<span>{{ $product->quantity }}</span></li>
                                                                </ul>

                                                                <div class="listing-footer">

                                                                    <span>
                                                                        <a href="/product/{{$product->id}}">
                                                                            {{display('Details')}} </a>
                                                                    </span>
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount"><bdi>
                                                                                {{$product->price_per_day}}</bdi></span>
                                                                                <span
                                                                                class="woocommerce-Price-currencySymbol">{{display('SAR')}}</span>
                                                                            </span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach


                                                </div>
                                            </div> <!-- /.rq-content-block -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                            @endif


                        </div> <!-- .end rq-content-block rq-content-block2-->

                    </div>
                </div>

                <meta itemprop="url" content="index.html" />

            </div>

            </main>
        </div>

    </div> <!-- End container -->
</div> <!-- End rq-content-block -->


@endsection

@push('scripts')


@endpush