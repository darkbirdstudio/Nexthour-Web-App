<!DOCTYPE html>
<html lang="en" @if(selected_lang()->rtl == 1) dir="rtl" @endif>
<head>
  <title>{{$w_title}}</title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="Description" content="{{$description}}" />
  <meta name="keyword" content="{{$w_title}}, {{$keyword}}">
  <meta name="MobileOptimized" content="320" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/icon" href="{{asset('images/favicon/favicon.png')}}"> <!-- favicon-icon -->
  <!-- theme style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> <!-- google font -->
  @if(selected_lang()->rtl == 0)
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
  @else
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
    <link href="{{url('css/bootstrap.rtl.min.css')}}" rel="stylesheet" type="text/css"/><!-- bootstrap rtl css -->
  @endif
  <link href="{{url('css/video_v6-js.css')}}" rel="stylesheet"> <!-- videojs css -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/> <!-- fontawsome css -->
    @php
if(Schema::hasTable('color_schemes')){
  $color = App\ColorScheme::first();
}
@endphp
@if(isset($color))
@if($color->color_scheme == 'dark')

  <style type="text/css">
      @keyframes scroll {
      0% {
        background-position: 0 0;
      }
      50% {
        background-position: 0 100%;
      }
      100% {
        background-position: 0 0;
      }
    }
   :root {
   
    --body_bg_color: #111;
    --btn-prime_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
    --footer_bg_color: {{$color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color }};
    --background_black_bg_color: #111;
    --background_white_bg_color: #FFF;
    --background_dark-black_bg_color: #000;
    --back2top_bg_color: #DDD;
    --bg-success_bg_color: #198754;
    --blue_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
    --light-blue_bg_color: #90DFFE;
    --watchhistory_remove_bg_color: #D9534F;
    --btn-default_bg_color: #515151;

    --blue_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
    --light-grey_border_color: #B1B1B1;
    --btn-prime_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
    --see-more_border_color: #B1B1B1;
    --btn-default_border_color: #515151;

    --text_blue_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
    --text_black_color: #111;
    --text_light_grey_color: #B1B1B1;
    --text_light_blue_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
    --text_grey_color: #949494;
    --text_white_color: #FFF;

    /*add more */
    --navigation_bg_color: {{$color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color}};
    --back2top_bg_color_on_hover:  {{$color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover}};
    --back2top_color_on_hover: {{$color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover}};
    
    }
  </style>
@else
  <style type="text/css">
   :root {
 
      --body_bg_color: #111;
      --btn-prime_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
      --footer_bg_color: {{$color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color }};
      --background_black_bg_color: #111;
      --background_white_bg_color: #FFF;
      --background_dark-black_bg_color: #000;
      --back2top_bg_color: #DDD;
      --bg-success_bg_color: #198754;
      --blue_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
      --light-blue_bg_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
      --watchhistory_remove_bg_color: #D9534F;
      --btn-default_bg_color: #515151;

      --blue_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
      --light-grey_border_color: #B1B1B1;
      --btn-prime_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
      --see-more_border_color: #B1B1B1;
      --btn-default_border_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};

      --text_blue_color:{{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
      --text_black_color: #111;
      --text_light_grey_color: #B1B1B1;
      --text_light_blue_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
      --text_grey_color: #949494;
      --text_white_color: #FFF;

      --white: #FFF;

      --navigation_bg_color: {{$color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color}};
      --back2top_bg_color_on_hover:  {{$color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover}};
      --back2top_color_on_hover: {{$color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover}};
    }

  
  </style>
@endif
@if($color->color_scheme == 'light')
  @if(selected_lang()->rtl == 0)
    <link href="{{url('css/style-light.css')}}" rel="stylesheet" type="text/css"/> 
  @else
    <link href="{{url('css/style-light-rtl.css')}}" rel="stylesheet" type="text/css"/>
  @endif
@else
  @if(selected_lang()->rtl == 0)
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css"/>
  @else
    <link href="{{url('css/style-rtl.css')}}" rel="stylesheet" type="text/css"/>
  @endif
@endif
@endif
 
  <link href="{{asset('css/custom-style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="bg-black"  >
  <div class="signup__container container sign-in-main-block" >
    <div class="row">
      <div class="col-sm-6 col-md-offset-2 col-md-4 pad-0">
        <div class="container__child signup__thumbnail" style="background-image: url({{ asset('images/login/'.$auth_customize->image) }});animation: scroll 30s ease-in-out infinite;">
          <div class="thumbnail__logo">
            @if($logo != null)
              <a href="{{url('/')}}" title="{{$w_title}}"><img src="{{asset('images/logo/'.$logo)}}" class="img-responsive" alt="{{$w_title}}"></a>
            @endif
          </div>
          <div class="thumbnail__content text-center">
            {!! $auth_customize->detail !!}
          </div>          
          <div class="signup__overlay"></div>
        </div>
         <div class="signup-thumbnail">
          @if($logo != null)
              <a href="{{url('/')}}" title="{{$w_title}}"><img src="{{asset('images/logo/'.$logo)}}" class="img-responsive" alt="{{$w_title}}"></a>
            @endif  
        </div>
      </div>
      <div class="col-sm-6 col-md-4 pad-0">
        <div class="container__child signup__form">
          @if(Session::has('success'))
            
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>

           @endif
            @if(Session::has('deleted'))
            
            <div class="alert alert-danger">
              {{Session::get('deleted')}}
            </div>

           @endif
          <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">{{__('Email')}}</label>
              <input id="email" type="text" class="form-control" name="email" placeholder="{{__('Enter Your Email')}}" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password">{{__('Password')}}</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="{{__('Enter Your Password')}}" value="{{ old('password') }}">
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="remember form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
             <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{__('Remember Me')}}</label>
            </div>
            <div class="m-t-lg">
              <input class="btn btn--form btn--form-login" type="submit" value={{__('login')}} />
             
              <div class="social-login">
                @if($configs->fb_login==1)
                <a href="{{ url('/auth/facebook') }}" class="btn btn--form btn--form-login fb-btn" title="{{__('Login With Facebook')}}"><i class="fa fa-facebook-f"></i>{{__('Login With Facebook')}}</a>
                @endif
                  @if($configs->google_login==1)
                <a href="{{ url('/auth/google') }}" class="btn btn--form btn--form-login gplus-btn" title="{{__('Login With Google')}}"><i class="fa fa-google"></i> {{__('Login With Google')}}</a>
                @endif
                 @if($configs->amazon_login==1)
                <a href="{{ url('/auth/amazon') }}" class="btn btn--form btn--form-login amazon-btn" title="{{__('Login With Amazon')}}"><i class="fa fa-amazon"></i> {{__('Login With Amazon')}}</a>
                @endif
                  @if($configs->gitlab_login==1)
                 <a style="background: linear-gradient(270deg, #48367d 0%, #241842 100%);" href="{{ url('/auth/gitlab') }}" class="btn btn--form btn--form-login" title="{{__('Login With Gitlab')}}"><i class="fa fa-gitlab"></i> {{__('Login With Gitlab')}}</a>
                 @endif
              </div>
              <a class="signup__link pull-left" href="{{ route('password.request') }}">{{__('Forget Your Password')}}</a>
              <a class="signup__link pull-right" href="{{url('register')}}">{{__('Not a Member? Register Here')}}</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> <!-- bootstrap js -->
  <script type="text/javascript" src="{{asset('js/jquery.popover.js')}}"></script> <!-- bootstrap popover js -->
  <script type="text/javascript" src="{{asset('js/jquery.curtail.min.js')}}"></script> <!-- menumaker js -->
  <script type="text/javascript" src="{{asset('js/jquery.scrollSpeed.js')}}"></script> <!-- owl carousel js -->
  <script type="text/javascript" src="{{asset('js/custom-js.js')}}"></script>
</body>
</html>
