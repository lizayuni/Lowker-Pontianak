@extends('front.partials.layout')

@section('title')
Lamaran Detail
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
              <h1>Lamaran Oleh {{ $lamaran->user->name }}</h1>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Data Diri Pelamar</h2>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" required class="form-control" readonly value="{{ $lamaran->user->name }}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" required class="form-control" readonly value="{{ $lamaran->user->email }}">
                </div>
                <div class="form-group">
                  <label>Nomor HP</label>
                  <input type="text" name="text" required class="form-control" readonly value="{{ $lamaran->user->no_hp }}">
                </div>
                <div class="form-group">
                  <label>Nomor KTP</label>
                  <input type="text" name="text" required class="form-control" readonly value="{{ $lamaran->user->no_ktp }}">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="text" required class="form-control" readonly value="{{ $lamaran->user->alamat }}">
                </div>
                <h2>File Yang Diperlukan</h2>
                @if($lowker->suratlamaran == '1')
                <div class="form-group">
                  <label>Surat Lamaran</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->suratlamaran }}" download>{{ $lamaran->suratlamaran }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->cv == '1')
                <div class="form-group">
                  <label>Curriculum Vitae / CV </label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->cv }}" download>{{ $lamaran->cv }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->ktp == '1')
                <div class="form-group">
                  <label>Foto KTP</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->ktp }}" download>{{ $lamaran->ktp }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->ijazah == '1')
                <div class="form-group">
                  <label>Ijazah</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->ijazah }}" download>{{ $lamaran->ijazah }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->transkripnilai == '1')
                <div class="form-group">
                  <label>Transkrip Nilai</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->transkripnilai }}" download>{{ $lamaran->transkripnilai }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->pasfoto == '1')
                <div class="form-group">
                  <label>Pas Foto</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->pasfoto }}" download>{{ $lamaran->pasfoto }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->skck == '1')
                <div class="form-group">
                  <label>SKCK</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->skck }}" download>{{ $lamaran->skck }}</a>
                  <br><br>
                </div>
                @endif
                @if($lowker->suratketerangandokter == '1')
                <div class="form-group">
                  <label>Surat Keterangan Dokter</label>
                  <a href="{{ asset('uploads/lamaran') }}/{{ $lamaran->suratketerangandokter }}" download>{{ $lamaran->suratketerangandokter }}</a>
                  <br><br>
                </div>
                @endif
              </form>
              <div class="row">
                <div class="col-md-5">
                  <a href="{{ route('front.lamaranDiterima', ['id' => $lowker->id, 'user_id' => $lamaran->user->id]) }}" class="btn btn-success">Terima Lamaran / Beri Notifikasi</a>
                </div>
                <div class="col-md-4">
                  <form action="{{ route('front.lamaranDitolak', ['id' => $lowker->id, 'user_id' => $lamaran->user->id]) }} }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" name="submit" value="Tolak Lamaran" class="btn btn-success" style="background-color:#e74c3c;">
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
