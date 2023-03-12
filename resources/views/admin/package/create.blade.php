@extends('layouts.master')
@section('title',__('Create Package'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Package') }}</li>
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
          <a href="{{url('admin/packages')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Package')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'PackageController@store']) !!}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('plan_id') ? ' has-error' : '' }}">
                  {!! Form::label('plan_id', __('PlanID')) !!}
                  {!! Form::text('plan_id', null, ['class' => 'form-control', 'required' => 'required', 'data-toggle' => 'popover','data-content' => __('Unique Package').' ex. basic10', 'data-placement' => 'bottom']) !!}
                  <small class="text-danger">{{ $errors->first('plan_id') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', __('Package Name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('feature') ? ' has-error' : '' }}">
                    {!! Form::label('feature',__('Package Feature')) !!} <span class="text-danger">*</span>
                    <select class="select2 form-control" name="feature[]" multiple>
                      @foreach($p_feature as $pf)
                        <option value="{{$pf->id}}">{{$pf->name}}</option>
                      @endforeach
                    </select>
                    
                    <small class="text-danger">{{ $errors->first('feature') }}</small>
                </div>
              </div>
              {!! Form::hidden('currency', $currency_code) !!}
            <div class="col-md-4">
              <div class="form-group text-dark{{ $errors->has('free') ? ' has-error' : '' }}">
                <div class="row">
                  <div class="col-md-4">
                    {!! Form::label('free', __('Free')) !!}
                  </div>
                  <div class="col-md-5 pad-0">
                    <label class="switch">
                      {!! Form::checkbox('free', 1, 0, ['class' => 'custom_toggle seriescheck','id'=>'free']) !!}
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                 
                  <small class="text-danger">{{ $errors->first('free') }}</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group text-dark{{ $errors->has('amount') ? ' has-error' : '' }}" id="planAmount">
                  {!! Form::label('amount', __('Your Plan Amount')) !!}
                  <div class="input-group">
                    <span class="input-group-addon simple-input"><i class="{{$currency_symbol}}"></i></span>
                    {!! Form::number('amount', null, ['class' => 'form-control', 'step'=>'0.01']) !!}  
                  </div>
                  <input type="text" name="currency_symbol" id="currency_symbol" value="{{$currency_symbol}}" hidden="true">
                  <small class="text-danger">{{ $errors->first('amount') }}</small>
              </div>
            </div>
               <div class="col-md-4">
                      <div class="form-group text-dark{{ $errors->has('interval_count') ? ' has-error' : '' }}">
                          {!! Form::label('interval_count', __('Your Plan Duration')) !!}
                          {!! Form::number('interval_count', null, ['min' => 1, 'class' => 'form-control', 'required' => 'required']) !!}
                          <small class="text-danger">{{ $errors->first('interval_count') }}</small>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group text-dark{{ $errors->has('interval') ? ' has-error' : '' }}">
                          {!! Form::label('interval', __('Plan Duration Unit')) !!}
                          {!! Form::select('interval', ['day'=>'Daily', 'week' => 'Weekly', 'month' => 'Monthly', 'year' => 'yearly'], ['month' => 'Monthly'], ['class' => 'form-control select2', 'required' => 'required']) !!}
                          <small class="text-danger">{{ $errors->first('interval') }}</small>
                       </div>
                  </div>

               
              <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('trial_period_days') ? ' has-error' : '' }}">
                    {!! Form::label('trial_period_days', __('Your Plan Trail Period Days')) !!}
                    {!! Form::number('trial_period_days', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('trial_period_days') }}</small>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('screen') ? ' has-error' : '' }}">
                    {!! Form::label('screen', __('Screens')) !!}
                    {!! Form::number('screens', null, ['class' => 'form-control', 'min' => '1', 'max' => '4']) !!}
                    <small class="text-danger">{{ $errors->first('screen') }}</small>
                </div>
                </div>

                 <!-----------  for download limit ------------------>
                <div class="col-md-4">
                  <div class="form-group text-dark{{ $errors->has('download') ? ' has-error' : '' }}">
                  
                    {!! Form::label('download', __('Do You Want Download Limit')) !!}
                    <label class="switch">
                      {!! Form::checkbox('download', 1, 0, ['class' => 'custom_toggle seriescheck','id'=>'download_enable']) !!}
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('download') }}</small>
                  </div>
                  <small class="text-danger">{{ $errors->first('downloadlimit') }}</small>
              
                  <div id="downloadlimit" class="form-group text-dark{{ $errors->has('download limit') ? ' has-error' : '' }}" style="display:none">
                      {!! Form::label('downloadlimit', __('DownloadLimit')) !!}
                      {!! Form::number('downloadlimit', null, ['class' => 'form-control']) !!}
                      <small class="text-danger">{{__('Note')}} :- <br/>
                        1. {{__('Given download limit will apply for each screens')}}.<br/>
                        2. {{__('If you enter 0 it means user can unlimited download')}}
                      </small>
                      
                  </div>
                  
                </div>
  
              <!--------------- end download limit ------------------->
              <div class="col-md-4">
                <div class="form-group text-dark{{ $errors->has('status') ? ' has-error' : '' }}">
                  {!! Form::label('status',__('Status')) !!} <span class="text-danger">*</span>
                  <select class="select2 form-control" name="status">
                    <option value="active">{{__('Active')}}</option>
                    <option value="upcoming">{{__('Upcoming')}}</option>
                    <option value="inactive">{{__('In Active')}}</option>
                  </select>
                  
                  <small class="text-danger">{{ $errors->first('status') }}</small>
                </div>
              </div>

              <div class="col-md-4">
                <div class="menu-block">
                  <h6 class="menu-block-heading">{{__('Please Select Menu')}}</h6>
                  
                  @if (isset($menus) && count($menus) > 0)
                    <div class="row">
                      <div class="col-md-4">
                        {{__('All Menus')}}
                      </div>
                      <div class="col-md-5 pad-0">
                        <div class="inline">
                          <input type="checkbox" class="filled-in material-checkbox-input all" name="menu[]" value="100" id="checkbox{{100}}" >
                          <label for="checkbox{{100}}" class="material-checkbox"></label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      @foreach ($menus as $menu)
                      <div class="col-md-4">
                        {{$menu->name}}
                      </div>
                      <div class="col-md-5 pad-0">
                        <div class="inline">
                          <input type="checkbox" class="filled-in material-checkbox-input one" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" >
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  @endif
                </div>
              </div>
  
              <div class="col-md-4">
                @php
                  $webconfig = App\Button::first();
                @endphp
                @if($webconfig->remove_ads == 1)
                  <div class="form-group text-dark{{ $errors->has('ads_in_web') ? ' has-error' : '' }}">
                    <div class="row">
                      <div class="col-md-6">
                        {!! Form::label('ads_in_web', __('Do you want show Ads in Web')) !!}
                      </div>
                      <div class="col-md-5 pad-0">
                        <label class="switch">
                          {!! Form::checkbox('ads_in_web', 1, 0, ['class' => 'custom_toggle']) !!}
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('ads_in_web') }}</small>
                    </div>
                  </div>
                @endif
              </div>
              <div class="col-md-4">
                @php
                  $appconfig = App\AppConfig::first();
                @endphp
                @if($appconfig->remove_ads == 1)
                  <div class="form-group text-dark{{ $errors->has('ads_in_app') ? ' has-error' : '' }}">
                    <div class="row">
                      <div class="col-md-6">
                        {!! Form::label('ads_in_app', __('Do you want show Ads in App')) !!}
                      </div>
                      <div class="col-md-5 pad-0">
                        <label class="switch">
                          {!! Form::checkbox('ads_in_app', 1, 0, ['class' => 'custom_toggle']) !!}
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('ads_in_app') }}</small>
                    </div>
                  </div>
                @endif
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
<script type="text/javascript">
  // when click all menu  option all checkbox are checked

  $(".all").click(function(){
    if($(this).is(':checked')){
      $('.one').prop('checked',true);
    }
    else{
      $('.one').prop('checked',false);
    }
  })

</script>
<script>
$('#download_enable').on('change',function(){
if($('#download_enable').is(':checked')){
  //show
  $('#downloadlimit').show();
}else{
  //hide
   $('#downloadlimit').hide();
}
});


$('#free').on('change',function(){
if($('#free').is(':checked')){
  //show
  $('#planAmount').hide();
}else{
  //hide
   $('#planAmount').show();
}
});
</script>
@endsection