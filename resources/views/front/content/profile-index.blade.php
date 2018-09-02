@extends('front.partials.layout')

@section('title')
Profil Saya
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Profil {{ Auth::user()->name }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main main-elevated">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-xs-12">
        <div class="content-wrap">
          <article class="entry">
            <div class="entry-content">
              <div class="row">
                <div class="col-md-4">
                  @if($user->foto == '')
                  <img src="{{ asset('front/profile.png') }}" alt="" width="200">
                  @else
                  <img src="{{ asset('uploads/avatar') }}/{{ $user->foto }}" alt="" width="200">
                  @endif
                </div>
                <div class="col-md-8" style="margin-top:20px;">
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Nama Lengkap : {{ Auth::user()->name }}</h1>
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Alamat Email : {{ Auth::user()->email }}</h1>
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Alamat Lengkap : {{ Auth::user()->alamat }}</h1>
                  <a href="/pesan-saya" class="btn btn-success btn-sm" style="background-color:#bada55;">Pesan Saya</a>
                </div>
              </div>
              <br><hr><br>
              <div class="container">
                <div class="row">
                  <h1>Ubah Profil</h1>
                  <form class="" action="{{ route('front.ubahProfil') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="name" value="{{ Auth::user()->name }}" style="margin-bottom:10px;" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat Email</label>
                      <input type="email" name="email" value="{{ Auth::user()->email }}" style="margin-bottom:10px;" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" value="" style="margin-bottom:10px;" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" rows="8" cols="80" style="margin-bottom:10px;" required>{{ Auth::user()->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                      <label>No KTP</label>
                      <input type="text" name="no_ktp" value="{{ Auth::user()->no_ktp }}" style="margin-bottom:10px;" required>
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="text" name="no_hp" value="{{ Auth::user()->no_hp }}" style="margin-bottom:10px;" required>
                    </div>
                    <div class="form-group" style="margin-top:6px;">
                      <label>Bagian Yang Diminati</label>
                    </div>
                    <div class="row">

                      @foreach($bagians as $key=>$bagian)
                        @php
                          $check = '';
                          if (Auth::user()->interest != ''){

                            $minatexplode = explode(",", Auth::user()->interest);
                            
                            foreach($minatexplode as $minat) {
                              if($minat != '') {
                                $minatnow[] = $minat;
                              }
                            }

                            foreach($minatnow as $interest) {
                              if($interest == $bagian->bagian) {
                                $check = "checked";
                                break;
                              }
                            }

                          }
                        @endphp
                        <div class="col-md-2">
                          <div class="checkbox">
                            <label><input type="checkbox" value="{{$bagian->bagian}}," name="interest[]" {{ $check }}>{{ $bagian->bagian }}</label>
                          </div>
                        </div>
                      @endforeach
                      
                      <div class="col-md-2">
                        <div class="checkbox">
                          <label><input type="checkbox" value="semua" name="semua">Semua</label>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="avatar" value="{{ Auth::user()->avatar }}" style="margin-bottom:10px;">
                    </div>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-success pull-right" style="margin-top:10px;">
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection