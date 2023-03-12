@extends('layouts.master')
@section('title',__('All Movies Request'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('All Movies Request') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('All Movies Request') }}</li>
                    </ol>
                </div>      
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
<div class="row">
  
  <div class="col-lg-12">
      <div class="card m-b-50">
          <div class="card-header">
                <h5 class="card-title"> {{__("All Movies Request")}}</h5>
          </div>
          
          <div class="card-body">
           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                    <thead>
                      <th>#</th>
                      <th>{{__('Name')}}..</th>
                      <th>{{__('Email')}}</th>
                      <th>{{__('Movie Name')}}</th>
                    </thead>
                
                    <tbody>
              @if ($req)
                <tbody>
                  @foreach ($req as $key => $r)
                    <tr>
                      <td>
                        {{$key+1}}
                      </td>
                      <td>{{$r->name}}</td>
                      <td>{{$r->email}}</td>
                      <td>{{$r->mr_name}}</td>
                    </tr>
                  @endforeach
                </tbody>
              @endif
                </table>
                <div class="col-md-12 pagination-block text-center">
                    {!! $req->appends(request()->query())->links() !!}
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection 
@section('script')
@endsection