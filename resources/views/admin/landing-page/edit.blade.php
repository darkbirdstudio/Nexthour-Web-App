@extends('layouts.master')
@section('title',__('Edit Block'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Block') }}</li>
                    </ol>
                </div>   
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    @if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
    <div class="col-lg-6">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="{{url('admin/customize/landing-page')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Edit Block')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($landing_page, ['method' => 'PATCH', 'action' => ['LandingPageController@update', $landing_page->id], 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark{{ $errors->has('heading') ? ' has-error' : '' }}">
                  {!! Form::label('heading', __('Heading')) !!}
                  {!! Form::text('heading', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('heading') }}</small>
              </div>
              <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                  {!! Form::label('detail', __('Detail')) !!}
                  {!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea']) !!}
                  <small class="text-danger">{{ $errors->first('detail') }}</small>
              </div>
              <div class="pad_plus_border">
                <div class="form-group text-dark{{ $errors->has('button') ? ' has-error' : '' }}">
                  <div class="row">
                    <div class="col-md-6">
                      {!! Form::label('button', __('Button')) !!}
                    </div>
                    <div class="col-md-5 text-right">
                      <label class="switch">
                        {!! Form::checkbox('button', 1, $landing_page->button, ['class' => 'custom_toggle']) !!}
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('button') }}</small>
                  </div>
                </div>
                <div class="bootstrap-checkbox form-group text-dark{{ $errors->has('button_link') ? ' has-error' : '' }}">
                  <div class="row">
                    <div class="col-md-7">
                      {!! Form::label('button_link', __('Button Link')) !!}
                    </div>
                    <div class="col-md-5 pad-0">
                      <div class="make-switch">
                        {!! Form::checkbox('button_link', 1, ($landing_page->button_link == 'login' ? 1 : 0), ['class' => 'custom_toggle']) !!}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger">{{ $errors->first('button_link') }}</small>
                  </div>
                </div>
                <div class="form-group text-dark{{ $errors->has('button_text') ? ' has-error' : '' }} button_text">
                  {!! Form::label('button_text', __('ButtonText')) !!}
                  {!! Form::text('button_text', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('button_text') }}</small>
                </div>
              </div>
              <div class="bootstrap-checkbox form-group text-dark{{ $errors->has('left') ? ' has-error' : '' }}">
                <div class="row">
                  <div class="col-md-7">
                    <h5 class="bootstrap-switch-label">{{__('Image Position')}}</h5>
                  </div>
                  <div class="col-md-5 pad-0">
                    <div class="make-switch">
                      {!! Form::checkbox('left', 1, $landing_page->left, ['class' => 'custom_toggle']) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <small class="text-danger">{{ $errors->first('left') }}</small>
                </div>
              </div>
              <div class="form-group text-dark{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                {!! Form::label('image', 'Image') !!} <p class="inline info"></p>
                {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Project Image')}}">
                  <i class="icon fa fa-check"></i>
                  <span class="js-fileName">{{__('Choose A File')}}</span>
                </label>
                <p class="info">{{__('ChooseAImage')}}</p>
                <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>

              </div>
              
              
                <div class="form-group">
                  <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Create') }}</button>
                </div>
                {!! Form::close() !!}
                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')
<script>
  $(function(){
    
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });

  $(".toggle-password2").click(function() {
    $.noConflict();
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>


    
@endsection