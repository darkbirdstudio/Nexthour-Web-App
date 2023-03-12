@extends('layouts.master')
@section('title',__('Edit')." "." - $liveevent->title")
@section('breadcum')
	<div class="breadcrumbbar">
    <h4 class="page-title">{{ __('HOME') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Live Event') }}</li>
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
          <a href="{{url('admin/liveevent')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Edit Live Event')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($liveevent, ['method' => 'PATCH', 'action' => ['LiveEventController@update',$liveevent->id], 'files' => true]) !!}
            <div class="bg-info-rgba p-4 mb-4 rounded">
              <div class="row">
                <div class="col-lg-4 col-md-4">
                  <div id="movie_title" class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', __('EventTitle')) !!}
                    <input id="mv_t" type="text" class="form-control" name="title" value="{{ $liveevent->title }}">
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group text-dark{{ $errors->has('start_time') ? ' has-error' : '' }}">
                    {!! Form::label('start_time',__('Event Start Time')) !!}
                    <input type="datetime-local" name="start_time" class="form-control" value="{{date('Y:m:d H:i:s',strtotime($liveevent->start_time))}}" >
                    <small class="text-danger">{{ $errors->first('start_time') }}</small>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group text-dark{{ $errors->has('end_time') ? ' has-error' : '' }}">
                    {!! Form::label('end_time', __('Event End Time')) !!}
                     <input type="datetime-local" name="end_time" class="form-control" value="{{$liveevent->end_time}}" >
                    <small class="text-danger">{{ $errors->first('end_time') }}</small>
                  </div>  
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group text-dark{{ $errors->has('organized_by') ? ' has-error' : '' }}">
                    {!! Form::label('organized_by', __('Event Organize dBy')) !!}
                    {!! Form::text('organized_by',  $liveevent->organized_by, ['class' => 'form-control', ]) !!}
                    <small class="text-danger">{{ $errors->first('organized_by') }}</small>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8">
                  {{-- select to upload code start from here --}}
                  <div class="form-group text-dark{{ $errors->has('selecturl') ? ' has-error' : '' }}">
                    {!! Form::label('selecturls',__('Add Video')) !!}
                    <select class="form-control select2" id="selecturl" name="selecturl">
                      <option></option>
                      @if($liveevent['iframeurl']!='')
                      <option value="iframeurl" selected="">{{__('IFrame URL')}}</option>
                      @else
                        <option value="iframeurl">{{__('IFrame URL')}}</option>
                      @endif
                      
                  
                      @if($liveevent['ready_url']!='')
                      <option value="customurl" selected="">{{__('Custom URL Youtube URL Vimeo URL')}}</option>
                        @else
                        <option value="customurl">{{__('Custom URL Youtube URL Vimeo URL')}}</option>
                      @endif
                  
                    </select>
                    <small class="text-danger">{{ $errors->first('selecturl') }}</small>
                  </div>      
                  <div id="ifbox"  style="{{$liveevent['iframeurl']!='' ? '' : "display: none" }}" class="form-group">
                    <label for="iframeurl">{{__('IFRAME URL')}}: </label> <a data-toggle="modal" data-target="#embdedexamp"></a>
                    <input  type="text" value="{{$liveevent['iframeurl']}}" class="form-control" name="iframeurl" placeholder="{{__('Iframe URL')}}">
                  </div>
                  {{-- custom /M3U8 --}}
                  <div id="ready_url" style="{{$liveevent['ready_url']!='' ? '' : "display: none" }}" class="form-group text-dark{{ $errors->has('ready_url') ? ' has-error' : '' }}">
                    <label id="ready_url_text">{{__('CUSTOM URL')}}:</label>
                    {!! Form::text('ready_url',$liveevent['ready_url'], ['class' => 'form-control','id'=>'apiUrl']) !!}
                    <small class="text-danger">{{ $errors->first('ready_url') }}</small>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group text-dark{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description',__('Description')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-info-rgba p-4 mb-4 rounded">
              <div class="row">
                <div class="col-lg-8 col-md-8">
                  <div class="form-group text-dark">
                    {!! Form::label('', 'Choose custom thumbnail & poster') !!}
                    <br>
                    <label class="switch for-custom-image">
                      {!! Form::checkbox('', 1, 1, ['class' => 'checkbox-switch']) !!}
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="upload-image-main-block">
                    {{-- <form method="post" enctype="multipart/form-data" id="mainform"> --}}
                      <div class="row">
                        <div class="col-lg-4 col-md-5 mb-4">
                          <label>{{__('Thumbnail')}}</label>
                        <div class="thumbnail-img-block">
                          @if(isset($liveevent->thumbnail) && $liveevent->thumbnail != NULL)
                          <img src="{{url('/images/events/thumbnails/'.$movie->thumbnail)}}" id="thumbnail" class="img-fluid" alt="">
                        @else
                        <img src="{{ url('images/default-thumbnail.jpg')}}" id="thumbnail" class="img-fluid" alt="">
                        @endif
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input" type="file" name="thumbnail" class="form-control" onchange="readURL(this);" />
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-7 mb-4">
                        <label>{{__('Posters')}}</label>
                        <div class="poster-img-block">
                          @if(isset($liveevent->poster) && $liveevent->poster != NULL)
                            <img src="{{url('/images/events/posters/'.$liveevent->poster)}}" id="poster" class="img-fluid" alt="">
                          @else
                          <img src="{{ url('images/default-poster.jpg')}}" id="poster" class="img-fluid" alt="">
                          @endif
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input_one" type="file" name="poster" class="form-control" onchange="readURL(this);" />
                        </div>
                        </div>
                        <!-- <div class="col-md-6">
                          <div class="form-group text-dark{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                            {!! Form::label('thumbnail',__('Thumbnail')) !!}
                            {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
                            <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{isset($liveevent->thumbnail) ? $liveevent->thumbnail :__('Thumbnail')}}">
                              <span class="js-fileName">{{isset($liveevent->thumbnail) ? $liveevent->thumbnail :__('ChooseAFile')}}</span>
                            </label>
                            <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group text-dark{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
                            {!! Form::label('poster', __('Poster')) !!} 
                            {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
                            <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{isset($liveevent->poster) ? $liveevent->poster :__('Poster')}}">
                              <span class="js-fileName">{{isset($liveevent->poster) ? $liveevent->poster :__('Choose A File')}}</span>
                            </label>
                            <small class="text-danger">{{ $errors->first('poster') }}</small>
                          </div>
                        </div> -->
                      </div>
                    {{-- </form> --}}
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="menu-block">
                    <h6 class="menu-block-heading">{{__('Please Select Menu')}}</h6>
                    @if (isset($menus) && count($menus) > 0)
                    <div class="row">
                      @foreach ($menus as $menu)
                      <div class="col-lg-4 col-md-8 col-6">
                        {{$menu->name}}
                      </div>
                      @php
                        $checked = null;
                        if (isset($menu->menu_data) && count($menu->menu_data) > 0) {
                          if ($menu->menu_data->where('movie_id', $liveevent->id)->where('menu_id', $menu->id)->first() != null) {
                            $checked = 1;
                          }
                        }
                      @endphp
                      <div class="col-lg-8 col-md-4 col-6 pad-0">
                        <div class="inline">
                          @if ($checked == 1)
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" checked>
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                          @else
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                          @endif
                        </div>
                      </div>
                      @endforeach
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-group text-dark{{ $errors->has('status') ? ' has-error' : '' }}">
                    <div class="row">
                      <div class="col-md-6">
                        {!! Form::label('status',__('Status')) !!}
                      </div>
                      <div class="col-md-5 pad-0">
                        <label class="switch">                
                          {!! Form::checkbox('status', 1, $liveevent->status, ['class' => 'custom_toggle']) !!}
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{--  <div id="movie_slug" class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
              {!! Form::label('slug', 'Movie Slug') !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie slug"></i>
              <input type="text" class="form-control" name="slug" value="{{ $movie->slug }}">
              <small class="text-danger">{{ $errors->first('slug') }}</small>
            </div> --}}
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group ">
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __('Update') }}</button>
                </div>
              </div>
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
     $('#ifbox').show();
    $('#selecturl').change(function(){  
     selecturl = document.getElementById("selecturl").value;
     if (selecturl == 'iframeurl') {
        $('#ifbox').show();
        $('#ready_url').hide();

      }else if(selecturl=='customurl'){
       $('#ifbox').hide();
       $('#ready_url').show();
       $('#ready_url_text').text('Enter Custom URL orm M3U8 URL');
   }
   
});
    
</script>
@endsection