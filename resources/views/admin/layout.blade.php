<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} .::Ejarly::.</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('admin_files/assets/plugins/simple-line-icons/simple-line-icons.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_files/fonts/material-design-icons/material-icon.css') }}" rel="stylesheet"
        type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('admin_files/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('admin_files/assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_files/assets/css/material_style.css') }}">
    <!-- animation -->
    <link href="{{ asset('admin_files/assets/css/pages/animate_page.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_files/assets/plugins/sweet-alert/sweetalert.min.css') }}">
    <!-- Theme Styles -->

    <link href="{{ asset('admin_files/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/css/pages/formlayout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_files/assets/img/favicon.ico') }}" />

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_files/css/style.css') }}">
    <!-- END: Custom CSS-->
     {{-- mo2men@dataTable --}}
    <!-- BEGIN: datatable-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_files/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- END: datatable-->
    {{-- endEdit@dataTable --}}
    <script>
        var base_url = "{{ url('/') }}";
        var _token = "{{ csrf_token() }}";

    </script>

    @stack('head')
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="#">
                        <!-- <img alt="" src="{{ asset('admin_files/assets/img/logo.png') }}"> -->
                        <span class="logo-default">Ejarly</span>
                    </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start language menu -->

                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor2">{{ $documented_requests->count() }}</span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">

                                <li class="external">

                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label cyan-bgcolor">
                                        @if ($documented_requests->count() > 0)
                                            New {{ $documented_requests->count() }}
                                        @endif
                                    </span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach ($documented_requests as $documented_request)
                                            <li>
                                                <a
                                                    href="{{ url("admin/user/edit/documentation/". $documented_request->user_id) }}">

                                                    <span class="subject">
                                                        <span
                                                            class="from">{{ $documented_request->user->name . ' ' . $documented_request->user->last_name }}</span>
                                                        <span
                                                            class="time">{{ $documented_request->created_at->diffForHumans() }}</span>
                                                    </span>
                                                    <span class="message">Documentation request </span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="dropdown-menu-footer">

                                    </div>
                                </li>
                            </ul>
                        </li>
                     {{-- mo2men@report --}}

                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor3" >{{ $product_reports->count() }}</span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">

                                <li class="external">

                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label cyan-bgcolor">
                                        @if ($product_reports->count() > 0)
                                        New {{ $product_reports->count() }}
                                        @endif
                                    </span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach ($product_reports as $product_report)
                                        <li>
                                            <a href="{{ url('admin/products/reports?type=products') }}">

                                                <span class="subject">
                                                    <span
                                                        class="from">{{ @$product_report->user->name . ' ' . @$product_report->user->last_name }}</span>
                                                    <span
                                                        class="time">{{ $product_report->created_at->diffForHumans() }}</span>
                                                </span>
                                                <span class="message">Product report </span>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="dropdown-menu-footer">

                                    </div>
                                </li>



                            </ul>
                        </li>
                        {{-- endEdit@report --}}


                         {{-- mo2men@report --}}

                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge" style="background-color:blue">{{ $submitted_reports->count() }}</span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">

                                <li class="external">

                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label cyan-bgcolor">
                                        @if ($submitted_reports->count() > 0)
                                        New {{ $submitted_reports->count() }}
                                        @endif
                                    </span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach ($submitted_reports as $submitted_report)
                                        <li>
                                            <a href="{{ url('admin/products/reports?type=submitted') }}">

                                                <span class="subject">
                                                    <span
                                                        class="from">{{ @$submitted_report->user->name . ' ' . @$submitted_report->user->last_name }}</span>
                                                    <span
                                                        class="time">{{ $submitted_report->created_at->diffForHumans() }}</span>
                                                </span>
                                                <span class="message">Submitted order report </span>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="dropdown-menu-footer">

                                    </div>
                                </li>



                            </ul>
                        </li>
                        {{-- endEdit@report --}}
                        


                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1">{{ $withdrawal_reports->count() }}</span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">

                                <li class="external">

                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label cyan-bgcolor">
                                        @if ($withdrawal_reports->count() > 0)
                                        New {{ $withdrawal_reports->count() }}
                                        @endif
                                    </span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach ($withdrawal_reports as $withdrawal_report)
                                        <li>
                                            <a href="{{ route('admin.user.transacions', $withdrawal_report->user->id) }}">

                                                <span class="subject">
                                                    <span
                                                        class="from">{{ @$withdrawal_report->user->name . ' ' . @$withdrawal_report->user->last_name }}</span>
                                                    <span
                                                        class="time">{{ $withdrawal_report->created_at->diffForHumans() }}</span>
                                                </span>
                                                <span class="message">Withdrawal request</span>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="dropdown-menu-footer">

                                    </div>
                                </li>



                            </ul>
                        </li>
                        {{-- endEdit@report --}}
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->

                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <img alt="" class="img-circle " src="{{ asset('admin_files/assets/img/dp.jpg') }}" />
                                <span class="username username-hide-on-mobile"> {{ auth('admin')->user()->name }}
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <!-- <li>
                                <a href="user_profile.html">
                                    <i class="icon-user"></i> Profile </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-directions"></i> Help
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="lock_screen.html">
                                    <i class="icon-lock"></i> Lock
                                </a>
                            </li>
                            -->
                                <li>
                                    <a
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-logout"></i> Log Out </a>

                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                    -->
                    </ul>
                </div>
            </div>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <!-- end header -->
        <!-- start color quick setting -->

        <!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                            data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="user-panel">
                                    <div class="pull-left image">
                                        <img src="{{ asset('admin_files/assets/img/dp.jpg') }}"
                                            class="img-circle user-img-circle" alt="User Image" />
                                    </div>
                                    <div class="pull-left info">
                                        <p>{{ auth('admin')->user()->name }} </p>
                                        <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                                Online</span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle"> <i
                                        class="material-icons">dashboard</i>
                                    <span class="title">Dashboard</span>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="title">Categories</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item   ">
                                        <a href="{{ route('admin.categories') }}" class="nav-link ">
                                            <span class="title">Categories</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.category.add') }}" class="nav-link ">
                                            <span class="title">Add Category</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link ">
                                            <span class="title"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">desktop_mac</i>
                                    <span class="title">Pages</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.page.add') }}" class="nav-link ">
                                            <span class="title">Add New Page</span>
                                        </a>
                                    </li>

                                    @foreach ($all_pages as $page_val)
                                        <li class="nav-item">
                                            <a href="{{ route('admin.page.edit', $page_val->id) }}"
                                                class="nav-link ">
                                                <span class="title">{{ $page_val->en_title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">people</i>
                                    <span class="title">Users</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="nav-item">
                                        <a href="{{ url('admin/user/?level=registered') }}" class="nav-link "> <span
                                                class="title">All Customers</span>
                                        </a>
                                    </li>



                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.paymentInformation') }}" class="nav-link "> <span
                                                class="title">All Payment Information</span>
                                        </a>
                                    </li>

                                    {{-- 20200222 --}}
                                    <li class="nav-item">
                                      <a href="{{ route('admin.users.before_launch') }}" class="nav-link "> <span
                                                class="title">Before Launch</span>
                                        </a>
                                    </li>
                                    {{-- /20200222 --}}
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.add') }}" class="nav-link "> <span
                                                class="title">Add New Admin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="{{ url('admin/user/?level=otp') }}" class="nav-link ">
                                    <i class="fa fa-sign-in"></i> <span class="title">Users otp level</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-newspaper-o"></i>
                                    <span class="title">Advertisement</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.advertisement.add') }}" class="nav-link ">
                                            <span class="title">Add New Advertisement</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.advertisement') }}" class="nav-link ">
                                            <span class="title">All Advertisement</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-newspaper-o"></i>
                                    <span class="title">Products</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.products') }}" class="nav-link ">
                                            <span class="title">All Products</span>
                                        </a>
                                    </li>
                                    <!-- mido Add product -->
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.products.add') }}" class="nav-link ">
                                            <span class="title">Add Products</span>
                                        </a>
                                    </li>
                                    <!-- mido Add product -->
                                    <li class="nav-item">
                                        <a href="{{ route('admin.products', ['is_blocked' => '2']) }}"
                                            class="nav-link ">
                                            <span class="title">Products Blocked</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{  url('admin/products/reports?type=products') }}" class="nav-link ">
                                            <span class="title">Reports on Products</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.products.distinguish') }}" class="nav-link ">
                                            <span class="title">Distinguish Products</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.submittedorder') }}" class="nav-link ">
                                    <i class="fa fa-bullhorn"></i> <span class="title">Submitted Order</span>
                                </a>
                            </li> --}}

                            {{-- <!-- @midoshriks --> --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-bullhorn"></i>
                                    <span class="title">Submittedorder</span> <span class="arrow"></span>
                                </a>

                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.submittedorder') }}" class="nav-link ">
                                            <span class="title">All Submittedorder</span>
                                        </a>
                                    </li>
                                    
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('admin.submittedorder', ['is_blocked' => '2']) }}" class="nav-link ">
                                            <span class="title">Submittedorder Blocked</span>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{ url('admin/products/reports?type=submitted') }}" class="nav-link ">
                                            <span class="title">Reports on Submittedorder</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        {{-- <!-- @endEdite --> --}}

                            <li class="nav-item">
                                <a href="{{ route('admin.orders') }}" class="nav-link ">
                                    <i class="fa fa-shopping-cart"></i> <span class="title">Orders</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-newspaper-o"></i>
                                    <span class="title">Jobs</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.job.add') }}" class="nav-link ">
                                            <span class="title">Add New Job</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.job') }}" class="nav-link ">
                                            <span class="title">All Jobs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            
                          {{-- mo2men@mail --}}
                          <li class="nav-item">
                            <a href="{{ url('admin/notifications?send=notification') }}" class="nav-link ">
                                <i class="fa fa-bell"></i> <span class="title">Notifications</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('admin/notifications?send=mail') }}" class="nav-link ">
                                <i class="fa fa-envelope"></i> <span class="title">Mails</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('admin/user/contact') }}" class="nav-link ">
                                <i class="fa fa-phone"></i> <span class="title">Contact us</span>
                            </a>
                        </li>
                        {{-- endEdit@mail --}}


                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-newspaper-o"></i>
                                    <span class="title">Distinguish Products</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.distinguish.statuses') }}" class="nav-link ">
                                            <span class="title">Distinguish Statuses</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.distinguish.status.add') }}" class="nav-link ">
                                            <span class="title">Add Status</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">desktop_mac</i>
                                    <span class="title">Cities</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.city.add') }}" class="nav-link ">
                                            <span class="title">Add New City</span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a href="{{ route('admin.cities') }}" class="nav-link ">
                                            <span class="title">Cities</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>



                            {{-- <!-- @midoshriks-2 --> --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="fa fa-comment"></i>
                                    <span class="title">Support and Help</span> <span class="arrow"></span>
                                </a>

                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('admin.support_help') }}" class="nav-link ">
                                            <span class="title">All</span>
                                        </a>
                                    </li>
                                    
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('admin.support_help.add') }}" class="nav-link ">
                                            <span class="title">Add support and help</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.report_status', ['model' => 'support_help']) }}" class="nav-link ">
                                            <span class="title">Reasons</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.report_status.add') }}" class="nav-link ">
                                            <span class="title">add reason</span>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{ route('admin.all_tickets', 'support_help') }}" class="nav-link">
                                            <span class="title">all tickets</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <!-- {{-- @endEdite --}} -->

                        {{-- <!-- @midoshriks-4 --> --}}                          
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}" class="nav-link ">
                                <i class="fa fa-cog"></i> <span class="title">Settings</span>
                            </a>
                        </li>
                        <!-- {{-- @endEdite --}} -->


                        </ul>
                    </div>
                </div>
            </div>
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @if ($title)
                        <div class="page-bar">
                            <div class="page-title-breadcrumb">
                                <div class=" pull-left">
                                    <div class="page-title">{{ $title }}</div>
                                </div>
                                <ol class="breadcrumb page-breadcrumb pull-right">
                                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                            href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                    </li>
                                    <li class="active">{{ $title }}</li>
                                </ol>
                            </div>
                        </div>
                    @endif
                    <!-- add content here -->
                    <div style="min-height: 80vh;">
                        @yield('content')
                    </div>

                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab"> <i
                                    class="material-icons">chat</i>Chat
                                <span class="badge badge-danger">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> <i
                                    class="material-icons">settings</i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Start User Chat -->
                        <div class="tab-pane active chat-sidebar-chat in active show animated slideInRight"
                            role="tabpanel" id="quick_sidebar_tab_1">
                            <div class="chat-sidebar-list">
                                <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
                                    data-wrapper-class="chat-sidebar-list">
                                    <div class="chat-header">
                                        <h5 class="list-heading">Online</h5>
                                    </div>
                                    <ul class="media-list list-items">
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user3.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Deo</h5>
                                                <div class="media-heading-sub">Spine Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">5</span>
                                            </div> <img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user1.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Rajesh</h5>
                                                <div class="media-heading-sub">Director</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user5.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="away dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jacob Ryan</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">8</span>
                                            </div> <img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user4.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Kehn Anderson</h5>
                                                <div class="media-heading-sub">CEO</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user2.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Sarah Smith</h5>
                                                <div class="media-heading-sub">Anaesthetics</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user7.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Vlad Cardella</h5>
                                                <div class="media-heading-sub">Cardiologist</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="chat-header">
                                        <h5 class="list-heading">Offline</h5>
                                    </div>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">4</span>
                                            </div> <img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user6.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jennifer Maklen</h5>
                                                <div class="media-heading-sub">Nurse</div>
                                                <div class="media-heading-small">Last seen 01:20 AM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user8.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Lina Smith</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                                <div class="media-heading-small">Last seen 11:14 PM</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">9</span>
                                            </div> <img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user9.jpg') }}" width="35"
                                                height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jeff Adam</h5>
                                                <div class="media-heading-sub">Compounder</div>
                                                <div class="media-heading-small">Last seen 3:31 PM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object"
                                                src="{{ asset('admin_files/assets/img/user/user10.jpg') }}"
                                                width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Anjelina Cardella</h5>
                                                <div class="media-heading-sub">Physiotherapist</div>
                                                <div class="media-heading-small">Last seen 7:45 PM</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/dp.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                    Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/user/user5.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                    Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/dp.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                    Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/user/user5.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                    Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
                                                    the delay. i sent mail to you. let me know if it is ok or
                                                    not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/dp.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                    Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/dp.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran
                                                    Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt=""
                                                src="{{ asset('admin_files/assets/img/user/user5.jpg') }}" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob
                                                    Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn deepPink-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End User Chat -->
                        <!-- Start Setting Panel -->
                        <div class="tab-pane chat-sidebar-settings animated slideInUp" role="tabpanel"
                            id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header">
                                    <h5 class="list-heading">Layout Settings</h5>
                                </div>
                                <div class="chatpane inner-content ">
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Position</div>
                                            <div class="setting-set">
                                                <select
                                                    class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                    <option value="left" selected="selected">Left</option>
                                                    <option value="right">Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Header</div>
                                            <div class="setting-set">
                                                <select
                                                    class="page-header-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed" selected="selected">Fixed</option>
                                                    <option value="default">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Menu </div>
                                            <div class="setting-set">
                                                <select
                                                    class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                    <option value="accordion" selected="selected">Accordion</option>
                                                    <option value="hover">Hover</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Footer</div>
                                            <div class="setting-set">
                                                <select
                                                    class="page-footer-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="default" selected="selected">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header">
                                        <h5 class="list-heading">Account Settings</h5>
                                    </div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Notifications</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-1">
                                                        <input type="checkbox" id="switch-1" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Show Online</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-7">
                                                        <input type="checkbox" id="switch-7" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Status</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-2">
                                                        <input type="checkbox" id="switch-2" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">2 Steps Verification</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-3">
                                                        <input type="checkbox" id="switch-3" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header">
                                        <h5 class="list-heading">General Settings</h5>
                                    </div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Location</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-4">
                                                        <input type="checkbox" id="switch-4" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Save Histry</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-5">
                                                        <input type="checkbox" id="switch-5" class="mdl-switch__input"
                                                            checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Auto Updates</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                        for="switch-6">
                                                        <input type="checkbox" id="switch-6" class="mdl-switch__input"
                                                            checked>
                                                    </label>
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
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2020 &copy;
                <a href="https://fudex.com.sa/" target="_blank" class="makerCss">Fudex</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="{{ asset('admin_files/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('admin_files/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin_files/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- Common js-->
    <script src="{{ asset('admin_files/assets/js/app.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/layout.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/theme-color.js') }}"></script>
    <!-- Material -->
    <script src="{{ asset('admin_files/assets/plugins/material/material.min.js') }}"></script>
    <!-- animation -->
    <script src="{{ asset('admin_files/assets/js/pages/ui/animations.js') }}"></script>
    <!-- end js include path -->

    @if (isset($allow_ckeditor) && $allow_ckeditor == true)
        <script src="{{ asset('admin_files/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    @endif

    {{-- mo2men@dataTable --}}
    {{-- Begin: datatables.min --}}
    <script src="{{ asset('admin_files/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script>
        $('.table-data').DataTable( {
            dom: 'Bfrtip',
               buttons: [
                'copy', 'csv', 'excel', 'pdf'
           ]
    } );
    </script>
    {{-- End: datatables.min --}}
    {{-- endEdit@dataTable --}}

    @stack('scripts')

    <script src="{{ asset('admin_files/custom.js') }}" type="text/javascript"></script>

</body>

</html>
