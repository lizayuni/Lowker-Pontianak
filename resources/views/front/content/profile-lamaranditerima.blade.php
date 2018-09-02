@extends('front.partials.layout')

@section('title')
Terima Lamaran
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
              <h1>Terima Lamaran Oleh {{ $lamaran->user->name }} / Beri Notifikasi utk proses selanjutnya</h1>
              <form action="{{ route('front.lamaranDiterimaPost', ['id' => $lowker->id, 'user_id' => $lamaran->user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Subjek</label>
                  <input type="text" name="judul" required class="form-control">
                </div>
                <div class="form-group">
                  <label>Isi</label>
                  <textarea name="isi" rows="8" cols="80" required></textarea>
                </div>
                <br>
                <input type="submit" name="submit" value="Kirim" class="btn btn-success">
              </form>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
