@extends('front.partials.layout')

@section('title')
Lamaran Di Lowker Saya
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">{{ $lowker->judul }}</h1>
          <div class="page-hero-details">
            <span class="item-badge">{{ $lowker->getJenisPekerjaan() }}</span>
            <span class="entry-location">{{ $lowker->namaperusahaan }}</span>
            <span class="entry-company">{{ $lowker->alamatperusahaan }}</span>
            <span class="entry-company">{{ $lowker->bagian }}</span>
          </div>
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
                <h1>Daftar Lamaran di Lowongan Pekerjaan ini :</h1>
                <br><hr><br>
                @foreach($lamarans as $lamaran)
                <div class="list-item">
                  <div class="list-item-main-info">
                    <div class="col-md-3">
                      @if($lamaran->user->foto == '')
                      <img src="{{ asset('front/profile.png') }}" width="300">
                      @else
                      <img src="{{ asset('uploads/avatar') }}/{{ $lamaran->user->foto }}" width="300">
                      @endif
                    </div>
                    <div class="col-md-9">
                      <h4 style="margin:0; padding:0;">{{ $lamaran->user->name }}</h4>
                      <p style="margin:0; padding:0;">{{ $lamaran->user->email }}</p>
                      <p style="margin:0; padding:0;">Kirim Lamaran pada : {{ date('d-m-Y', strtotime($lamaran->created_at)) }}</p>
                      <a href="{{ route('front.lamaranDetail', ['id' => $lowker->id, 'user_id' => $lamaran->user_id]) }}" class="btn btn-success" style="margin-top:10px;">Cek Lamaran</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
