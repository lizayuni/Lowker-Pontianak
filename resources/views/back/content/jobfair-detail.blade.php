@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Job Fair Detail</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li><a href="/admin/kelola-jobfair">Kelola Job Fair</a></li>
    <li class="active"><span>{{ $jobfair->judul }}</span></li>
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
          <form class="" action="" method="post">
            <div class="form-group">
              <label>Nama / Judul Job Fair</label>
              <input type="text" name="judul" class="form-control" readonly value="{{ $jobfair->judul }}">
            </div>
            <div class="form-group">
              <label>Isi</label>
              <textarea name="isi" rows="8" cols="80" required class="form-control" readonly>{{ $jobfair->isi }}</textarea>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <br>
              <img src="{{ asset('uploads/jobfair') }}/{{ $jobfair->foto }}" width="500">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" readonly value="{{ $jobfair->alamat }}">
            </div>
            <div class="form-group">
              <label>Tanggal Mulai Acara</label>
              <input type="date" name="tglmulai" class="form-control" readonly value="{{ $jobfair->tglmulai }}">
            </div>
            <div class="form-group">
              <label>Tanggal Selesai Acara</label>
              <input type="date" name="tglselesai" class="form-control" readonly value="{{ $jobfair->tglselesai }}">
            </div>
            <div class="form-group">
              <label>Harga Tiket Masuk</label>
              <input type="number" name="htm" class="form-control" readonly value="{{ $jobfair->htm }}">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
@endsection
