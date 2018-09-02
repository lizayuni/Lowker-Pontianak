@extends('front.partials.layout')

@section('title')
Lowker Saya
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Lowongan Pekerjaan Yang Saya Tambahkan</h1>
          <br>
          <a href="{{ route('lowongan-pekerjaan.create') }}" class="btn btn-success">Tambah Lowongan Pekerjaan</a>
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
                      <div class="row" style="margin-top:10px;">
                        <div class="container">
                          <a href="{{ route('front.lamaranDiLowkerSaya', ['id' => $lowker->id]) }}" class="btn btn-success btn-sm" style="background-color:#2ecc71;">Lihat Lamaran Untuk Lowker Ini</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list-item-secondary-info">
                    @if($lowker->status == 0)
                    <p class="list-item-location"><strong>Status : Belum Diverifikasi Admin</strong></p>
                    @elseif($lowker->status == 1)
                    <p class="list-item-location"><strong>Status : Sudah Diverifikasi Admin</strong></p>
                    @else
                    <p class="list-item-location"><strong>Status : Ditolak Oleh Admin</strong></p>
                    @endif
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
