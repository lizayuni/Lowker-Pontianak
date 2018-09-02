@extends('front.partials.layout')

@section('title')
Login
@endsection

@section('content')
<div class="page-hero page-hero-center" style="background-image: url({{ asset('front/heroroad.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            Halaman Login
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="email" class="col-sm-3 col-form-label text-md-right">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9" style="margin-left:50px;">
                              <div class="pull-right">
                                <a href="{{ route('password.request') }}">
                                  Lupa Password Anda ?
                                </a>
                              </div>
                              <br><br>
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection
