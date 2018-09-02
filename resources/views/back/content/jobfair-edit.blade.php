@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Ubah Job Fair</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li><a href="/admin/kelola-jobfair">Kelola Job Fair</a></li>
    <li class="active"><span>Edit Job Fair</span></li>
    </ol>
  </div>
  <!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <form action="{{ route('kelola-jobfair.update', ['id' => $jobfair->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label>Nama / Judul Job Fair</label>
              <input type="text" name="judul" required class="form-control" value="{{ $jobfair->judul }}">
            </div>
            <div class="form-group">
              <label>Isi</label>
              <textarea name="isi" rows="8" cols="80" required class="form-control">{{ $jobfair->isi }}</textarea>
            </div>
            <div class="form-group">
              <label>Foto (Resolusi Rekomendasi : 848 x 450)</label>
              <br>
              <img src="{{ asset('uploads/jobfair') }}/{{ $jobfair->foto }}" width="500">
              <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" required class="form-control" value="{{ $jobfair->alamat }}">
            </div>
            <div class="form-group">
              <label>Tanggal Mulai Acara</label>
              <input type="date" name="tglmulai" required class="form-control" value="{{ $jobfair->tglmulai }}">
            </div>
            <div class="form-group">
              <label>Tanggal Selesai Acara</label>
              <input type="date" name="tglselesai" required class="form-control" value="{{ $jobfair->tglselesai }}">
            </div>
            <div class="form-group">
              <label>Harga Tiket Masuk (Jika Ada)</label>
              <input type="number" name="htm" class="form-control" value="{{ $jobfair->htm }}">
            </div>
            <input type="submit" name="submit" value="Simpan" class="btn btn-success pull-right">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
@endsection
