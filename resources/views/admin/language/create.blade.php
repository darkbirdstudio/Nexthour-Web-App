@extends('layouts.master')
@section('title',__('Create Language'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Language') }}</li>
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
      <div class="card m-b-30">
        <div class="card-header">
          <a href="{{url('admin/languages')}}" class="float-right btn btn-primary-rgba mr-2"><i
              class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Language')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'LanguageController@store']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('local') ? ' has-error' : '' }}">
                  {!! Form::label('local', __('local')) !!}
                  {!! Form::text('local', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Please Enter Language Local Name')]) !!}
                  <small class="text-danger">{{ $errors->first('local') }}</small>
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', __('Name')) !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Please Enter Language Name')]) !!}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
              </div>
  
              <div class="form-group">
                <label for="">{{__('Set Default')}}</label>
                <br>
                <label class="switch">
                       <input name="def" type="checkbox" class="custom_toggle" id="logo_chk">
                  </label>
              </div>
              <div class="form-group">
                <label for="">{{__('RTL')}}</label>
                <br>
                <label class="switch">
                       <input name="rtl" type="checkbox" class="custom_toggle" id="rtl">
                  </label>
              </div>


              </div>
              
              
                <div class="form-group">
                  <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
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
    
@endsection