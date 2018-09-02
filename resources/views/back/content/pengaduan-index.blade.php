@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Kelola Pengaduan / Kontak</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li class="active"><span>Kelola Pengaduan</span></li>
    </ol>
  </div>
  <!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="table-wrap">
            <div class="table-responsive">
              <table id="datable_1" class="table table-hover display  pb-30" >
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Foto</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pengaduans as $pengaduan)
                  <tr>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>{{ $pengaduan->isi }}</td>
                    @if($pengaduan->foto != '')
                    <td><img src="{{ asset('uploads/pengaduan') }}/{{ $pengaduan->foto }}" width="200"></td>
                    @else
                    <td>Tidak ada foto</td>
                    @endif
                    <td>
                      <form action="{{ route('kelola-pengaduan.destroy', ['id' => $pengaduan->id]) }}" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="submit" name="submit" value="Hapus" class="btn btn-danger btn-sm">
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Row -->
@endsection
