@extends('layouts.master')
@section('title',__('Edit Custom Page'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Custom Page') }}</li>
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
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="{{url('admin/custom_page')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Edit Custom Page')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($custom, ['method' => 'PATCH', 'action' => ['CustomPageController@update', $custom->id], 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', __('CustomPageTitle')) !!} - <p class="inline info">{{__('Enter Custom Page Title')}}</p>
                  {!! Form::text('title', null, ['class' => 'form-control','autocomplete'=>'off','required']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
              </div> 
              
              
               <div class=" form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                    {!! Form::label('detail', __('Description')) !!} - <p class="inline info">{{__('Please Enter Custom Page Description')}}</p>
                    {!! Form::textarea('detail', null, ['id' => 'detail','autocomplete'=>'off', 'class' => 'form-control ckeditor', '']) !!}
                    <small class="text-danger">{{ $errors->first('detail') }}</small>
                </div>
    
              <div class="form-group text-dark{{ $errors->has('in_show_menu') ? ' has-error' : '' }} switch-main-block">
                  <div class="row">
                    <div class="col-xs-4">
                      {!! Form::label('in_show_menu', __('Show In Menu')) !!}
                    </div>
                    <div class="col-xs-5 pad-0">
                      <label class="switch">                
                        {!! Form::checkbox('in_show_menu', null, null, ['class' => 'custom_toggle']) !!}
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('in_show_menu') }}</small>
                  </div>
              </div>  
    
              <div class="form-group text-dark{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                  <div class="row">
                    <div class="col-xs-4">
                      {!! Form::label('is_active', __('Status')) !!}
                    </div>
                    <div class="col-xs-5 pad-0">
                      <label class="switch">                
                        {!! Form::checkbox('is_active', null, null, ['class' => 'custom_toggle']) !!}
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('is_active') }}</small>
                  </div>
              </div>


              </div>
              
              
                <div class="form-group">
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Update') }}</button>
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
  $(document).ready(function(){
    $('.upload-image-main-block').hide();
    $('.for-custom-image input').click(function(){
      if($(this).prop("checked") == true){
        $('.upload-image-main-block').fadeIn();
      }
      else if($(this).prop("checked") == false){
        $('.upload-image-main-block').fadeOut();
      }
    });
  });
</script>
@endsection