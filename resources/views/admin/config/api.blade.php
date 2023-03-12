@extends('layouts.master')
@section('title', __('API Settings'))
@section('breadcum')
<div class="breadcrumbbar">
          <h4 class="page-title">{{ __('API Settings') }}</h4>
          <div class="breadcrumb-list">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('API Settings') }}</li>
              </ol>
          </div>
</div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{__('API Settings')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($env_files, ['method' => 'POST', 'action' => 'ConfigController@changeEnvKeys']) !!}
<div class="row">

<!-- ======= YOU TUBE API start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
    <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('You Tube API')}}</h4></div>
        <div class="row mx-2 my-4">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('YOUTUBE_API_KEY') ? ' has-error' : '' }}">
                    {!! Form::label('YOUTUBE_API_KEY', __('YouTubeAPIKEY')) !!}
                    {!! Form::text('YOUTUBE_API_KEY',null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('YOUTUBE_API_KEY') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======= YOU TUBE API end ========== -->

<!-- ======= Vimeo Api API start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('Vimeo API')}}</h4></div>
          <div class="row mx-2 my-4">
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('VIMEO_ACCESS') ? ' has-error' : '' }}">
                    {!! Form::label('VIMEO_ACCESS', __('Vimeo APIKEY')) !!}
                    {!! Form::text('VIMEO_ACCESS',null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('VIMEO_ACCESS') }}</small>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- ======= Vimeo Api end ========== -->

<!-- ======= Vimeo Api API start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('Captcha Credentials')}}<a target="__blank" title="Get your keys from here" class=" pull-right text-info" href="https://www.google.com/recaptcha/admin/create"><i class="fa fa-key"></i> {{__('Get Your reCAPTCHA v2 Keys From Here')}}</a></h4></div>
            <div class="payment-gateway-block">
                <div class="form-group">
                    <div class="row mx-2 my-4">
                        <div class="col-md-10">
                            {!! Form::label('captcha', __('GOOGLE CAPTCHA')) !!}
                        </div>
                        <div class="col-md-2">
                            <label class="switch">
                                {!! Form::checkbox('captcha', 1, $config->captcha, ['class' => 'custom_toggle']) !!}
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 my-4" style="{{ $config->captcha==1 ? "" : "display: none" }}" id="captcha_box">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('NOCAPTCHA_SITEKEY') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('CAPTCHA SITEKEY') }}</label>
                            {!! Form::text('NOCAPTCHA_SITEKEY', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('NOCAPTCHA_SITEKEY') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('NOCAPTCHA_SECRET') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('CAPTCHA SECRET KEY') }}</label>
                            <input class ="form-control" type="text" name="NOCAPTCHA_SECRET" id="captcha-password-field" @if(isset( $env_files['NOCAPTCHA_SECRET'])) value="{{ $env_files['NOCAPTCHA_SECRET'] }}" @endif>
                            <small class="text-danger">{{ $errors->first('NOCAPTCHA_SECRET') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ======= Vimeo Api end ========== -->

<!-- ======= PAYEMNT GATEWAYS  start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-primary ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAYEMNT GATEWAYS')}}</h4></div>
  </div>
</div>
<!-- ======= PAYEMNT GATEWAYS end ========== -->

<!-- ======= STRIPE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('STRIPE PAYMENT')}}</h4></div>
            <div class="payment-gateway-block">
                <div class="form-group">
                    <div class="row mx-2 my-4">
                        <div class="col-md-10">
                            {!! Form::label('stripe_payment', __('STRIPE PAYMENT')) !!}
                        </div>
                        <div class="col-md-2">
                            <label class="switch">
                                {!! Form::checkbox('stripe_payment', 1, $config->stripe_payment, ['class' => 'custom_toggle']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 my-4" style="{{ $config->stripe_payment==1 ? "" : "display: none" }}" id="stripe_box">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('STRIPE_KEY') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('STRIPE KEY') }}</label>
                            {!! Form::text('STRIPE_KEY', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('STRIPE_KEY') }}</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('STRIPE_SECRET') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('STRIPE SECRET KEY') }}</label>
                            <input class ="form-control" type="text" name="STRIPE_SECRET" id="captcha-password-field" value= "{{ $env_files['STRIPE_SECRET'] }}">
                            <small class="text-danger">{{ $errors->first('STRIPE_SECRET') }}</small>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<!-- ======= STRIPE PAYMENT end ========== -->

