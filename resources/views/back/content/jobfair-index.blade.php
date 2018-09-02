@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Kelola Job Fair</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li class="active"><span>Kelola Job Fair</span></li>
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

          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Tambah Job Fair</button>

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Form Tambah Job Fair</h4>
                </div>
                <div class="modal-body">
                  <form action="{{ route('kelola-jobfair.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Nama / Judul Job Fair</label>
                      <input type="text" name="judul" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Isi</label>
                      <textarea name="isi" rows="8" cols="80" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Foto (Resolusi Rekomendasi : 848 x 450)</label>
                      <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Mulai Acara</label>
                      <input type="date" name="tglmulai" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Selesai Acara</label>
                      <input type="date" name="tglselesai" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Harga Tiket Masuk (Jika Ada)</label>
                      <input type="number" name="htm" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                  </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
              </div>

            </div>
          </div>

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
                    <th>Judul</th>
                    <th>Alamat</th>
                    <th>Tanggal Mulai</th>
                    <th>HTM</th>
                    <th>Lihat</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jobfairs as $jobfair)
                  <tr>
                    <td>{{ $jobfair->judul }}</td>
                    <td>{{ $jobfair->alamat }}</td>
                    <td>{{ date('d-m-Y', strtotime($jobfair->tglmulai)) }}</td>
                    <td>Rp.{{ number_format($jobfair->htm, 0, '', '.') }}</td>
                    <td><a href="{{ route('kelola-jobfair.show', ['id' =>$jobfair->id]) }}" class="btn btn-sm btn-default">Lihat</a></td>
                    <td><a href="{{ route('kelola-jobfair.edit', ['id' =>$jobfair->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td>
                      <form action="{{ route('kelola-jobfair.destroy', ['id' => $jobfair->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" name="submit" value="Hapus" class="btn btn-sm btn-danger">
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
