@extends('layouts.front')

@push('head')
    {{--<style>--}}
    {{--  .inner-page-banner:not(.no-banner-image) {--}}
    {{--    background-color: #ffffff;--}}
    {{--    background-image: url(/img/about.jpg);--}}
    {{--    background-repeat: no-repeat;--}}
    {{--    background-size: cover;--}}
    {{--    -webkit-background-size: cover;--}}
    {{--    background-position: center center;--}}
    {{--    background-attachment: scroll;--}}
    {{--  }--}}
    {{--</style>--}}
    {{--@endpush--}}

@section('content')
    <!-- site__body -->
    <div class="site__body">
        <div class="block about-us">
            <div class="about-us__image"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10">
                        <div class="about-us__body">
                            <h1 class="about-us__title">{{ display('Earn & Save Money with eJarly') }}</h1>
                            <div class="about-us__text typography">
                                <p style="text-align: justify">{{ display('text-about-us') }}</p>
                            </div>
                            <div class="about-us__team">
                                <h2 class="about-us__team-title">{{ display('Our Team') }}</h2>
                                <div class="about-us__team-subtitle text-muted">Want to work in our friendly team?<br><a
                                            href="/contact">Contact us</a> and we will consider your candidacy.
                                </div>
                                <div class="about-us__teammates teammates">
                                    <div class="owl-carousel">
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar">
                                                <img src="{{ assetWeb('images/teammates/teammate-1.jpg') }}" alt="">
                                            </div>
                                            <div class="teammate__name">Michael Russo</div>
                                            <div class="teammate__position text-muted">Chief Executive Officer</div>
                                        </div>
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar">
                                                <img src="{{ assetWeb('images/teammates/teammate-2.jpg') }}" alt="">
                                            </div>
                                            <div class="teammate__name">Katherine Miller</div>
                                            <div class="teammate__position text-muted">Marketing Officer</div>
                                        </div>
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar">
                                                <img src="{{ assetWeb('images/teammates/teammate-3.jpg') }}" alt="">
                                            </div>
                                            <div class="teammate__name">Anthony Harris</div>
                                            <div class="teammate__position text-muted">Finance Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection