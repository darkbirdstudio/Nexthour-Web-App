@extends('layouts.master')
@section('title',__('Create Audio'))
@section('breadcum')
	<div class="breadcrumbbar">
    <h4 class="page-title">{{ __('HOME') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Create Audio') }}</li>
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
          <a href="{{url('admin/audio')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Audio')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::open(['method' => 'POST', 'action' => 'AudioController@store', 'files' => true]) !!}
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div id="movie_title" class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', __('AudioTitle')) !!}
                  {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => __('Enter Audio Title')]) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('maturity_rating') ? ' has-error' : '' }}">
                  {!! Form::label('maturity_rating', __('Maturity Rating')) !!}
                  {!! Form::select('maturity_rating', array('all age' => __('All Age'), '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']) !!}
                  <small class="text-danger">{{ $errors->first('maturity_rating') }}</small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('rating') ? ' has-error' : '' }}">
                  {!! Form::label('rating', __('Ratings')) !!}
                  {!! Form::text('rating',  old('rating'), ['class' => 'form-control', ]) !!}
                  <small class="text-danger">{{ $errors->first('rating') }}</small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('a_language') ? ' has-error' : '' }}">
                  {!! Form::label('a_language', __('Audio Languages')) !!}
                  <div class="input-group">
                    {!! Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']) !!}
                    <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                  </div>
                  <small class="text-danger">{{ $errors->first('a_language') }}</small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('genre_id') ? ' has-error' : '' }}">
                  {!! Form::label('genre_id',__('Genre')) !!}
                  <div class="input-group">
                    {!! Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']) !!}
                    <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                  </div>
                  <small class="text-danger">{{ $errors->first('genre_id') }}</small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark">
                  <label for="">{{__('Meta Keyword:')}} </label>
                  <input name="keyword" type="text" value="{{old('keyword')}}" class="form-control" data-role="tagsinput"/>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                {{-- select to upload code start from here --}}
                <div class="form-group text-dark{{ $errors->has('selecturl') ? ' has-error' : '' }}">
                  {!! Form::label('selecturls', __('Add Audio')) !!}
                  {!! Form::select('selecturl', array('audiourl' => __('Audio URL'),
                  'upload_audio' => __('Upload Audio')), null, ['class' => 'form-control select2','id'=>'selecturl']) !!}
                  <small class="text-danger">{{ $errors->first('selecturl') }}</small>
                </div>
                <div id="ifbox" style="display: none;" class="form-group text-dark">
                  <label for="audiourl">{{__('AudioURL')}}: </label> <a data-toggle="modal" data-target="#embdedexamp"></a>
                  <input  type="text" class="form-control" name="audiourl" placeholder="">
                </div>
                <div class="form-group text-dark{{ $errors->has('upload_audio') ? ' has-error' : '' }} input-file-block" id="uploadaudio" style="display: none;">
                  {!! Form::label('upload_audio', __('Upload Audio')) !!} 
                  {{-- {!! Form::file('upload_audio', ['class' => 'input-file', 'id'=>'upload_audio']) !!}
                  <label for="upload_audio" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('UploadAudio')}}">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">{{__('ChooseAFile')}}</span>
                  </label>
                  <p class="info">{{__('ChooseCustomUploadAudio')}}</p> --}}
                  <div class="input-group">
                
                    <input type="text" class="form-control" id="upload_audio" name="upload_audio" >
                    <span class="input-group-addon midia-toggle-upload_audio" data-input="upload_audio">{{__('Choose A Video')}}</span>
                    
                  </div>
                  <small class="text-danger">{{ $errors->first('upload_audio') }}</small>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                  {!! Form::label('detail', __('Description')) !!}
                  {!! Form::textarea('detail', old('detail'), ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                  <small class="text-danger">{{ $errors->first('detail') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('featured') ? ' has-error' : '' }}">
                  {!! Form::label('featured', __('Featured')) !!}
                  <br>
                  <label class="switch">
                    {!! Form::checkbox('featured', 1, 0, ['class' => 'custom_toggle']) !!}
                    <span class="slider round"></span>
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('featured') }}</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark{{ $errors->has('is_protect') ? ' has-error' : '' }}">
                  {!! Form::label('is_protect', __('Protected Video?')) !!}
                  <br>
                  <label class="switch">
                    <input type="checkbox" name="is_protect" class="custom_toggle" id="is_protect">
                    <span class="slider round"></span>
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('is_protect') }}</small>
                  </div>
                </div>
                <div class="search form-group text-dark{{ $errors->has('password') ? ' has-error' : '' }} is_protect" style="display: none;">
                  {!! Form::label('password', __('Protected Password For Video')) !!}
                  <input type="password" name="password" id="password" class="form-control" value="">
                  <!-- {!! Form::password('password', old('password'), ['class' => 'form-control','id'=>'password']) !!} -->
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <small class="text-danger">{{ $errors->first('password') }}</small>
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
                    <div class="col-lg-8 col-md-4 col-6 pad-0">
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
              <div class="col-lg-8 col-md-8">
                {{-- select to upload or add links code ends here --}}
                <div class="form-group text-dark">
                  {!! Form::label('', __('Choose Custom Thumbnail And Poster')) !!}
                  <br>
                  <label class="switch for-custom-image">
                    {!! Form::checkbox('', 1, 1, ['class' => 'custom_toggle']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="upload-image-main-block">
                  {{-- <form method="post" enctype="multipart/form-data" id="mainform"> --}}
                    <div class="row">
                      <div class="col-lg-4 col-md-5 mb-4">
                        <label>{{__('Thumbnail')}}</label>
                        <div class="thumbnail-img-block">
                          <img src="{{ url('images/default-thumbnail.jpg')}}" id="thumbnail" class="img-fluid" alt="">
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input" type="file" name="thumbnail" class="form-control" onchange="readURL(this);" />
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-7 mb-4">
                        <label>{{__('Posters')}}</label>
                        <div class="poster-img-block">
                          <img src="{{ url('images/default-poster.jpg')}}" id="poster" class="img-fluid" alt="">
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input_one" type="file" name="poster" class="form-control" onchange="readURL(this);" />
                        </div>
                      </div>
                      <!-- <div class="col-md-6">
                        <div class="form-group text-dark{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                          {!! Form::label('thumbnail', __('Thumbnail')) !!} - <p class="info">{{__('Help Block Text')}}</p>
                          {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
                          <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Thumbnail')}}">
                            <span class="js-fileName">{{__('Choose A File')}}</span>
                          </label>
                          <p class="info">{{__('Choose Custom Thumbnail')}}</p>
                          <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group text-dark{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
                          {!! Form::label('poster', __('Poster')) !!} - <p class="info">{{__('Help Block Text')}}</p>
                          {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
                          <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Poster')}}">
                            <span class="js-fileName">{{__('Choose A File')}}</span>
                          </label>
                          <p class="info">{{__('Choose Custom Poster')}}</p>
                          <small class="text-danger">{{ $errors->first('poster') }}</small>
                        </div>
                      </div> -->
                    </div>
                  {{-- </form> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group ">
                <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
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
    <!-- Add Language Modal -->
<div id="AddLangModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('Add Language')}}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      {!! Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']) !!}
      <div class="modal-body">
        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
          {!! Form::label('language', __('Language')) !!}
          {!! Form::text('language', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('language') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
          <button type="submit" class="btn btn-primary-rgba">{{__('Create')}}</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Add Genre Modal -->
<div id="AddGenreModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('Add Genre')}}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      {!! Form::open(['method' => 'POST', 'action' => 'GenreController@store']) !!}
      <div class="modal-body admin-form-block">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name',__('Name')) !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"> {{__('Reset')}}</button>
          <button type="submit" class="btn btn-primary-rgba"> {{__('Create')}}</button>
        </div>
      </div>
      <div class="clear-both"></div>
      {!! Form::close() !!}
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
      if (selecturl == 'audiourl') {
    $('#ifbox').show();
    $('#uploadaudio').hide();

  }else if (selecturl == 'upload_audio') {
   $('#uploadaudio').show();
   $('#ifbox').hide();

 }

});
 

  $('input[name="is_protect"]').click(function(){
    if($(this).prop("checked") == true){
      $('.is_protect').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.is_protect').fadeOut();
    }
  });
});
</script>


<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
  $(".midia-toggle-upload_audio").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp3'
        },
    directory_name: 'audio'
	});
</script>  
@endsection