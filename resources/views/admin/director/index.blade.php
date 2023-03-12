@extends('layouts.master')
@section('title',__('All Directors'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('All Directors') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Directors') }}</li>
                    </ol>
                </div>   
    </div>
@endsection
@section('maincontent')
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">
      <div class="card-header movie-create-heading">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-4">
            <h5 class="card-title">{{ __('All Directors') }}</h5>
          </div>
          <div class="col-lg-8 col-md-8 col-8">
            @can('director.create')
            <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> {{ __('Delete Selected') }} </button>
            @endcan
            @can('director.delete')
            <a href="{{route('directors.create')}}" class="float-right btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __('Add Director') }} </a>
            @endcan

            <button type="button" class="float-right btn btn-success-rgba mr-2 " data-toggle="modal"
            data-target=".bd-example-modal-lg"><i class="fa fa-file-excel-o mr-2"></i> {{ __('Import Director') }} </button>

            {{-- Bulk Delete Model Start --}}
            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
              <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close"
                              data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                          <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
                          <p>{{__('Do you really want to delete selected item names here? This
                              process
                              cannot be undone.')}}</p>
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['method' => 'POST', 'action' => 'DirectorController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                              @method('POST')
                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                              <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
                          {!! Form::close() !!}
                      </div>
                  </div>
              </div>
            </div>
            {{-- Bulk Delete Model End --}}

            {{-- Impport Model Start --}}
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleLargeModalLabel">{{__("Bulk Import Directors")}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                          <div class="col-md-12">
                              <div class="card-header">
                                  <a href="{{ url('files/Directors.xlsx') }}" class="float-right btn btn-success-rgba mr-2"><i
                                      class="fa fa-file-excel-o mr-2"></i>{{ __('Download Example xls/csv File') }}</a>
                              </div>
                          </div>

                          <div class="card-header">
                              <h6 class="card-title">{{ __('Choose your xls/csv File :') }}</h6>
                              <form action="{{ url('/admin/import/directors') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} input-file-block col-md-12">
                                  {!! Form::file('file', ['class' => 'input-file', 'id'=>'file']) !!}
                                  <label for="file" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Choose your xls/csv File')}}">
                                    <i class="icon fa fa-check"></i>
                                    <span class="js-fileName">{{__('Choose A File')}}</span>
                                  </label>
                                  <small class="text-danger">{{ $errors->first('file') }}</small>
              
                                  <button type="submit" class="float-right btn btn-danger-rgba mr-2 "><i class="feather icon-plus mr-2"></i> {{__('Import')}} </button>
                                </div>
                                  
                              </form>
                          </div> 
                          
                      <div class="modal-body">
                          <div class="box box-danger">
                              <div class="box-header">
                                <div class="box-title">{{__('Instructions')}}</div>
                              </div>
                              <div class="box-body table-responsive">
                                <h6><b>{{__('Follow the instructions carefully before importing the file.')}}</b></h6>
                                <small>{{__('The columns of the file should be in the following order.')}}</small>
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>{{__('Column No')}}</th>
                                      <th>{{__('Column Name')}}</th>
                                      <th>{{__('Required')}}</th>
                                      <th>{{__('Description')}}</th>
                                    </tr>
                                  </thead>
                
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td><b>{{__('name')}}</b></td>
                                      <td><b>{{__('Yes')}}</b></td>
                                      <td>{{__('Enter director name')}}</td>
                                    </tr>
                
                                    <tr>
                                      <td>2</td>
                                      <td> <b>{{__('image')}}</b> </td>
                                      <td><b>{{__('No')}}</b></td>
                                      <td>{{__('Name your image eg: example.jpg')}} <b>{{__('(Image can be uploaded using Media Manager / Director Tab.)')}}</b></td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td> <b>{{__('biography')}}</b> </td>
                                      <td><b>{{__('No')}}</b></td>
                                      <td>{{__('Enter directors biography')}}</b></td>
                                    </tr>
                
                                    <tr>
                                      <td>4</td>
                                      <td> <b>{{__('place_of_birth')}}</b> </td>
                                      <td><b>{{__('No')}}</b></td>
                                      <td>{{__("Enter director's place of birth")}}</b></td>
                                    </tr>
                
                                    <tr>
                                      <td>5</td>
                                      <td> <b>{{__('DOB')}}</b> </td>
                                      <td><b>{{__('No')}}</b></td>
                                      <td>{{__("Enter director's DOB")}}</b></td>
                                    </tr>
                
                                  </tbody>
                                </table>
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
            </div>
            {{-- Import Model End --}}
          </div> 
        </div>
      </div>

            <div class="card-body">
                <section id="movies" class="movies-main-block">
                    <div class="row">
                      @if(isset($directors) && $directors->count() > 0)
                      @foreach($directors as $item)
                        @php
                          if($item->image != NULL){
                            $content = @file_get_contents(public_path() .'/images/directors/' . $item->image); 
                            if($content){
                              $image = public_path() .'/images/directors/' . $item->image;
                            }else{
                              $image = Avatar::create($item->name)->toBase64();
                            }
                          }else{
                            $image = Avatar::create($item->name)->toBase64();
                          }
            
                          $imageData = base64_encode(@file_get_contents($image));
                          if($imageData){
                              $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                          } 
                        @endphp
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <input class="form-check-card-input visibility-visible" form="bulk_delete_form" type="checkbox" value="{{$item->id}}" id="checkbox{{$item->id}}" name="checked[]">         
                            <div class="card">
                              @if($src != NULL)
                                <img src="{{$src}}" class="card-img-top" alt="...">
                              @endif
                                <div class="overlay-bg"></div>
                                <div class="dropdown card-dropdown">
                                    <a class="btn btn-round btn-outline-primary pull-right dropdown-toggle" type="button" id="dropdownMenuButton-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></a>
                                    <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton-{{$item->id}}">
                                      @can('director.view')
                                        <a class="dropdown-item" href="{{url('video/detail/director_search', $item->slug)}}" target="__blank"><i class="feather icon-monitor mr-2"></i> {{__('Page Preview')}}</a> 
                                      @endcan
                                      @can('director.edit')                                       
                                        <a class="dropdown-item" href="{{ route('directors.edit', $item->id)}}"><i class="feather icon-edit mr-2"></i> {{__('Edit')}}</a>
                                      @endcan
                                      @can('director.delete')                                      
                                        <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i class="feather icon-trash mr-2"></i> {{__('Delete')}}</a>
                                      @endcan
                                    </div>
                                </div>
                                <div id="deleteModal{{$item->id}}" class="delete-modal modal fade card-dropdown-modal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading">Are You Sure ?</h4>
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                              <form method="POST" action="{{route("directors.destroy", $item->id)}}">
                                                @method('DELETE')
                                                @csrf
                                              <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                                              <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-header">
                                  <h5 class="card-title">{{$item->name}}</h5><br>
                                </div>
                                <div class="card-body">
                                    <div class="card-block row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                           <h6 class="card-body-sub-heading">{{__('DOB')}}</h6>
                                           <p>{{isset($item->DOB) && $item->DOB != NULL ? $item->DOB : '-' }}</p>
                                        </div>                      
                                    </div>
                                    <div class="card-block card-block-ratings">
                                        <h6 class="card-body-sub-heading">{{__('Place Of Birth')}}</h6>
                                        <p>{{isset($item->place_of_birth) && $item->place_of_birth != NULL ? str_limit($item->place_of_birth,30) : '-'}}</p>
                                    </div>
                                    <div class="card-block">
                                        <h6 class="card-body-sub-heading">{{__('BioGraphy')}}</h6>
                                        <p>{{isset($item->biography) && $item->biography != NULL ? str_limit($item->biography,50) : '-'}}</p>
                                    </div>          
                                </div>
                            </div>
                        </div>
                        @endforeach
          <div class="col-md-12 pagination-block text-center">
           {!! $directors->appends(request()->query())->links() !!}
          </div>
        @else
          <div class="col-md-12 text-center">
            <h5>{{__("Let's start :)")}}</h5>
            <small>{{__('Get Started by creating a director ! All of your directors will be displayed on this page.')}}</small>
          </div>
        @endif
                    </div>
                </section>
            </div>
        </div>
</div>
</div>
</div>
@endsection 
@section('script')
   

@endsection