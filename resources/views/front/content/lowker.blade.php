@extends('front.partials.layout')

@section('title')
Lowker
@endsection

@section('content')
<div class="page-hero page-hero-lg" style="background-image: url({{ asset('front/heroworker.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            <span class="text-theme">Sedang Mencari Pekerjaan ?</span> Cari Pekerjaan Impianmu Disini
          </h2>
          <p class="page-subtitle">
            <span class="text-theme">{{ $jlhlowker }}</span> lowongan pekerjaan tersedia untukmu.
            <br>
            <br>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="section-title-wrap">
          <h3 class="section-title">
            <b>{{ $jlhlowker }}</b> Lowongan Pekerjaan Yang Cocok Untuk Anda Telah Ditemukan</h3>
          <span class="section-title-compliment">
            <a href="#" class="sidebar-wrap-trigger">
              <i class="fa fa-navicon"></i> Filters </a>
          </span>
        </div>
        <h3 class="section-title">
          Pastikan Anda Telah Mengisi Data Profil Dengan Lengkap
          <a href="/profil">Ubah Profil</a>
        </h3>
        <div class="item-listing">
        <div class="infinite-scroll">
          @foreach($lowkers as $lowker)
            @php
            $tipepekerjaan = App\TipePekerjaan::where('id', $lowker->tipepekerjaan_id)->first()->nama;
            $namauser = App\User::where('id', $lowker->user_id)->first()->name;
            @endphp
          <div class="list-item">
            <div class="list-item-main-info">
              <p class="list-item-title">
                <a href="{{ route('lowongan-pekerjaan.show', ['id' => $lowker->id]) }}">{{ $lowker->judul }}</a>
              </p>
              <div class="list-item-meta">
                <a href="" class="list-item-tag item-badge">Jenis Pekerjaan : {{ $tipepekerjaan }}</a>
                <a href="" class="list-item-tag item-badge">Nama Perusahaan : {{ $lowker->namaperusahaan }}</a>
                <a href="" class="list-item-tag item-badge">Bagian : {{ $lowker->bagian }}</a>
              </div>
            </div>
            <div class="list-item-secondary-info">
              <p class="list-item-location">{{ $lowker->alamatperusahaan }}</p>
              <p class="list-item-location">Dipost oleh {{ $namauser }} pada {{ date('d-m-Y', strtotime($lowker->created_at))}}</p>
            </div>
          </div>
          @endforeach

        </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-xs-12">
        <div class="sidebar-wrap sidebar-fixed-default">
          <div class="sidebar-wrap-header">
            <a href="#" class="sidebar-wrap-dismiss">&times;</a>
          </div>
          <div class="sidebar">
            <div class="widget widget_ci-filters-widget">
              <h3 class="widget-title">Tipe Pekerjaan</h3>
              <ul class="item-filters-array">
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/1/tipe-pekerjaan">
                  <label class="checkbox-filter-label" for="filter-1">
                    <span class="item-filter-tag item-filter-tag-badge"> Magang
                      <span class="item-filter-tag-bg" style="background-color: #0072bc;"></span>
                    </span>
                  </label>
                  </a>
                </li>
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/2/tipe-pekerjaan">
                  <label class="checkbox-filter-label" for="filter-2">
                    <span class="item-filter-tag item-filter-tag-badge"> Freelance
                      <span class="item-filter-tag-bg" style="background-color: #f26c4f;"></span>
                    </span>
                  </label>
                  </a>
                </li>
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/3/tipe-pekerjaan">
                  <label class="checkbox-filter-label" for="filter-3">
                    <span class="item-filter-tag item-filter-tag-badge"> Kontrak
                      <span class="item-filter-tag-bg" style="background-color: #ed145b;"></span>
                    </span>
                  </label>
                  </a>
                </li>
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/4/tipe-pekerjaan">
                  <label class="checkbox-filter-label" for="filter-4">
                    <span class="item-filter-tag item-filter-tag-badge"> Tetap
                      <span class="item-filter-tag-bg" style="background-color: #1cbbb4;"></span>
                    </span>
                  </label>
                  </a>
                </li>
              </ul>
            </div>
            <div class="widget widget_ci-filters-widget">
              <h3 class="widget-title">Tipe Berkas</h3>
              <ul class="item-filters-array">
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/2/tipe-berkas">
                  <label class="checkbox-filter-label" for="filter-11">
                    <span class="item-filter-tag">Offline ( Lamaran Bentuk Fisik )</span>
                  </label>
                  </a>
                </li>
                <li class="item-filter">
                  <a href="/lowongan-pekerjaan/filter/1/tipe-berkas">
                  <label class="checkbox-filter-label" for="filter-11">
                    <span class="item-filter-tag">Online ( Lamaran Bentuk File )</span>
                  </label>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div class="mobile-triggers">
  <a href="#" class="mobile-trigger form-filter-trigger">
    <i class="fa fa-search"></i> Search </a>
  <a href="#" class="mobile-trigger sidebar-wrap-trigger">
    <i class="fa fa-navicon"></i> Filters </a>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,

            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endsection
