@extends('admin.layouts.master')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ display('languages') }}</h3>

        </div>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->






            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="{{url('admin/setting/languages/search')}}" method="get">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-8">
                                    <input type="text" name="phrase" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success"  value="{{trans('app.submit')}}" style="font-size:15px!important">
                                </div>
                            </div>
                        </form>
                        <h2></h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>

                    <div class="x_content">


                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th><?= display('Sno'); ?></th>

                                <th><?= display('Phrase'); ?></th>
                                
                                <th><?= display('arabic'); ?></th>

                                <th><?= display('Action'); ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{$file->id}}</td>
                                    <td><?php
                                    print $file->file_name . ".";
                                    if($file->array_name){print $file->array_name .  ".";}
                                    print $file->phase;
                                            ?></td>
                                    <td>{{$file->ar}}</td>
                                    <td>
                                        {{--<a href="{{route('edit.language',$file->id)}}" class="btn btn-primary">{{display('Edit')}}</a>--}}
                                        <a href="{{url('admin/setting/languages/edit/'.$file->id.'?file=true')}}" class="btn btn-primary">{{display('Edit')}}</a>
                                    </td>

                                </tr>
                            @endforeach
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{$language->id}}</td>
                                    <td>{{$language->phrase}}</td>
                                    <td>{{$language->ar}}</td>
                                    <td>
                                        {{--<a href="{{route('edit.language',$language->id)}}" class="btn btn-primary">{{display('Edit')}}</a>--}}
                                        <a href="{{url('admin/setting/languages/edit/'.$language->id)}}" class="btn btn-primary">{{display('Edit')}}</a>
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
