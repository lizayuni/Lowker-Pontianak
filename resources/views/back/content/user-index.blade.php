@extends('back.partials.layout')
@section('content')
<!-- Title -->
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Kelola User</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
    <li><a href="/admin">Beranda</a></li>
    <li class="active"><span>Kelola User</span></li>
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if($user->role == 'admin')
                    <td>Administrator</td>
                    @elseif($user->role == 'pemberi')
                    <td>Pemberi Lowongan</td>
                    @else
                    <td>Pencari Lowongan</td>
                    @endif
                    <td>
                      <form action="{{ route('admin.userDestroy', ['id' => $user->id]) }}" method="post">
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
