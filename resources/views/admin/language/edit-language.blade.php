@extends('admin.layout')
@section('content')
<div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6 align-right">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6 align-left">
                            <a class="btn btn-success ml-2 mb-5 mt-2"
                                href="/admin/languages">{{ display('languages') }}</a>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <?php $url = URL::to("/"); ?>
                    <form class="form-horizontal form-label-left" role="form" method="POST"
                        action="{{url('/admin/languages/update/'.$language->id)}}{{request('file') ? '?file=true' : ''}}"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}


                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12"
                                for="name"><?= display('Phrase'); ?><span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="page_title" class="form-control form-control-lg" name="phrase" value="<?php
                                    
                                    if(request('file')){
                                        
                                    print $language->file_name . ".";
                                    if($language->array_name){print $language->array_name .  ".";}
                                    print $language->phase;
                                        
                                    
                                    }else{
                                        
                                        print $language->phrase;
                                    }
                                            
                                            ?>" required="required" type="text" readonly>

                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12"
                                for="desc"><?= display('English Translation'); ?><span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <input id="page_desc" class="form-control form-control-lg" required="required"
                                    name="translation_english" value="{{$language->en}}">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12"
                                for="desc"><?= display('Arabic Translation'); ?><span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="page_desc" class="form-control form-control-lg" required="required"
                                    name="translation_arabic" value="{{$language->ar}}" style="direction:rtl;">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit"
                                    class="btn btn-success"><?= display('Submit'); ?></button>
                                <a href="{{url('/languages')}}" class="btn btn-primary"><?= display('Cancel'); ?></a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection