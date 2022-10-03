@extends('layouts.front')

@push('head')
    <style>
        .inner-page-banner:not(.no-banner-image) {
            background-color: #ffffff;
            background-image: url(/img/contact.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            background-position: center center;
            background-attachment: scroll;
        }
    </style>
@endpush

@section('content')

    <!-- site__body -->
    <div class="site__body">
        {{--        <div class="block-map block">--}}
        {{--            <div class="block-map__body">--}}
        {{--                <iframe src='https://maps.google.com/maps?q=Holbrook-Palmer%20Park&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed'--}}
        {{--                        frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/web/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">Breadcrumb</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/web/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{ display('contact-us') }}</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0">
                    <div class="card-body contact-us">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">{{ display('Address') }}</h4>
                                    <div class="contact-us__address">
                                        <p>
                                            {{ display('address-1') }}<br>
                                            {{ display('address-2') }}<br>
                                            Email: stroyka@example.com<br>
                                            Phone Number: {{ display('phone-1') }}<br>
                                            Phone Number: {{ display('phone-2') }}<br>
                                            Mail: {{ display('mail-1') }}<br>
                                            Mail: {{ display('mail-2') }}
                                        </p>
                                        <p>
                                            <strong>Opening Hours</strong><br>
                                            Monday to Friday: 8am-8pm<br>
                                            Saturday: 8am-6pm<br>
                                            Sunday: 10am-4pm
                                        </p>
                                        {{--                                        <p>--}}
                                        {{--                                            <strong>Comment</strong><br>--}}
                                        {{--                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit--}}
                                        {{--                                            suscipit mi, non--}}
                                        {{--                                            tempor nulla finibus eget. Lorem ipsum dolor sit amet, consectetur--}}
                                        {{--                                            adipiscing elit.--}}
                                        {{--                                        </p>--}}
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">
                                        {{ display('If you got any questions') }}
                                        <br>
                                        {{ display('please do not hesitate to send us a message') }}
                                    </h4>
                                    <form action="/support"
                                          method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">{{ display('Your name') }}</label>
                                                <input type="text" id="form-name" class="form-control"
                                                       placeholder="{{ display('Your name') }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">{{ display('Email') }}</label>
                                                <input type="email" id="form-email" class="form-control"
                                                       placeholder="{{ display('Email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">{{ display('Subject') }}</label>
                                            <input type="text" id="form-subject" class="form-control"
                                                   placeholder="{{ display('Subject') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">{{ display('Message') }}</label>
                                            <textarea id="form-message" class="form-control" rows="4"></textarea>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary">{{display('submit message')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->



@endsection