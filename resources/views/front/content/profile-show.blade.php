@extends('front.partials.layout')

@section('title')
Profil
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Profil {{ $user->name }}</h1>
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
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Nama Lengkap : {{ $user->name }}</h1>
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Alamat Email : {{ $user->email }}</h1>
                  <h1 style="margin:0; padding:0; margin-bottom:10px;">Alamat Lengkap : {{ $user->alamat }}</h1>
                  <a href="#" class="btn btn-primary btn-sm" style="background-color:#3498db;">Lamaran Saya</a>
                  <a href="#" class="btn btn-success btn-sm" style="background-color:#e74c3c;">Lowongan Saya</a>
                  <a href="#" class="btn btn-info btn-sm" style="background-color:#9b59b6;">Berkas Pelamar</a>
                </div>
              </div>
            </div>
            <br><hr><br>
            <div class="row">
              @foreach($lowkers as $lowker)
              <div class="list-item">
                <div class="list-item-main-info">
                  <p class="list-item-title">
                    <a href="{{ route('lowongan-pekerjaan.show', ['id' => $lowker->id]) }}">{{ $lowker->judul }}</a>
                  </p>
                  <div class="list-item-meta">
                    <a href="" class="list-item-tag item-badge">Jenis Pekerjaan : {{ $lowker->getJenisPekerjaan() }}</a>
                    <a href="" class="list-item-tag item-badge">Nama Perusahaan : {{ $lowker->namaperusahaan }}</a>
                    <a href="" class="list-item-tag item-badge">Bagian : {{ $lowker->bagian }}</a>
                  </div>
                </div>
                <div class="list-item-secondary-info">
                  <p class="list-item-location">{{ $lowker->alamatperusahaan }}</p>
                  <p class="list-item-location">{{ date('d-m-Y', strtotime($lowker->created_at))}}</p>
                </div>
              </div>
              @endforeach
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
