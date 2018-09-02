@extends('front.partials.layout')

@section('title')
Lamaran Saya
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Lowongan Pekerjaan Yang Sudah Saya Lamar</h1>
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
                @foreach($lamarans as $lamaran)
                  @php
                  $lowker = App\Lowker::find($lamaran->lowker_id);
                  @endphp
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
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
