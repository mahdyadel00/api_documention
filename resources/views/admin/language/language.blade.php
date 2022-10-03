@extends('admin.layout')
@section('content')

<div class="row" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-6 align-right">
                                <h4 class="align-right">{{ $title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
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
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><?= display('Sno'); ?></th>
                                <th><?= display('Phrase'); ?></th>
                                <th><?= display('arabic'); ?></th>
                                <th><?= display('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($languages as $k=>$language)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$language->phrase}}</td>
                                <td>{{$language->ar}}</td>
                                <td>
                                    <a href="{{ url('/admin/languages/edit/' . $language->id) }}"
                                        class="btn btn-primary">{{ display('Edit') }}</a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection