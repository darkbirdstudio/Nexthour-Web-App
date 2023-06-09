@extends('layouts.master')
@section('title', __('Terms Condition'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('Terms Condition') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Terms Condition') }}</li>
                    </ol>
                </div>  
    </div>
@endsection
@section('maincontent')
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">

        <div class="card m-b-50">
            <div class="card-header">
                <h5 class="card-title">{{ __('Terms Condition') }}</h5>
            </div> 

            <div class="card-body">
              @if ($config)
                <div class="admin-form-block z-depth-1">
                  {!! Form::model($config, ['method' => 'PATCH', 'route' => 'term&con']) !!}
                    <div class="form-group{{ $errors->has('terms_condition') ? ' has-error' : '' }}">
                      {!! Form::label('terms_condition', __('Terms And Condition Text')) !!}
                      {!! Form::textarea('terms_condition', null, ['id' => 'editor1', 'class' => 'form-control']) !!}
                      <small class="text-danger">{{ $errors->first('terms_condition') }}</small>
                    </div>
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-primary-rgba">{{__('Save')}}</button>
                    </div>
                    <div class="clear-both"></div>
                  {!! Form::close() !!}
                </div>
              @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection 
@section('script')

<script>
  (function ($) {
    
    $(window).on('load', function (){
      CKEDITOR.replace('editor1');
    });
  })(jQuery);
</script>
@endsection
