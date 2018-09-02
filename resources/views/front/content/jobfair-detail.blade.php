@extends('front.partials.layout')

@section('title')
Job Fair Detail
@endsection

@section('content')
<div class="page-hero">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">{{ $jobfair->judul }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main main-elevated">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="content-wrap">
          <article class="entry">
            <figure class="entry-thumb">
              <a href="https://placehold.it/1280x720" class="ci-lightbox">
                <img src="{{ asset('uploads/jobfair') }}/{{ $jobfair->foto}}" width="1140"> </a>
            </figure>
            <div class="entry-content">
              <h1>{{ $jobfair->judul }}</h1>
              <p>{{ $jobfair->isi }}</p>
              <ul>
                <li>Alamat : {{ $jobfair->alamat }}</li>
                <li>HTM : Rp. {{ number_format($jobfair->htm, 0, '', '.') }}</li>
                <li>Tanggal Mulai : {{ date('d/m/Y', strtotime($jobfair->tglmulai)) }}</li>
                <li>Tanggal Selesai: {{ date('d/m/Y', strtotime($jobfair->tglselesai)) }}</li>
              </ul>
              <h5>Dipost oleh {{ $jobfair->user->name }} pada {{ date('d-m-Y', strtotime($jobfair->created_at))}}</h5>
            </div>
          </article>
        </div>
        <div class="content-wrap-footer">
          <div class="row">
            <div class="col-md-8 col-xs-12">
              <div class="entry-sharing"> Share it:
                <a href="" class="entry-share entry-share-facebook">Facebook</a>
                <a href="" class="entry-share entry-share-twitter">Twitter</a>
                <a href="" class="entry-share entry-share-google-plus">Google+</a>
                <a href="" class="entry-share entry-share-linkedin">LinkedIn</a>
                <a href="" class="entry-share entry-share-email">Email</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
