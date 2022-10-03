<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>Ejarly</title>
    <link rel="icon" type="image/png" href="/web/images/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="{{ assetWeb('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('vendor/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('vendor/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('css/style.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ assetWeb('fonts/stroyka/stroyka.css') }}">
    @stack('css')
</head>

<body>
<!-- site -->
<div class="site">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

</div>
<!-- site / end -->
<!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"></div>
    </div>
</div>
<!-- quickview-modal / end -->

<!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- photoswipe / end -->
<!-- js -->
<script src="{{ assetWeb('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ assetWeb('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ assetWeb('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ assetWeb('vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ assetWeb('vendor/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ assetWeb('vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ assetWeb('vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ assetWeb('js/number.js') }}"></script>
<script src="{{ assetWeb('js/main.js') }}"></script>
<script src="{{ assetWeb('js/header.js') }}"></script>
<script src="{{ assetWeb('vendor/svg4everybody/svg4everybody.min.js') }}"></script>
<script>
    svg4everybody();
</script>
</body>

</html>