@extends('layouts.master')
@section('title', __('Adsense'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('Adsense') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Adsense') }}</li>
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
                <h5 class="card-title">{{ __('Adsense') }}</h5>
            </div> 

            <div class="card-body">
                @if ($ad)
                  {!! Form::model($ad, ['method' => 'PUT', 'action' => ['AdsenseController@update', $ad->id], 'files' => true]) !!}

                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                        {!! Form::label('code', __('Enter Your Adsense Script')) !!}
                        {!! Form::textarea('code', null, ['placeholder' => __('Enter Your Adsense Script'),'id' => 'textarea', 'class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('code') }}</small>
                    </div>
                      <div class="bootstrap-checkbox form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <div class="row">
                          <div class="col-md-7">
                            <h5 class="bootstrap-switch-label">{{__('Status')}}</h5>
                          </div>
                          <div class="col-md-5 pad-0">
                            <div class="make-switch">
                              {!! Form::checkbox('status', 1, ($ad->status == '1' ? true : false), ['class' => 'custom_toggle']) !!}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>
                      </div>
                      <!-- is Home -->
                        <div class="bootstrap-checkbox form-group{{ $errors->has('ishome') ? ' has-error' : '' }}">
                        <div class="row">
                          <div class="col-md-7">
                            <h5 class="bootstrap-switch-label">{{__('Visible On Home')}}</h5>
                          </div>
                          <div class="col-md-5 pad-0">
                            <div class="make-switch">
                              {!! Form::checkbox('ishome', 1, ($ad->ishome == '1' ? true : false), ['class' => 'custom_toggle']) !!}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <small class="text-danger">{{ $errors->first('ishome') }}</small>
                        </div>
                      </div>
                    
                      <!-- is wishlist -->
                        <div class="bootstrap-checkbox form-group{{ $errors->has('iswishlist') ? ' has-error' : '' }}">
                        <div class="row">
                          <div class="col-md-7">
                            <h5 class="bootstrap-switch-label">{{__('Visible On Wishlist')}}</h5>
                          </div>
                          <div class="col-md-5 pad-0">
                            <div class="make-switch">
                              {!! Form::checkbox('iswishlist', 1, ($ad->iswishlist == '1' ? true : false), ['class' => 'custom_toggle']) !!}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <small class="text-danger">{{ $errors->first('iswishlist') }}</small>
                        </div>
                      </div>
                      <!-- is View All -->
                        <div class="bootstrap-checkbox form-group{{ $errors->has('isviewall') ? ' has-error' : '' }}">
                        <div class="row">
                          <div class="col-md-7">
                            <h5 class="bootstrap-switch-label">{{__('Visible On ViewAll')}}</h5>
                          </div>
                          <div class="col-md-5 pad-0">
                            <div class="make-switch">
                              {!! Form::checkbox('isviewall', 1, ($ad->isviewall == '1' ? true : false), ['class' => 'custom_toggle']) !!}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <small class="text-danger">{{ $errors->first('isviewall') }}</small>
                        </div>
                      </div>
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-primary-rgba">{{__('Save')}}</button>
                    </div>
                    <div class="clear-both"></div>
                  {!! Form::close() !!}
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
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>
@endsection
