@extends('layouts.master')
@section('title',"Edit: $p_feature->name")
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('Edit Package Feature') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Package Feature') }}</li>
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
          <a href="{{url('admin/package_feature')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Package Menu')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($p_feature, ['method' => 'PATCH', 'action' => ['PackageFeatureController@update', $p_feature->id]]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">
                    {{ __('Name') }}:
                    <sup class="text-danger">*</sup>
                  </label>
                  <input value="{{$p_feature->name}}" autofocus required name="name"  type="text" class="form-control"
                    placeholder="{{ __('Please enter package feature') }}" />
                </div>
              </div>
            </div>
              <div class="form-group">
                <button type="reset" class="btn btn-success-rgba">{{__('adminstaticwords.Reset')}}</button>
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