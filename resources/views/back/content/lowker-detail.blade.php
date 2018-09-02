@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Detail Lowker</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li><a href="/admin/kelola-lowker">Kelola Lowongan Pekerjaan</a></li>
    <li class="active"><span>Detail Lowongan Pekerjaan</span></li>
    </ol>
  </div>
  <!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
  <div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default card-view">
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <p style="margin-bottom: 12px;"><strong>Ditambahkan Pada : </strong>{{ date('d-m-Y', strtotime($lowker->created_at)) }}</p>
          <br>
          <hr style="background-color: #000; border: 1px solid #eee;">
          <p style="margin-bottom: 12px;"><strong>Nama Perusahaan : </strong>{{ $lowker->namaperusahaan }}</p>
          <p style="margin-bottom: 12px;"><strong>Alamat Perusahaan : </strong>{{ $lowker->alamatperusahaan }}</p>
          <p style="margin-bottom: 12px;"><strong>Email Perusahaan : </strong>{{ $lowker->email_perusahaan }}</p>
          <p style="margin-bottom: 12px;"><strong>No Telpon Perusahaan : </strong>{{ $lowker->no_hp_perusahaan }}</p>
          <br>
          <hr style="background-color: #000; border: 1px solid #eee;">
          <p style="margin-bottom: 12px;"><strong>Judul Lowongan Pekerjaan : </strong>{{ $lowker->judul }}</p>
          <p style="margin-bottom: 12px;"><strong>Wilayah Penempatan Kerja : </strong>{{ $lowker->penempatan }}</p>
          <p style="margin-bottom: 12px;"><strong>Bagian : </strong>{{ $lowker->bagian }}</p>
          <p style="margin-bottom: 12px;"><strong>Jenis Pekerjaan : </strong>{{ $lowker->getJenisPekerjaan() }}</p>
          <p style="margin-bottom: 12px;"><strong>Pengiriman Berkas : </strong>{{ $lowker->getJenisBerkas() }}</p>
          <p style="margin-bottom: 12px;"><strong>Penutupan : </strong>{{ date('d-m-Y', strtotime($lowker->penutupan)) }}</p>
          <br>
          <hr style="background-color: #000; border: 1px solid #eee;">
          <p style="margin-bottom: 12px;"><strong>Deskripsi Pekerjaan : </strong>{{ $lowker->isi }}</p>
          <br>
          <hr style="background-color: #000; border: 1px solid #eee;">
            <div class="form-group">
              <label>Persyaratan dan Kelengkapan Berkas ( Tandai Yang Diperlukan )</label>
              <br>
              <div style="margin-left:10px; margin-top:10px;">
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

                <div class="checkbox checkbox-primary">
                  <input id="checkbox1" type="checkbox" name="suratlamaran" onclick="return false;" {{ $suratlamaran }}>
                  <label for="checkbox1"> Surat Lamaran</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox2" type="checkbox" name="cv" onclick="return false;" {{ $cv }}>
                  <label for="checkbox2"> CV ( Curriculum Vitae )</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox3" type="checkbox" name="ktp" onclick="return false;" {{ $ktp }}>
                  <label for="checkbox3"> Fotocopy / Scan KTP</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox4" type="checkbox" name="ijazah" onclick="return false;" {{ $ijazah }}>
                  <label for="checkbox4"> Fotocopy / Scan Ijazah</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox5" type="checkbox" name="transkripnilai" onclick="return false;" {{ $transkripnilai }}>
                  <label for="checkbox5"> Fotocopy / Scan Transkrip Nilai</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox6" type="checkbox" name="pasfoto" onclick="return false;" {{ $pasfoto }}>
                  <label for="checkbox6"> Pas Foto</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox7" type="checkbox" name="skck" onclick="return false;" {{ $skck }}>
                  <label for="checkbox7"> Fotocopy / Scan SKCK</label>
                </div>
                <div class="checkbox checkbox-primary">
                  <input id="checkbox8" type="checkbox" name="suratketerangandokter" onclick="return false;" {{ $suratketerangandokter }}>
                  <label for="checkbox8"> Fotocopy / Scan Surat Keterangan Dokter</label>
                </div>
              </div>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
@endsection
