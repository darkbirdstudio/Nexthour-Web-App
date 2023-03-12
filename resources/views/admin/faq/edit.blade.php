@extends('layouts.master')
@section('title',__('Edit FAQ'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit FAQ') }}</li>
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
          <a href="{{url('admin/faqs')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Edit FAQ')}}</h5>
        </div>
        <div class="card-body ml-2">
          <form action="{{ route('socialic') }}" method="POST">
			 		{{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-dark{{ $errors->has('question') ? ' has-error' : '' }}">
                  {!! Form::label('question', __('Faq Question')) !!}
                  {!! Form::text('question', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('question') }}</small>
              </div>
              <div class="form-group text-dark{{ $errors->has('answer') ? ' has-error' : '' }}">
                  {!! Form::label('answer', __('FaqAnswer')) !!}
                  {!! Form::textarea('answer', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                  <small class="text-danger">{{ $errors->first('answer') }}</small>
              </div>
            </div>
            
                <div class="form-group">
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Update') }}</button>
                </div>
              </form>
                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')
@endsection