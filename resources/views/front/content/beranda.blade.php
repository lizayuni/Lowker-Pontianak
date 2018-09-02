@extends('front.partials.layout')

@section('title')
Beranda
@endsection

@section('content')
<div class="page-hero page-hero-lg" style="background-image: url({{ asset('front/herolaptop.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            <span class="text-theme">Sedang Mencari Pekerjaan ?</span> Cari Pekerjaan Impianmu Disini
          </h2>
          <p class="page-subtitle">

            @auth
            <span class="text-theme">{{ $jlhlowker }}</span> lowongan pekerjaan yang cocok dengan minat anda.
            @endauth
            <br>
            <br>

            @guest
            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
            @endguest

            @auth
            <a href="{{ route('lowongan-pekerjaan.index') }}" class="btn btn-success">Lihat Semua Lowongan Pekerjaan</a>
            @endauth
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
