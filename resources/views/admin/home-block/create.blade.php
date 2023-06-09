@extends('layouts.master')
@section('title',__('Create Home Block'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Home Block') }}</li>
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
          <a href="{{url('admin/home-block')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Home Block')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'HomeBlockController@store', 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="bootstrap-checkbox slide-option-switch form-group{{ $errors->has('home_block') ? ' has-error' : '' }}">
                  <div class="row">
                    <div class="col-md-7">
                      <h5 class="bootstrap-switch-label">{{__('Promotion Settings Block Type')}}</h5>
                    </div>
                    <div class="col-md-5 pad-0">
                      <div class="make-switch">
                        {!! Form::checkbox('', 1, 1, ['class' => 'bootswitch', 'id' => 'TheCheckBox', "data-on-text"=>"Movies", "data-off-text"=>"Tv Series", "data-size"=>"small"]) !!}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger">{{ $errors->first('home_block') }}</small>
                  </div>
                </div>
              
                <div id="movie_id_block" class="form-group text-dark{{ $errors->has('movie_id') ? ' has-error' : '' }}">
                  {!! Form::label('movie_id', __('Select Promotion Settings Block For Movie')) !!}
                  {!! Form::select('movie_id', $movie_list, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                  <small class="text-danger">{{ $errors->first('movie_id') }}</small>
                </div>
                <div id="tv_series_id_block" class="form-group text-dark{{ $errors->has('tv_series_id') ? ' has-error' : '' }}">
                  {!! Form::label('tv_series_id', __('Select Promotion Settings Block For Tv Show')) !!}
                  {!! Form::select('tv_series_id', $tv_series_list, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                  <small class="text-danger">{{ $errors->first('tv_series_id') }}</small>
                </div>
    
                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                  <div class="row">
                    <div class="col-md-3">
                      {!! Form::label('is_active', __('Active')) !!}
                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">
                        {!! Form::checkbox('is_active', 1, 1, ['class' => 'custom_toggle']) !!}
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('series') }}</small>
                  </div>
                </div>


              </div>
              
              
                <div class="form-group">
                  <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Add Promotion Settings Block') }}</button>
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

    $('#tv_series_id_block').hide();

    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

        if (state == true) {

          $('#tv_series_id_block').hide();
          $('#movie_id_block').show();

        } else if (state == false) {

          $('#tv_series_id_block').show();
          $('#movie_id_block').hide(); 

        };

    });

  
  });
</script>
@endsection