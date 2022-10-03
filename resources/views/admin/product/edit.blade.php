@extends('admin.layout')

@push('head')
    <!--select2-->
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')

@endsection

@push('scripts')

    <!--select2-->
    <script src="{{ asset('admin_files/assets//plugins/select2/js/select2.js') }}" ></script>
    <script src="{{ asset('admin_files/assets//js/pages/select2/select2-init.js') }}" ></script>
    <!-- end js include path -->

    <script>




    </script>

@endpush
