@extends('back.partials.layout')
@section('content')
<br>
<!-- Row -->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default border-panel card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Selamat Datang di Halaman Admin Panel</h6>
        </div>
        <div class="pull-right">
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <ul class="flex-stat flex-stat-2 mt-20">
            <li>
              <span class="block"><span class="txt-dark weight-300 counter-anim data-rep">{{ $jlhusers }}</span></span>
              <span class="block">Jumlah Pengguna</span>
            </li>
            <li>
              <span class="block"><span class="txt-dark weight-300 counter-anim data-rep">{{ $jlhlowkers }}</span></span>
              <span class="block">Jumlah Lowongan Pekerjaan</span>
            </li>
            <li>
              <span class="block">
                <span class="block"><span class="txt-dark weight-300 counter-anim data-rep">{{ $jlhlamarans }}</span></span>
              </span>
              <span class="block">Jumlah Lamaran</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Row -->
@endsection
