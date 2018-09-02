@extends('front.partials.layout')

@section('title')
Lowongan Pekerjaan Detail
@endsection

@section('content')
<div class="page-hero">
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
      <div class="col-xl-9 col-lg-8 col-xs-12">
        <div class="content-wrap">
          <article class="entry">
            <div class="entry-content">
              <h2>{{ $lowker->judul }}</h2>
              <p>{{ $lowker->isi }}</p>
              <h4>Informasi Perusahaan</h4>
              <ul>
                <li>Nama Perusahaan : {{ $lowker->namaperusahaan }}</li>
                <li>Alamat Perusahaan : {{ $lowker->alamatperusahaan }}</li>
                <li>Email Perusahaan : {{ $lowker->email_perusahaan }}</li>
                <li>Nomor Telepon Perusahaan : {{ $lowker->no_hp_perusahaan }}</li>
              </ul>
              <h4>Informasi Penerimaan</h4>
              <ul>
                <li>Bagian Yang Dicari : {{ $lowker->bagian }}</li>
                <li>Penempatan : {{ $lowker->penempatan }}</li>
                @if($lowker->tipeberkas_id == 1)
                <li>Pengiriman Berkas : Online ( Upload Berkas )</li>
                @endif
                @if($lowker->tipeberkas_id == 2)
                <li>Pengiriman Berkas : Offline ( Mengantarkan Berkas Ke Alamat Perusahaan )</li>
                @endif
              </ul>
              <h4>Berkas Yang Diperlukan</h4>
              <ul>
                @if($lowker->suratlamaran == 1)
                <li>Surat Lamaran</li>
                @endif
                @if($lowker->cv == 1)
                <li>Curriculum Vitae ( CV )</li>
                @endif
                @if($lowker->ktp == 1)
                <li>Fotocopy / Scan KTP</li>
                @endif
                @if($lowker->ijazah == 1)
                <li>Fotocopy / Scan Ijazah</li>
                @endif
                @if($lowker->transkripnilai == 1)
                <li>Fotocopy / Scan Transkrip Nilai</li>
                @endif
                @if($lowker->pasfoto == 1)
                <li>Pas Foto</li>
                @endif
                @if($lowker->skck == 1)
                <li>SKCK</li>
                @endif
                @if($lowker->suratketerangandokter == 1)
                <li>Surat Keterangan Dokter</li>
                @endif
              </ul>
            </div>
          </article>
          @if($lowker->tipeberkas_id == 1)
          <a href="{{ route('lamaran.index', ['id' => $lowker->id]) }}" class="btn btn-block btn-apply-content">Lamar Pekerjaan Ini</a>
          @else
          <a href="#" class="btn btn-block btn-apply-content" onclick="alertoffline();">Lamar Pekerjaan Ini</a>
          @endif
        </div>
        <div class="content-wrap" style="margin-top:10px;">
          <article class="entry">
            <div class="entry-content">
              <h2 style="margin-top:-60px;">Komentar dan Ulasan</h2>
              <p>Anda dapat berkomentar dan memberikan ulasan tentang lowongan pekerjaan di sini.</p>
              <form class="" action="{{ route('komentar.store', ['id' => $lowker->id]) }}" method="post">
                @csrf
                <textarea name="isi" rows="8" cols="80" required></textarea>
                <input type="submit" name="submit" value="Kirim" class="btn btn-success">
              </form>
              <div class="container">
                @foreach($komentars as $komentar)
                <div class="row">
                  @php
                  $user = App\User::where('id', $komentar->commented_id)->first();
                  @endphp
                  <div class="col-md-2">
                    <br>
                    @if($user->foto == '')
                    <img src="{{ asset('front/profile.png') }}" width="80" class="text-center img-circle">
                    @else
                    <img src="{{ asset('uploads/avatar') }}/{{ $user->foto }}" width="80" class="text-center img-circle">
                    @endif
                  </div>
                  <div class="col-md-10">
                    <h4>{{ $user->name }} ( {{ $user->email }} )</h4>
                    <p style="padding:0; margin-top:-10px; color:#333; font-size:14px;">{{ date('d-m-Y h:m:s', strtotime($komentar->created_at)) }}</p>
                    <p>{{ $komentar->comment }}</p>
                  </div>
                </div>
                <hr>
                @endforeach
              </div>
            </div>
          </article>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-xs-12">
        <div class="sidebar">
          <aside class="widget widget_ci-apply-button-widget">
            @if($lowker->tipeberkas_id == 1)
            <a href="{{ route('lamaran.index', ['id' => $lowker->id]) }}" class="btn btn-block"> Lamar Pekerjaan Ini</a>
            @else
            <a href="#" class="btn btn-block" onclick="alertoffline();"> Lamar Pekerjaan Ini</a>
            @endif
          </aside>
          <aside class="widget widget_ci-company-info-widget">
            <h3 class="widget-title">Dipost Oleh</h3>
            <div class="card-info">
              <div class="card-info-media">
                <figure class="card-info-thumb">
                  @if($lowker->user->foto == '')
                  <img src="{{ asset('front/profile.png') }}" alt="" width="66" class="img-circle"> </figure>
                  @else
                  <img src="{{ asset('uploads/avatar') }}/{{ $lowker->user->foto }}" alt="" width="66" class="img-circle"> </figure>
                  @endif
                <div class="card-info-details">
                  <a class="card-info-title" href="{{ route('profil.show', ['id' => $lowker->user_id]) }}">{{ $lowker->user->name }}</a>
                  <p class="card-info-link">
                    <a href="">{{ $lowker->user->email }}</a>
                    <a href="{{ route('pesan.index', ['id' => $lowker->user_id]) }}" class="btn btn-success btn-sm">Kirim Pesan</a>
                  </p>
                </div>
              </div>
            </div>
          </aside>
          <aside class="widget widget_ci-callout-widget">
            <div class="callout-wrapper">
              <img class="callout-thumb" src="images/logo-dark.png" alt="">
              <p>
                <strong>Ingin berbagi informasi mengenai Lowongan Pekerjaan ?</strong>
              </p>
              <p class="text-secondary">Ayo Berbagi Informasi mengenai Lowongan Pekerjaan di wilayah Pontianak
              </p>
              <a href="/lowongan-pekerjaan" class="btn btn-round btn-transparent">Tambah Lowker</a>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('custom_js')
<script type="text/javascript">
  function alertoffline() {
    swal("Kirim berkas ke alamat perusahaan!", "Tipe pengiriman berkas pada lowongan pekerjaan ini adalah offline / kirim langsung ke perusahaan, berkas berupa fisik (Hard Copy)!");
  }
</script>
@endsection