<!-- ======= PAYPAL PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAYPAL PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('paypal_payment', __('PAYPAL PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('paypal_payment', 1, $config->paypal_payment, ['class' => 'custom_toggle']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->paypal_payment==1 ? "" : "display: none" }}" id="paypal_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('PAYPAL_CLIENT_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('PAYPAL CLIENTID') }}</label>
                          <input type="text" name="PAYPAL_CLIENT_ID" value="{{ $env_files['PAYPAL_CLIENT_ID'] }}" id="pclientid" class="form-control">
                          <small class="text-danger">{{ $errors->first('PAYPAL_CLIENT_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('PAYPAL_SECRET_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('PAYPAL SECRETID') }}</label>
                          <input type="text" name="PAYPAL_SECRET_ID" value="{{ $env_files['PAYPAL_SECRET_ID'] }}" id="paypal_secret" class="form-control">
                          <small class="text-danger">{{ $errors->first('PAYPAL_SECRET_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('PAYPAL_MODE') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('PAYPAL MODE') }}</label>
                        {!! Form::text('PAYPAL_MODE', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('PAYPAL_SECRET_ID') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= STRIPE PAYMENT end ========== -->

<!-- ======= RAZORPAY PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('RAZORPAY PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                          {!! Form::label('razorpay_payment', __('RAZORPAY PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                              {!! Form::checkbox('razorpay_payment', 1, $config->razorpay_payment, ['class' => 'custom_toggle']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->razorpay_payment==1 ? "" : "display: none" }}" id="razorpay_box">
                  <div class="col-md-6">
                      <div class="form-group{{ $errors->has('STRIPE_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('RAZOR PAYKEY') }}</label>
                          {!! Form::text('RAZOR_PAY_KEY', null , ['class' => 'form-control']) !!}
                          <small class="text-danger">{{ $errors->first('RAZOR_PAY_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="search form-group{{ $errors->has('RAZOR_PAY_SECRET') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('RAZOR PAY SECRET KEY') }}</label>
                          <input type="text" id="razorpay_secret" name="RAZOR_PAY_SECRET" value="{{ $env_files['RAZOR_PAY_SECRET'] }}" class="form-control" >
                          <small class="text-danger">{{ $errors->first('RAZOR_PAY_SECRET') }}</small>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= RAZORPAY PAYMENT end ========== -->

<!-- ======= PAYU PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAYU PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                          {!! Form::label('payu_payment', __('PAYU PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                              {!! Form::checkbox('payu_payment', 1, $config->payu_payment, ['class' => 'custom_toggle']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->payu_payment==1 ? "" : "display: none" }}" id="payu_box">
                  <div class="col-md-6">
                      <div class="form-group{{ $errors->has('PAYU_METHOD') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('PAYU METHOD') }}</label>
                          {!! Form::text('PAYU_METHOD', null, ['class' => 'form-control']) !!}
                          <small class="text-danger">{{ $errors->first('PAYU_METHOD') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('PAYU_DEFAULT') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('PAYU DEFAULT OPTION') }}</label>
                        {!! Form::text('PAYU_DEFAULT', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('PAYU_DEFAULT') }}</small>
                    </div>
                </div>

                  <div class="col-md-6">
                      <div class="search form-group{{ $errors->has('PAYU_MERCHANT_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('PAYU MERCHANT KEY') }}</label>
                          <input class ="form-control" type="text" name="PAYU_MERCHANT_KEY"  value= "{{ $env_files['PAYU_MERCHANT_KEY'] }}">
                          <small class="text-danger">{{ $errors->first('PAYU_MERCHANT_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="search form-group{{ $errors->has('PAYU_MERCHANT_SALT') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('PAYU MERCHANT SALT') }}</label>
                        <input class ="form-control" type="text" name="PAYU_MERCHANT_SALT"  value= "{{ $env_files['PAYU_MERCHANT_SALT'] }}">
                        <small class="text-danger">{{ $errors->first('PAYU_MERCHANT_SALT') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= PAYU PAYMENT end ========== -->

<!-- ======= BRAIN TREE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('BRAIN TREE PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('braintree', __('BRAIN TREE PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('braintree', 1, $config->braintree, ['class' => 'custom_toggle','id' => 'braintree_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->braintree == 1 ? "" : "display: none" }}" id="braintree_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('BTREE_ENVIRONMENT') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('BTREE ENVIRONMENT') }}</label>
                          <input type="text" name="BTREE_ENVIRONMENT" value="{{ $env_files['BTREE_ENVIRONMENT'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('BTREE_ENVIRONMENT') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('BTREE_MERCHANT_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('BTREE MERCHANTID') }}</label>
                          <input type="text" name="BTREE_MERCHANT_ID" value="{{ $env_files['BTREE_MERCHANT_ID'] }}" class="form-control">
                          <small class="text-danger">{{ $errors->first('BTREE_MERCHANT_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('BTREE_MERCHANT_ACCOUNT_ID') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('BTREE MERCHANT ACCOUNT ID') }}</label>
                        <input type="text" name="BTREE_MERCHANT_ACCOUNT_ID" value="{{ $env_files['BTREE_MERCHANT_ACCOUNT_ID'] }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('BTREE_MERCHANT_ACCOUNT_ID') }}</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('BTREE_PUBLIC_KEY') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('BTREE PUBLIC KEY') }}</label>
                        <input type="text" name="BTREE_PUBLIC_KEY" value="{{ $env_files['BTREE_PUBLIC_KEY'] }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('BTREE_PUBLIC_KEY') }}</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('BTREE_PRIVATE_KEY') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('BTREE PRIVATE KEY') }}</label>
                        <input type="text" name="BTREE_PRIVATE_KEY" value="{{ $env_files['BTREE_PRIVATE_KEY'] }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('BTREE_PRIVATE_KEY') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= BRAIN TREE PAYMENT end ========== -->

<!-- ======= coinpay PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('COIN PAYMENT')}}</h4><a href="https://www.coinpayments.net/">  ({{__('Coin Payment Site')}})</a></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('coinpay', __('COIN PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('coinpay', 1, $config->coinpay, ['class' => 'custom_toggle','id' => 'coinpay_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->coinpay==1 ? "" : "display: none" }}" id="coinpay_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('COINPAYMENTS_MERCHANT_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('COIN PAYMENTS MERCHANTID') }}</label>
                          <input type="text" name="COINPAYMENTS_MERCHANT_ID" value="{{ $env_files['COINPAYMENTS_MERCHANT_ID'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('COINPAYMENTS_MERCHANT_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('COINPAYMENTS_PUBLIC_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('COIN PAYMENTS PUBLIC KEY') }}</label>
                          <input type="text" name="COINPAYMENTS_PUBLIC_KEY" value="{{ $env_files['COINPAYMENTS_PUBLIC_KEY'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('COINPAYMENTS_PUBLIC_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('COINPAYMENTS_PRIVATE_KEY') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('COIN PAYMENTS PRIVATE KEY') }}</label>
                        <input type="text" name="COINPAYMENTS_PRIVATE_KEY" value="{{ $env_files['COINPAYMENTS_PRIVATE_KEY'] }}"  class="form-control">
                        <small class="text-danger">{{ $errors->first('COINPAYMENTS_PRIVATE_KEY') }}</small>
                    </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= coinpay PAYMENT end ========== -->

<!-- ======= PAY STACK PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAY STACK PAYMENT')}}</h4><h5>{{__('(Only Works on NGN Currency)')}}</h5></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('paystack', __('PAY STACK PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('paystack', 1, $config->paystack, ['class' => 'custom_toggle','id' => 'paystack_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->paystack==1 ? "" : "display: none" }}" id="paystack_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('PAYSTACK_PUBLIC_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('PAY STACK PUBLIC KEY') }}</label>
                          <input type="text" name="PAYSTACK_PUBLIC_KEY" value="{{ $env_files['PAYSTACK_PUBLIC_KEY'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('PAYSTACK_PUBLIC_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group{{ $errors->has('PAYSTACK_SECRET_KEY') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('PAY STACK SECRET KEY') }}</label>
                        <input type="text" name="PAYSTACK_SECRET_KEY" value="{{ $env_files['PAYSTACK_SECRET_KEY'] }}"  class="form-control">
                        <small class="text-danger">{{ $errors->first('PAYSTACK_SECRET_KEY') }}</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('MERCHANT_EMAIL') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('MERCHANT EMAIL') }}</label>
                        <input type="text" name="MERCHANT_EMAIL" value="{{ $env_files['MERCHANT_EMAIL'] }}"  class="form-control">
                        <small class="text-danger">{{ $errors->first('MERCHANT_EMAIL') }}</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('PAYSTACK_PAYMENT_URL') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('PAY STACK PAYMENT URL') }}</label>
                        <input type="text" name="PAYSTACK_PAYMENT_URL" value="{{ $env_files['PAYSTACK_PAYMENT_URL'] }}"  class="form-control">
                        <small class="text-danger">{{ $errors->first('PAYSTACK_PAYMENT_URL') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= PAY STACK PAYMENT end ========== -->

<!-- ======= PAYTM PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAYTM PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('paytm_payment', __('PAYTM PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('paytm_payment', 1, $config->paytm_payment, ['class' => 'custom_toggle','id' => 'paytm_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->paytm_payment==1 ? "" : "display: none" }}" id="paytm_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('PAYTM_MID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('Merchant ID') }}</label>
                          <input type="text" name="PAYTM_MID" value="{{ $env_files['PAYTM_MID'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('PAYTM_MID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('PAYTM_MERCHANT_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('MERCHANT KEY') }}</label>
                          <input type="text" name="PAYTM_MERCHANT_KEY" value="{{ $env_files['PAYTM_MERCHANT_KEY'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('PAYTM_MERCHANT_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-3">
                    <label class="text-dark">{{ __('Paytm Testing LIVE/TEST') }}</label>
                  </div>
                  <div class="col-md-9">
                      <label class="switch">
                        {!! Form::checkbox('paytm_test', 1, ($config->paytm_test == 1 ? 1 : 0), ['class' => 'custom_toggle']) !!}
                      </label>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= PAYTM PAYMENT end ========== -->

<!-- ======= INSTA MOJO PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('INSTA MOJO PAYMENT')}}</h4><h5>{{__('(Indian Currency)')}}</h5></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('instamojo_payment', __('INSTA MOJO PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('instamojo_payment', 1, $config->instamojo_payment, ['class' => 'custom_toggle', 'id'=>'instamojo_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->instamojo_payment==1 ? "" : "display: none" }}" id="instamojo_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('IM_API_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('INSTA MOJO API KEY') }}</label>
                          <input type="text" name="IM_API_KEY" value="{{ $env_files['IM_API_KEY'] }}" class="form-control">
                          <small class="text-danger">{{ $errors->first('IM_API_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('IM_AUTH_TOKEN') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('INSTA MOJO AUTH TOKEN') }}</label>
                          <input type="text" name="IM_AUTH_TOKEN" value="{{ $env_files['IM_AUTH_TOKEN'] }}"  class="form-control">
                          <small class="text-danger">{{ $errors->first('IM_AUTH_TOKEN') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('IM_URL') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('INSTA MOJO PAYMENT URL') }}</label>
                        <input type="text" name="IM_URL" value="{{ $env_files['IM_URL'] }}"  class="form-control">
                        <small class="text-danger">{{ $errors->first('IM_URL') }}</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <small class="text-danger">
                        {{__('Note')}} :- 
                        <ul>
                            <li>
                                <a target="__blank"  href="https://test.instamojo.com/api/1.1">{{__('For Testing Mode Payment Url Is')}}</a>
                            </li>
                            <li>
                                <a target="__blank"  href="https://www.instamojo.com/api/1.1/">{{__('For Live Mode Payment Url Is')}}</a>
                            </li>
                        </ul>
                    </small>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= INSTA MOJO PAYMENT end ========== -->

<!-- ======= MOLLIE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('MOLLIE PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('mollie_payment', __('MOLLIE PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('mollie_payment', 1, $config->mollie_payment, ['class' => 'custom_toggle','id' => 'mollie_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->mollie_payment==1 ? "" : "display: none" }}" id="mollie_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('MOLLIE_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('MOLLIE KEY') }}</label>
                          <input type="text" name="MOLLIE_KEY" value="{{ $env_files['MOLLIE_KEY'] }}" placeholder="{{__('Please Enter Mollie Key')}}" class="form-control">
                          <small class="text-danger">{{ $errors->first('MOLLIE_KEY') }}</small>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= MOLLIE PAYMENT end ========== -->

<!-- ======= CASHFREE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('CASHFREE PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                        {!! Form::label('cashfree_payment', __('CASHFREE PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                            {!! Form::checkbox('cashfree_payment', 1, $config->cashfree_payment, ['class' => 'custom_toggle','id' => 'cashfree_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->cashfree_payment==1 ? "" : "display: none" }}" id="cashfree_box">
                  <div class="col-md-12">
                      <div class="form-group{{ $errors->has('CASHFREE_APP_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('CASH FREE APP ID') }}</label>
                          {!! Form::text('CASHFREE_APP_ID', null, ['class' => 'form-control']) !!}
                          <small class="text-danger">{{ $errors->first('CASHFREE_APP_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="search form-group{{ $errors->has('CASHFREE_SECRET_ID') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('CASHFREE SECRETID') }}</label>
                          <input type="password" name="CASHFREE_SECRET_ID" value="{{env('CASHFREE_SECRET_ID') ? env('CASHFREE_SECRET_ID') :''}}" id="cashfree_secret" class="form-control">
                          <small class="text-danger">{{ $errors->first('CASHFREE_SECRET_ID') }}</small>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="search form-group{{ $errors->has('CASHFREE_API_END_URL') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('CASHFREE API AND URL') }}</label>
                        <input type="text" name="CASHFREE_API_END_URL" value="{{env('CASHFREE_API_END_URL') ? env('CASHFREE_API_END_URL') : ''}}" placeholder="https://test.cashfree.com" class="form-control">
                        <small class="text-danger">{{ $errors->first('CASHFREE_API_END_URL') }}</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger">
                        {{__('Note')}} :- 
                        <ul>
                            <li>
                                <a target="__blank"  href="https://test.cashfree.com">{{__('For Test Mode Use CASHFREE API END URL')}}</a>
                            </li>
                            <li>
                                <a target="__blank"  href="https://cashfree.com">{{__('For Live Mode Use CASHFREE API END URL')}}</a>
                            </li>
                        </ul>
                    </small>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= CASHFREE PAYMENT end ========== -->

<!-- ======= OMISE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('OMISE PAYMENT')}}</h4></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                          {!! Form::label('omise_payment', __('OMISE PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                              {!! Form::checkbox('omise_payment', 1, $config->omise_payment, ['class' => 'custom_toggle','id' => 'omise_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->omise_payment==1 ? "" : "display: none" }}" id="omise_box">
                  <div class="col-md-6">
                      <div class="form-group{{ $errors->has('OMISE_PUBLIC_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('OMISE PUBLIC KEY') }}</label>
                          {!! Form::text('OMISE_PUBLIC_KEY', null, ['class' => 'form-control']) !!}
                          <small class="text-danger">{{ $errors->first('OMISE_PUBLIC_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="search form-group{{ $errors->has('OMISE_SECRET_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('OMISE SECRET KEY') }}</label>
                          <input class ="form-control" type="text" id="omise_secret" name="OMISE_SECRET_KEY" value="{{ $env_files['OMISE_SECRET_KEY'] ? $env_files['OMISE_SECRET_KEY'] : '' }}" >
                          <small class="text-danger">{{ $errors->first('OMISE_SECRET_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('OMISE_API_VERSION') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('OMISE API VERSION') }}</label>
                        {!! Form::text('OMISE_API_VERSION', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('OMISE_API_VERSION') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= OMISE PAYMENT end ========== -->

<!-- ======= Flutter Rave PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
  <div class="bg-info-rgba ml-6 mr-6 mb-6">
    <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('FLUTTER RAVE PAYMENT')}}</h4><a href="https://dashboard.flutterwave.com/signup">  ({{__('Flutter Rave Site')}})</a></div>
          <div class="payment-gateway-block">
              <div class="form-group">
                  <div class="row mx-2 my-4">
                      <div class="col-md-10">
                          {!! Form::label('flutterrave', __('FLUTTER RAVE PAYMENT')) !!}
                      </div>
                      <div class="col-md-2">
                          <label class="switch">
                              {!! Form::checkbox('flutterrave_payment', 1, $config->flutterrave_payment, ['class' => 'custom_toggle','id' => 'flutter_check']) !!}
                          </label>
                      </div>
                  </div>
              </div>
              <div class="row mx-2 my-4" style="{{ $config->flutterrave_payment==1 ? "" : "display: none" }}" id="flutterave_box">
                  <div class="col-md-6">
                      <div class="form-group{{ $errors->has('RAVE_PUBLIC_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('RAVE PUBLIC KEY') }}</label>
                          <input type="text" name="RAVE_PUBLIC_KEY" value="{{ $env_files['RAVE_PUBLIC_KEY'] ? $env_files['RAVE_PUBLIC_KEY'] : '' }}" class="form-control">
                          <small class="text-danger">{{ $errors->first('RAVE_PUBLIC_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="search form-group{{ $errors->has('RAVE_SECRET_KEY') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('RAVE SECRET KEY') }}</label>
                          <input type="text" name="RAVE_SECRET_KEY" value="{{ $env_files['RAVE_SECRET_KEY'] ? $env_files['RAVE_SECRET_KEY'] :'' }}" class="form-control">
                          <small class="text-danger">{{ $errors->first('RAVE_SECRET_KEY') }}</small>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="search form-group{{ $errors->has('RAVE_COUNTRY') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('Country Code') }}</label>
                        <input type="text" name="RAVE_COUNTRY" value="{{ $env_files['RAVE_COUNTRY'] ? $env_files['RAVE_COUNTRY'] : '' }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('RAVE_COUNTRY') }}</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="search form-group{{ $errors->has('RAVE_LOGO') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('RAVE LOGO') }}</label>
                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter rave logo"></i>
                        <label>{{ __('Enter Full URL to Image') }}</label>
                        <input type="text" name="RAVE_LOGO" value="{{ $env_files['RAVE_LOGO'] ? $env_files['RAVE_LOGO'] : '' }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('RAVE_LOGO') }}</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="search form-group{{ $errors->has('RAVE_PREFIX') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('RAVE PREFIX') }}</label>
                        <input type="text" name="RAVE_PREFIX" value="{{ $env_files['RAVE_PREFIX'] ? $env_files['RAVE_PREFIX'] : '' }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('RAVE_PREFIX') }}</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="search form-group{{ $errors->has('RAVE_SECRET_HASH') ? ' has-error' : '' }}">
                        <label class="text-dark">{{ __('RAVE SECRET HASH') }}</label>
                        <input type="text" name="RAVE_SECRET_HASH" value="{{ $env_files['RAVE_SECRET_HASH'] ? $env_files['RAVE_SECRET_HASH'] : '' }}" class="form-control">
                        <small class="text-danger">{{ $errors->first('RAVE_SECRET_HASH') }}</small>
                    </div>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
<!-- ======= Flutter Rave PAYMENT end ========== -->

<!-- ======= PAYHERE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('PAYHERE PAYMENT')}}</h4></div>
            <div class="payment-gateway-block">
                <div class="form-group">
                    <div class="row mx-2 my-4">
                        <div class="col-md-10">
                          {!! Form::label('payhere', __('PAYHERE PAYMENT')) !!}
                        </div>
                        <div class="col-md-2">
                            <label class="switch">
                              {!! Form::checkbox('payhere_payment', 1, $config->payhere_payment, ['class' => 'custom_toggle','id' => 'payhere_check']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 my-4" style="{{ $config->payhere_payment==1 ? "" : "display: none" }}" id="payhere_box">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('PAYHERE_BUISNESS_APP_CODE') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('PAYHERE BUISNESS APP CODE') }}</label>
                            <input type="text" name="PAYHERE_BUISNESS_APP_CODE" value="{{ $env_files['PAYHERE_BUISNESS_APP_CODE'] }}" class="form-control">
                            <small class="text-danger">{{ $errors->first('PAYHERE_BUISNESS_APP_CODE') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-12">
                        <div class="search form-group{{ $errors->has('PAYHERE_APP_SECRET') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('PAYHERE APP SECRET KEY') }}</label>
                            <input type="text" name="PAYHERE_APP_SECRET" value="{{ $env_files['PAYHERE_APP_SECRET'] }}" class="form-control">
                            <small class="text-danger">{{ $errors->first('PAYHERE_APP_SECRET') }}</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="search form-group{{ $errors->has('PAYHERE_MERCHANT_ID') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('PAYHERE MERCHANT ID') }}</label>
                            <input type="text" name="PAYHERE_MERCHANT_ID" value="{{ $env_files['PAYHERE_MERCHANT_ID'] }}" class="form-control">
                            <small class="text-danger">{{ $errors->first('PAYHERE_MERCHANT_ID') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-3">
                      <label class="text-dark">{{ __('Payhere Payment Enviourment LIVE/SANDBOX') }}</label>
                    </div>
                    <div class="col-md-9">
                        <label class="switch">
                            {!! Form::checkbox('PAYHERE_MODE', 1, ($env_files['PAYHERE_MODE'] == 'live' ? 1 : 0), ['class' => 'custom_toggle']) !!}
                        </label>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  <!-- ======= PAYHERE PAYMENT end ========== -->

  <!-- ======= BANK DETAILS PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('BANK DETAILS')}}</h4></div>
            <div class="payment-gateway-block">
                <div class="form-group">
                    <div class="row mx-2 my-4">
                        <div class="col-md-10">
                            {!! Form::label('bankdetails', __('BANK DETAILS')) !!}
                        </div>
                        <div class="col-md-2">
                            <label class="switch">
                                {!! Form::checkbox('bankdetails', 1, $config->bankdetails, ['class' => 'custom_toggle']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 my-4" style="{{ $config->bankdetails==1 ? "" : "display: none" }}" id="bank_box">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('ACCOUNT NUMBER') }}</label>
                            <input id="payum" type="text" class="form-control" value="{{$config->account_no}}" name="account_no">
                            <small class="text-danger">{{ $errors->first('account_no') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('ACCOUNT NAME') }}</label>
                          <input id="payum" type="text" class="form-control" value="{{$config->account_name}}" name="account_name">
                          <small class="text-danger">{{ $errors->first('account_name') }}</small>
                      </div>
                  </div>
  
                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('ifsc_code') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('IFSC CODE') }}</label>
                            <input id="payum" type="text" class="form-control" value="{{$config->ifsc_code}}" name="ifsc_code">
                            <small class="text-danger">{{ $errors->first('ifsc_code') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-6">
                      <div class="search form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('BANK NAME') }}</label>
                          <input type="text" name="bank_name" value="{{$config->bank_name}}" id="payusalt" class="form-control">
                          <small class="text-danger">{{ $errors->first('bank_name') }}</small>
                      </div>
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
  <!-- ======= BANK DETAILS PAYMENT end ========== -->

  <!-- ======= AWS STORAGE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
        <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('AWS STORAGE DETAILS')}}</h4></div>
            <div class="payment-gateway-block">
                <div class="form-group">
                    <div class="row mx-2 my-4">
                        <div class="col-md-10">
                            {!! Form::label('aws', __('AWS STORAGE DETAILS')) !!}
                        </div>
                        <div class="col-md-2">
                            <label class="switch">
                                {!! Form::checkbox('aws', 1, $config->aws, ['class' => 'custom_toggle']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 my-4" style="{{ $config->aws==1 ? "" : "display: none" }}" id="aws_box">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('AWS ACCESS KEY') }}</label>
                            <input id="payum" type="text" class="form-control" value="{{isset($env_files['key']) ? $env_files['key'] : '' }}" name="key">
                            <small class="text-danger">{{ $errors->first('key') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('secret') ? ' has-error' : '' }}">
                          <label class="text-dark">{{ __('AWS SECRET KEY') }}</label>
                          <input id="payum" type="text" class="form-control" value="{{isset($env_files['secret']) ? $env_files['secret'] :'' }}" name="secret">
                          <small class="text-danger">{{ $errors->first('secret') }}</small>
                      </div>
                  </div>
  
                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('AWS BUCKET REGION') }}</label>
                            <input id="payum" type="text" class="form-control" value="{{isset($env_files['region']) ? $env_files['region'] : '' }}" name="region">
                            <small class="text-danger">{{ $errors->first('region') }}</small>
                        </div>
                    </div>
  
                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('bucket') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('AWS BUCKET NAME') }}</label>
                            <input type="text" name="bucket" value="{{isset($env_files['bucket']) ? $env_files['bucket'] : '' }}" id="payusalt" class="form-control">
                            <small class="text-danger">{{ $errors->first('bucket') }}</small>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  <!-- ======= AWS STORAGE PAYMENT end ========== -->

  <!-- ======= OTHER APIS  start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-primary ml-6 mr-6 mb-6">
      <div class="card-header text-dark"><h4><i class="feather icon-Settings" aria-hidden="true"></i> {{__('OTHER APIS')}}</h4></div>
  </div>
</div>
<!-- =======OTHER APIS end ========== -->

<!-- ======= STRIPE PAYMENT start ========== -->
<div class="col-md-6 col-lg-6 col-xl-12">
    <div class="bg-info-rgba ml-6 mr-6 mb-6">
            <div class="payment-gateway-block">
                </div>
                <div class="row mx-2 my-4" >
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('MAILCHIMP_APIKEY') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('MAILCHIMP API KEY') }}</label>
                            <input type="text" id="mailc" value="{{ $env_files['MAILCHIMP_APIKEY'] }}" name="MAILCHIMP_APIKEY" class="form-control">
                            <small class="text-danger">{{ $errors->first('MAILCHIMP_APIKEY') }}</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('MAILCHIMP_LIST_ID') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('MAILCHIMP LIST ID') }}</label>
                            {!! Form::text('MAILCHIMP_LIST_ID', null, ['class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('MAILCHIMP_LIST_ID') }}</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="search form-group{{ $errors->has('TMDB_API_KEY') ? ' has-error' : '' }}">
                            <label class="text-dark">{{ __('TMDB API KEY') }}</label>
                            <input type="text" id="tmdb_secret" name="TMDB_API_KEY" value="{{ $env_files['TMDB_API_KEY'] }}" id="tmdb_secret" class="form-control">
                            <small class="text-danger">{{ $errors->first('TMDB_API_KEY') }}</small>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<!-- ======= STRIPE PAYMENT end ========== -->


<div class="col-md-6 col-lg-6 col-xl-12 form-group">
  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
    {{ __('Update') }}</button>
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
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  }); 

  $(".toggle-password2").click(function() {
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
  $('#stripe_payment').on('change',function(){
    if ($('#stripe_payment').is(':checked')){
         $('#stripe_box').show('fast');
      }else{
        $('#stripe_box').hide('fast');
      }
  });  

  $('#razorpay_payment').on('change',function(){
    if ($('#razorpay_payment').is(':checked')){
         $('#razorpay_box').show('fast');
      }else{
        $('#razorpay_box').hide('fast');
      }
  });   

  $('#paypal_payment').on('change',function(){
    if ($('#paypal_payment').is(':checked')){
         $('#paypal_box').show('fast');
      }else{
        $('#paypal_box').hide('fast');
      }
  });   

  $('#payu_payment').on('change',function(){
    if ($('#payu_payment').is(':checked')){
         $('#payu_box').show('fast');
      }else{
        $('#payu_box').hide('fast');
      }
  }); 

  $('#bankdetails').on('change',function(){
    if ($('#bankdetails').is(':checked')){
         $('#bank_box').show('fast');
      }else{
        $('#bank_box').hide('fast');
      }
  }); 
    

  $('#paytm_check').on('change',function(){
    if ($('#paytm_check').is(':checked')){
         $('#paytm_box').show('fast');
      }else{
        $('#paytm_box').hide('fast');
      }
  }); 

  $('#braintree_check').on('change',function(){
    if ($('#braintree_check').is(':checked')){
         $('#braintree_box').show('fast');
      }else{
        $('#braintree_box').hide('fast');
      }
  }); 
   $('#paystack_check').on('change',function(){
    if ($('#paystack_check').is(':checked')){
         $('#paystack_box').show('fast');
      }else{
        $('#paystack_box').hide('fast');
      }
  }); 

  $('#payhere_check').on('change',function(){
    if ($('#payhere_check').is(':checked')){
         $('#payhere_box').show('fast');
      }else{
        $('#payhere_box').hide('fast');
      }
  }); 

  $('#instamojo_check').on('change',function(){
    if ($('#instamojo_check').is(':checked')){
         $('#instamojo_box').show('fast');
      }else{
        $('#instamojo_box').hide('fast');
      }
  });

  $('#mollie_check').on('change',function(){
    if ($('#mollie_check').is(':checked')){
         $('#mollie_box').show('fast');
      }else{
        $('#mollie_box').hide('fast');
      }
  });

  $('#cashfree_check').on('change',function(){
    if ($('#cashfree_check').is(':checked')){
         $('#cashfree_box').show('fast');
      }else{
        $('#cashfree_box').hide('fast');
      }
  });

  $('#omise_check').on('change',function(){
    if ($('#omise_check').is(':checked')){
         $('#omise_box').show('fast');
      }else{
        $('#omise_box').hide('fast');
      }
  }); 

  $('#flutter_check').on('change',function(){
    if ($('#flutter_check').is(':checked')){
         $('#flutterave_box').show('fast');
      }else{
        $('#flutterave_box').hide('fast');
      }
  });    

 

  $('#coinpay_check').on('change',function(){
    if ($('#coinpay_check').is(':checked')){
         $('#coinpay_box').show('fast');
      }else{
        $('#coinpay_box').hide('fast');
      }
  });  

  $('#aws').on('change',function(){
    if ($('#aws').is(':checked')){
         $('#aws_box').show('fast');
      }else{
        $('#aws_box').hide('fast');
      }
  });  
  $('#captcha').on('change',function(){
    if ($('#captcha').is(':checked')){
         $('#captcha_box').show('fast');
      }else{
        $('#captcha_box').hide('fast');
      }
  });   
</script>

@endsection