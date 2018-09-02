@extends('front.partials.layout')

@section('title')
Masukkan Lamaran
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Masukkan Lamaran</h1>
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
              <form action="{{ route('lamaran.store', ['id' => $lowker->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Data Diri</h2>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" required class="form-control" readonly value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" required class="form-control" readonly value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                  <label>Nomor KTP</label>
                  <input type="text" name="text" required class="form-control" readonly value="{{ Auth::user()->no_ktp }}">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="text" required class="form-control" readonly value="{{ Auth::user()->alamat }}">
                </div>
                <h2>File Yang Diperlukan</h2>
                @if($lowker->suratlamaran == '1')
                <div class="form-group">
                  <label>Surat Lamaran</label>
                  <input type="file" name="suratlamaran" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->cv == '1')
                <div class="form-group">
                  <label>Curriculum Vitae / CV </label>
                  <input type="file" name="cv" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->ktp == '1')
                <div class="form-group">
                  <label>Foto KTP</label>
                  <input type="file" name="ktp" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->ijazah == '1')
                <div class="form-group">
                  <label>Ijazah</label>
                  <input type="file" name="ijazah" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->transkripnilai == '1')
                <div class="form-group">
                  <label>Transkrip Nilai</label>
                  <input type="file" name="transkripnilai" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->pasfoto == '1')
                <div class="form-group">
                  <label>Pas Foto</label>
                  <input type="file" name="pasfoto" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->skck == '1')
                <div class="form-group">
                  <label>SKCK</label>
                  <input type="file" name="skck" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                @if($lowker->suratketerangandokter == '1')
                <div class="form-group">
                  <label>Surat Keterangan Dokter</label>
                  <input type="file" name="suratketerangandokter" required class="form-control" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*">
                </div>
                @endif
                <br>
                <input type="submit" name="submit" value="Simpan" class="btn btn-success pull-right">
              </form>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
