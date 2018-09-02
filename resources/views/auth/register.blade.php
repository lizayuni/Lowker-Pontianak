@extends('front.partials.layout')

@section('title')
Daftar
@endsection

@section('content')
<div class="page-hero page-hero-center" style="background-image: url({{ asset('front/heroroad.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            Halaman Daftar
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
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Ulangi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="email" class="col-md-3 col-form-label text-md-right">No. KTP</label>

                            <div class="col-md-6">
                                <input id="no_ktp" type="number" class="form-control{{ $errors->has('no_ktp') ? ' is-invalid' : '' }}" name="no_ktp" value="{{ old('no_ktp') }}" required>

                                @if ($errors->has('no_ktp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_ktp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Nomor HP</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('no_hp') }}" required>

                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:30px; margin-left:160px;">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Alamat Lengkap</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-left: 160px;">
                            <div class="col-md-3">
                                <label>Daftar Sebagai :</label>
                            </div>
                            <div class="col-md-2">
                                <label class="radio-inline">
                                  <input type="radio" name="role" checked value="pemberi">Pemberi Lowker
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                  <input type="radio" name="role" value="pencari">Pencari Lowker
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9" style="margin-left:50px;">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Daftar
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
