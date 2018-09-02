@extends('front.partials.layout')

@section('title')
Tambahkan Lowongan Pekerjaan
@endsection

@section('content')
<div class="page-hero page-hero-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h1 class="page-title">Tambah Lowongan Pekerjaan</h1>
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
              <form action="{{ route('lowongan-pekerjaan.store') }}" method="post" enctype="multipart/form-data">
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
                <br>
                <div class="form-group">
                  <label>Persyaratan dan Kelengkapan Berkas ( Tandai Yang Diperlukan )</label>
                  <div style="margin-left:10px; margin-top:10px;">
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox1" type="checkbox" name="suratlamaran"> Surat Lamaran
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox2" type="checkbox" name="cv"> CV ( Curriculum Vitae )
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox3" type="checkbox" name="ktp"> Fotocopy / Scan KTP
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox4" type="checkbox" name="ijazah"> Fotocopy / Scan Ijazah
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox5" type="checkbox" name="transkripnilai"> Fotocopy / Scan Transkrip Nilai
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox6" type="checkbox" name="pasfoto"> Pas Foto
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox7" type="checkbox" name="skck"> Fotocopy / Scan SKCK
                    </div>
                    <div class="checkbox checkbox-primary">
                      <input id="checkbox8" type="checkbox" name="suratketerangandokter"> Fotocopy / Scan Surat Keterangan Dokter
                    </div>
                  </div>
                </div>
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
