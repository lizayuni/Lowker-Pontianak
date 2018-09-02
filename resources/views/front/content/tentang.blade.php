@extends('front.partials.layout')

@section('title')
Tentang Kami
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Tentang Kami</h1>
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
            <figure class="entry-thumb">
              <a href="#" class="ci-lightbox">
                <img src="{{ asset('front/herotentang.jpg') }}" alt=""> </a>
            </figure>
            <div class="entry-content">
              <h2>Tentang Mami Lowker</h2>
              <p>Mami Lowker adalah Website yang dikhususkan untuk berbagi informasi mengenai Lowongan Pekerjaan untuk daerah Kota Pontianak dan sekitarnya. Anda bisa melamar pekerjaan yang anda inginkan secara Online di Mami Lowker.</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
