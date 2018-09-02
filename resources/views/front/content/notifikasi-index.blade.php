@extends('front.partials.layout')

@section('title')
Notifikasi
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Notifikasi / Pemberitahuan</h1>
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
                @foreach($notifikasis as $notifikasi)
                @if($notifikasi->lowker_id == '')
                  @php
                    $user = App\User::where('id', $notifikasi->sender_id)->first();
                  @endphp
                @else
                  @php
                  $user = App\User::where('id', $notifikasi->sender_id)->first();
                  $lowker = App\Lowker::where('id', $notifikasi->lowker_id)->first();
                  @endphp
                @endif
                <div class="list-item">
                  <div class="list-item-main-info">
                    <div class="col-md-3">
                      @if($user->foto == '')
                      <img src="{{ asset('front/profile.png') }}" width="300">
                      @else
                      <img src="{{ asset('uploads/avatar') }}/{{ $user->foto }}" width="300">
                      @endif
                    </div>
                    <div class="col-md-9">
                      <h4 style="margin:0; padding:0;">{{ $notifikasi->judul }}</h4>
                      <p style="margin:0; padding:0;">{{ $notifikasi->isi }}</p>
                      <br>
                      @if($notifikasi->lowker_id == '')
                      <p style="margin:0; padding:0;">- <a href="{{ route('profil.show', ['id' => $user->id]) }}">{{ $user->name }}</a></p>
                      @else
                        @if($notifikasi->judul == "Lowongan Pekerjaan Baru Yang Cocok Untuk Kamu")
                        <p style="margin:0; padding:0;">- <a href="{{ route('profil.show', ['id' => $user->id]) }}">{{ $user->name }}</a> - <a href="{{ route('lowongan-pekerjaan.show', ['id' => $notifikasi->lowker_id]) }}">Cek Lowongan Pekerjaan Tersebut</a></p>
                        @elseif($notifikasi->judul == "Lamaran Baru")
                        <p style="margin:0; padding:0;">- <a href="{{ route('profil.show', ['id' => $user->id]) }}">{{ $user->name }}</a> - <a href="{{ route('front.lamaranDiLowkerSaya', ['id' => $notifikasi->lowker_id]) }}">Cek Lamaran</a></p>
                        @else
                        <p style="margin:0; padding:0;">- <a href="{{ route('profil.show', ['id' => $user->id]) }}">{{ $user->name }}</a> - <a href="{{ route('lowongan-pekerjaan.show', ['id' => $notifikasi->lowker_id]) }}">Lihat Lowongan Pekerjaan</a></p>
                        @endif
                      @endif
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
