@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Ubah Lowker</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li><a href="/admin/kelola-lowker">Kelola Lowongan Pekerjaan</a></li>
    <li class="active"><span>Ubah Lowongan Pekerjaan</span></li>
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
          <form action="{{ route('kelola-lowker.update', ['id' => $lowker->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label>Judul</label>
              <input type="text" name="judul" required class="form-control" value="{{ $lowker->judul }}">
            </div>
            <div class="form-group">
              <label>Deskripsi Pekerjaan</label>
              <textarea name="isi" rows="8" cols="80" required class="form-control">{{ $lowker->isi }}</textarea>
            </div>
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" name="namaperusahaan" required class="form-control" value="{{ $lowker->namaperusahaan }}">
            </div>
            <div class="form-group">
              <label>Alamat Perusahaan</label>
              <input type="text" name="alamatperusahaan" required class="form-control" value="{{ $lowker->alamatperusahaan }}">
            </div>
            <div class="form-group">
              <label>Email Perusahaan</label>
              <input type="email" name="email_perusahaan" required class="form-control" value="{{ $lowker->email_perusahaan }}">
            </div>
            <div class="form-group">
              <label>Nomor Telepon Perusahaan</label>
              <input type="text" name="no_hp_perusahaan" required class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $lowker->no_hp_perusahaan }}">
            </div>
            <div class="form-group">
              <label>Wilayah Penempatan Kerja</label>
              <input type="text" name="penempatan" required class="form-control" value="{{ $lowker->penempatan }}">
            </div>
            <div class="form-group">
              <label>Bagian</label>
              <input type="text" name="bagian" required class="form-control" value="{{ $lowker->bagian }}">
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
              <input type="date" name="penutupan" required class="form-control" value="{{ $lowker->penutupan }}">
            </div>
            <div class="form-group">
              <label>Persyaratan dan Kelengkapan Berkas ( Tandai Yang Diperlukan )</label>
              <br>

              @php
              $suratlamaran = '';
              $cv = '';
              $ktp = '';
              $ijazah = '';
              $transkripnilai = '';
              $pasfoto = '';
              $skck = '';
              $suratketerangandokter = '';
              @endphp

              @if($lowker->suratlamaran == '1')
                @php
                $suratlamaran = 'checked';
                @endphp
              @endif

              @if($lowker->cv == '1')
                @php
                $cv = 'checked';
                @endphp
              @endif

              @if($lowker->ktp == '1')
                @php
                $ktp = 'checked';
                @endphp
              @endif

              @if($lowker->ijazah == '1')
                @php
                $ijazah = 'checked';
                @endphp
              @endif

              @if($lowker->transkripnilai == '1')
                @php
                $transkripnilai = 'checked';
                @endphp
              @endif

              @if($lowker->pasfoto == '1')
                @php
                $pasfoto = 'checked';
                @endphp
              @endif

              @if($lowker->skck == '1')
                @php
                $skck = 'checked';
                @endphp
              @endif

              @if($lowker->suratketerangandokter == '1')
                @php
                $suratketerangandokter = 'checked';
                @endphp
              @endif

              <div style="margin-left:10px; margin-top:10px;">
                <div class="checkbox checkbox-primary">
                  <input id="checkbox1" type="checkbox" name="suratlamaran" {{ $suratlamaran }}>
                  <label for="checkbox1"> Surat Lamaran</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox2" type="checkbox" name="cv" {{ $cv }}>
                  <label for="checkbox2"> CV ( Curriculum Vitae )</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox3" type="checkbox" name="ktp" {{ $ktp }}>
                  <label for="checkbox3"> Fotocopy / Scan KTP</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox4" type="checkbox" name="ijazah" {{ $ijazah }}>
                  <label for="checkbox4"> Fotocopy / Scan Ijazah</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox5" type="checkbox" name="transkripnilai" {{ $transkripnilai }}>
                  <label for="checkbox5"> Fotocopy / Scan Transkrip Nilai</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox6" type="checkbox" name="pasfoto" {{ $pasfoto }}>
                  <label for="checkbox6"> Pas Foto</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox7" type="checkbox" name="skck" {{ $skck }}>
                  <label for="checkbox7"> Fotocopy / Scan SKCK</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox8" type="checkbox" name="suratketerangandokter" {{ $suratketerangandokter }}>
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
