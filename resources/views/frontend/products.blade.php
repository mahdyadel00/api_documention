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
{{-- @php
        dd($products);
    @endphp --}}
<div class="rq-page-content rtl">


    <div class="inner-page-banner has-style">
        <div class="container">
            <div class="rq-title-container bredcrumb-title text-left">



                <h2 class="rq-title" style="margin-left: 62px;">
                    {{display('products')}}
                </h2>



                <!-- <h2 class="pull-left">News</h2> -->
                <ol class="breadcrumb rq-subtitle secondary ltr">
                    <li id="crumbs">
                        <span class="current">
                            {{display('products')}}
                        </span>
                        &nbsp; &#x2190; &nbsp;
                        <span typeof="v:Breadcrumb">
                            <a rel="v:url" property="v:title" href="/">
                                {{display('home')}}
                            </a>
                        </span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="rq-listing-page rq-content-block">
        <div class="container">
            <img src="/img/renter.jpg" alt="">
            <div class="scrolling-pagination">
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
                                                alt="tvs-scooty-zest-pic-10" loading="lazy" /> </a>
                                    </div>
                                    <div class="listing-details">
                                        <h3 class="car-name">
                                            <a href="/product/{{$product->id}}">{{$product->ar_title}}</a>
                                        </h3>

                                        <ul>
                                            @if ($product->main_categories)
                                            <li>{{display('Categories')}} :
                                                @foreach ($product->main_categories as $kc=>$category)
                                                <span> {{ $category->ar_name }}

                                                    @if ($kc+1 < count($product->main_categories))
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
                                                @foreach ($product->delivery_type_values as $k=>$delivery)
                                                <span>
                                                    {{ $delivery->ar_name }}
                                                    @if ($k+1 < count($product->delivery_type_values))
                                                        /
                                                        @endif
                                                </span>
                                                @endforeach
                                                @endif


                                            </li>
                                            <li>{{display('Quantity')}} :<span>{{ $product->quantity }}</span></li>
                                        </ul>

                                        <div class="listing-footer">

                                            <span>
                                                <a href="/product/{{$product->id}}"> {{display('Details')}} </a>
                                            </span>
                                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi>
                                                {{-- <span class="woocommerce-Price-currencySymbol">{{display('SAR')}}</span> --}}
                                                {{$product->price_per_day}} 
                                                        </bdi></span>
                                                        {{-- {{display('SAR')}} --}}
                                                <span class="woocommerce-Price-currencySymbol"> {{display('SAR')}}</span>

                                                    </span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            {{ $products->links() }}
                        </div>

                    </div>
                </div> <!-- /.rq-content-block -->
            </div>


            </main>
        </div>

    </div> <!-- End container -->
</div> <!-- End rq-content-block -->



@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>

@endpush