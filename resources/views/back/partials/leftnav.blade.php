<div class="fixed-sidebar-left">
  <ul class="nav navbar-nav side-nav nicescroll-bar">
    <li class="navigation-header">
      <span>Main</span>
      <hr/>
    </li>
    <li>
      <a href="/admin"><div class="pull-left"><i class="ti-home mr-20"></i><span class="right-nav-text">Beranda</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="/admin/tambahan-user"><div class="pull-left"><i class="ti-panel  mr-20"></i><span class="right-nav-text">Kelola Lowker Pengguna</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="/admin/kelola-lowker"><div class="pull-left"><i class="ti-briefcase mr-20"></i><span class="right-nav-text">Kelola Lowker</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="/admin/kelola-jobfair"><div class="pull-left"><i class="ti-agenda  mr-20"></i><span class="right-nav-text">Kelola Jobfair</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="/admin/kelola-pengaduan"><div class="pull-left"><i class="ti-comment  mr-20"></i><span class="right-nav-text">Kelola Pengaduan</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="/admin/kelola-user"><div class="pull-left"><i class="ti-user  mr-20"></i><span class="right-nav-text">Kelola User</span></div><div class="clearfix"></div></a>
    </li>
    <li class="pa-15 mt-10 mb-20">
      <a class="documentation-btn txt-light text-center" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       <span class="doc-large-btn">Keluar</span>
                       <span class="doc-small-btn">X</span>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
  </ul>
</div>
