@extends('layouts.master')
@section('title',__('Import Demo'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('Import Demo') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Import Demo') }}</li>
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
            
                <div class="card m-b-30">
                        <div class="card-header">
                            <h4 class="card-box">{{ __('Demo Import') }}</h4>
                        </div> 
                       
                        <div class="card-body">
                        
                            <div class="card-body bg-success-rgba">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="text-success process-fonts"><i class="fa fa-info-circle"></i> {{ __('Important Note') }}</h5>
                             
                                            <ul class="process-font text-success process-fonts">
                                                <li>
                                                    {{ __('ON Click of import data your existing data will remove (except users &amp; settings)') }}
                                                </li>
                                                <li>
                                                    {{ __('ON Click of reset data will reset your site (which you see after fresh install).') }}
                                                </li>
                                            </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <form action="{{ url('/admin/import/import-demo') }}" class="form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row"> 
                                                                    <div class="col-md-12">
                                                                        <label class="text-dark">{{ __('Demo Import') }} :<span class="text-danger">*</span></label>
                                                                        <button type="submit" class="btn btn-danger-rgba btn-lg btn-block">
                                                                            {{ __('Demo Import') }}
                                                                        </button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ url('/admin/reset-demo') }}" class="form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">  
                                                                <div class="col-md-12">
                                                                        <label class="text-dark">{{ __('Reset Demo') }} :<span class="text-danger">*</span></label>
                                                                        <button type="submit" class="btn btn-warning-rgba btn-lg btn-block">
                                                                            {{ __('Reset Demo') }}
                                                                        </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
</div>
@endsection 
@section('script')
   

@endsection