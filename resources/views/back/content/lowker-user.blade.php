@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Kelola Lowker Oleh Pengguna</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li class="active"><span>Kelola Lowongan Pekerjaan Oleh Pengguna</span></li>
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
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="table-wrap">
            <div class="table-responsive">
              <table id="datable_1" class="table table-hover display  pb-30" >
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Bagian</th>
                    <th>Jenis Lowongan</th>
                    <th>Lihat</th>
                    <th>Terima</th>
                    <th>Tolak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($lowkers as $lowker)
                  <tr>
                    <td>{{ $lowker->judul }}</td>
                    <td>{{ $lowker->namaperusahaan }}</td>
                    <td>{{ $lowker->alamatperusahaan }}</td>
                    <td>{{ $lowker->bagian }}</td>
                    <td>{{ $lowker->getJenisPekerjaan() }}</td>
                    <td><a class="btn btn-primary" href="{{ route('kelola-lowker.show', ['id' => $lowker->id]) }}">Lihat</a></td>
                    <td>
                      <form action="{{ route('admin.lowker.terima', ['id' => $lowker->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" name="submit" value="Terima" class="btn btn-success">
                      </form>
                    </td>
                    <td>
                      <form action="{{ route('admin.lowker.tolak', ['id' => $lowker->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" name="submit" value="Tolak" class="btn btn-danger">
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
