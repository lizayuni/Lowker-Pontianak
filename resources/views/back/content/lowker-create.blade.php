@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Tambah Lowker</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li><a href="/admin/kelola-lowker">Kelola Lowongan Pekerjaan</a></li>
    <li class="active"><span>Tambah Lowongan Pekerjaan</span></li>
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
          <form action="{{ route('kelola-lowker.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Judul</label>
              <input type="text" name="judul" required class="form-control">
            </div>
            <div class="form-group">
              <label>Deskripsi Pekerjaan</label>
              <textarea name="isi" rows="8" cols="80" required class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" name="namaperusahaan" required class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat Perusahaan</label>
              <input type="text" name="alamatperusahaan" required class="form-control">
            </div>
            <div class="form-group">
              <label>Email Perusahaan</label>
              <input type="email" name="email_perusahaan" required class="form-control">
            </div>
            <div class="form-group">
              <label>Nomor Telepon Perusahaan</label>
              <input type="text" name="no_hp_perusahaan" required class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
            <div class="form-group">
              <label>Wilayah Penempatan Kerja</label>
              <input type="text" name="penempatan" required class="form-control">
            </div>
            <div class="form-group">
              <label>Bagian</label>
              <input type="text" name="bagian" required class="form-control">
            </div>
            <div class="form-group">
              <label>Jenis Pekerjaan</label>
              <select class="form-control" name="tipepekerjaan_id">
                @foreach($tipepekerjaan as $pekerjaan)
                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Pengiriman Berkas</label>
              <select class="form-control" name="tipeberkas_id">
                @foreach($tipeberkas as $berkas)
                <option value="{{ $berkas->id }}">{{ $berkas->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Penutupan</label>
              <input type="date" name="penutupan" required class="form-control">
            </div>
            <div class="form-group">
              <label>Persyaratan dan Kelengkapan Berkas ( Tandai Yang Diperlukan )</label>
              <br>
              <div style="margin-left:10px; margin-top:10px;">
                <div class="checkbox checkbox-primary">
                  <input id="checkbox1" type="checkbox" name="suratlamaran">
                  <label for="checkbox1"> Surat Lamaran</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox2" type="checkbox" name="cv">
                  <label for="checkbox2"> CV ( Curriculum Vitae )</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox3" type="checkbox" name="ktp">
                  <label for="checkbox3"> Fotocopy / Scan KTP</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox4" type="checkbox" name="ijazah">
                  <label for="checkbox4"> Fotocopy / Scan Ijazah</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox5" type="checkbox" name="transkripnilai">
                  <label for="checkbox5"> Fotocopy / Scan Transkrip Nilai</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox6" type="checkbox" name="pasfoto">
                  <label for="checkbox6"> Pas Foto</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox7" type="checkbox" name="skck">
                  <label for="checkbox7"> Fotocopy / Scan SKCK</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox8" type="checkbox" name="suratketerangandokter">
                  <label for="checkbox8"> Fotocopy / Scan Surat Keterangan Dokter</label>
                </div>
              </div>
            </div>
            <br>
            <input type="submit" name="submit" value="Simpan" class="btn btn-success pull-right">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
@endsection
