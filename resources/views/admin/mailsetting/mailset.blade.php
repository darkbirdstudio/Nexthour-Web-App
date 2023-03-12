@extends('layouts.master')
@section('title', __('Mail Settings'))
@section('breadcum')
<div class="breadcrumbbar">
          <h4 class="page-title">{{ __('Mail Settings') }}</h4>
          <div class="breadcrumb-list">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mail Settings') }}</li>
              </ol>
          </div> 
</div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{__('Mail Settings')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($env_files, ['method' => 'POST', 'action' => 'ConfigController@changeMailEnvKeys']) !!}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group text-dark{{ $errors->has('MAIL FROM NAME') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_FROM_NAME',__('Sender Name')) !!}
                    <input class="form-control" type="text" name="MAIL_FROM_NAME" value="{{ $env_files['MAIL_FROM_NAME'] }}">
                    <small class="text-danger">{{ $errors->first('MAIL_FROM_NAME') }}</small>
                </div>

                <div class="form-group text-dark{{ $errors->has('MAIL_FROM_ADDRESS') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_DRIVER', __('MAIL FROM ADDRESS')) !!}
                  {!! Form::email('MAIL_FROM_ADDRESS', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('MAIL_FROM_ADDRESS') }}</small>
                </div>
                

                <div class="form-group text-dark{{ $errors->has('MAIL_PORT') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_PORT', __('MAIL PORT')) !!}
                  {!! Form::text('MAIL_PORT', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('MAIL_PORT') }}</small>
                </div>

                <div class="form-group text-dark{{ $errors->has('MAIL_USERNAME') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_USERNAME', __('MAIL USERNAME')) !!}
                  {!! Form::text('MAIL_USERNAME', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('MAIL_USERNAME') }}</small>
                </div>

              </div>
              
              <div class="col-md-6">

                <div class="form-group text-dark{{ $errors->has('MAIL HOST') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_DRIVER', __('MAIL DRIVER')) !!}
                    {!! Form::text('MAIL_DRIVER', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('MAIL_DRIVER') }}</small>
                </div>

                <div class="form-group text-dark{{ $errors->has('MAIL HOST') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_HOST', __('MAIL HOST')) !!}
                  {!! Form::text('MAIL_HOST', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('MAIL_HOST') }}</small>
                </div>

                <div class="search form-group mail-password-input text-dark{{ $errors->has('MAIL_PASSWORD') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_PASSWORD', __('MAIL PASSWORD')) !!}
                  <input type="password" name="MAIL_PASSWORD" id="mailpass" value="{{$env_files['MAIL_PASSWORD']}}" class="form-control">
                  <i class="feather icon-eye"></i>
                  <small class="text-danger">{{ $errors->first('MAIL_PASSWORD') }} </small>
                </div>
    

                <div class="form-group text-dark{{ $errors->has('MAIL_ENCRYPTION') ? ' has-error' : '' }}">
                  {!! Form::label('MAIL_ENCRYPTION', __('MAIL ENCRYPTION')) !!}
                  {!! Form::text('MAIL_ENCRYPTION', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('MAIL_ENCRYPTION') }}</small>
                </div>

              </div>
              
                <div class="col-md-6 col-lg-6 col-xl-12 form-group">
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

  $(".toggle-password2").click(function() {

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