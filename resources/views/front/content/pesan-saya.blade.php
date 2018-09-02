@extends('front.partials.layout')

@section('title')
Pesan Saya
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Pesan Saya</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main main-elevated">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-xs-12">
        <div class="content-wrap">
          <article class="entry">
            <div class="entry-content">
              <div class="row">
                @foreach($pesans as $pesan)
                  @php
                  $pengirim = App\User::where('id', $pesan->sender_id)->first();
                  @endphp
                <div class="list-item">
                  <div class="list-item-main-info">
                    <p class="list-item-title">
                      <a href="">{{ $pengirim->name }}</a>
                    </p>
                    <div class="list-item-meta">
                      <a href="" class="list-item-tag item-badge">Email : {{ $pengirim->email }}</a>
                      <div class="row" style="margin-top:10px;">
                        <div class="container">
                          <a href="{{ route('pesan.index', ['id' => $pesan->sender_id]) }}" class="btn btn-success btn-sm" style="background-color:#2ecc71;">Lihat Pesan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list-item-secondary-info">
                    @if($pengirim->foto == '')
                    <img src="{{ asset('front/profile.png') }}" alt="" width="200">
                    @else
                    <img src="{{ asset('uploads/avatar') }}/{{ $pengirim->foto }}" alt="" width="200">
                    @endif
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
