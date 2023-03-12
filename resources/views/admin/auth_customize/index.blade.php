@extends('layouts.master')
@section('title',__('Signin And SignUp Customization'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Signin And SignUp Customization') }}</li>
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
          <h5 class="box-title">{{__('Signin And SignUp Customization')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($auth_customize, ['method' => 'POST', 'action' => 'AuthCustomizeController@store', 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                  {!! Form::label('detail',__('Heading Text')) !!}
                  {!! Form::textarea('detail', null, ['id' => 'editor1', 'class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('detail') }}</small>
                </div>

                <div class="row">
                  <div class="col-md-6 form-group text-dark auth-custom-img">
                    @if ($auth_customize->image != null)
                      <img src="{{ asset('images/login/'.$auth_customize->image) }}" class="img-responsive">
                    @else
                      <div class="image-block"></div>                    
                    @endif
                  </div>
                </div>

                <div class="form-group text-dark{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                  {!! Form::label('image', __('Select A Image')) !!}  <p class="inline info"></p>
                  {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                  <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Project Image')}}">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">{{__('Choose A File')}}</span>
                  </label>
                  <p class="info">{{__('Choose A Image')}}</p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
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
  (function ($) {
    // jQuery.noConflict();
    $(window).on('load', function (){
      CKEDITOR.replace('editor1');
    });
    
  })(jQuery);
</script>
@endsection