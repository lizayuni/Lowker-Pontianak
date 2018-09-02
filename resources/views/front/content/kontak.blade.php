@extends('front.partials.layout')

@section('title')
Kontak
@endsection

@section('content')
<div class="page-hero page-hero-lg" style="background-image: url({{ asset('front/heroroad.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            <span class="text-theme">Kontak Kami.</span>
            <br> Anda dapat menghubungi kami melalui form dibawah ini. </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main main-elevated">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content-wrap">
          <article class="entry">
            <div class="entry-content">
              <p>Form Kontak / Pengaduan</p>
              <form action="{{ route('front.kontak-create') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-6 col-xs-12">
                    <div class="form-field">
                      <label for="ci-submit-title">Nama*</label>
                      <input type="text" id="ci-submit-title" name="nama" required readonly value="{{ Auth::user()->name }}"> </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="form-field">
                      <label for="ci-submit-location">Email*</label>
                      <input type="text" id="ci-submit-location" name="email" required readonly value="{{ Auth::user()->email }}"> </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-field">
                      <label for="ci-submit-description">Judul*</label>
                      <input type="text" name="judul" required>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-field">
                      <label for="ci-submit-description">Isi*</label>
                      <textarea id="ci-submit-description" cols="30" rows="10" name="isi" required></textarea>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-field">
                      <label for="ci-submit-description">Foto</label>
                      <input type="file" name="foto">
                    </div>
                  </div>
                </div>
                <button type="submit">Kirim</button>
              </form>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
