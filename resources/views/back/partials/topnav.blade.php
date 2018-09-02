<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="mobile-only-brand pull-left">
    <div class="nav-header pull-left">
      <div class="logo-wrap">
        <a href="index.html">
          <img class="brand-img" src="{{ asset('back/img/logo.png') }}" alt="brand"/>
          <span class="brand-text">Admin Panel</span>
        </a>
      </div>
    </div>
    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
  </div>
  <div id="mobile_only_nav" class="mobile-only-nav pull-right">
    <ul class="nav navbar-right top-nav pull-right">
      <li class="dropdown alert-drp">
                    @php
                    $notifikasis = App\Notifikasi::latest()->where('receiver_id', 1)->get();
                    $jlhnotifbaru = App\Notifikasi::latest()->where('receiver_id', 1)->where('status', 0)->get()->count();
                    @endphp
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-bell top-nav-icon"></i><span class="top-nav-icon-badge">{{ $jlhnotifbaru }}</span></a>
              <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                <li>
                  <div class="notification-box-head-wrap">
                    <span class="notification-box-head pull-left inline-block">Notifikasi</span>
                    <form action="{{ route('front.adminNotifikasiDone') }}" method="post" id="notif">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                      <a href="#" onclick="document.getElementById('notif').submit();" class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> Tandai Sudah Dibaca </a>
                    </form>
                    <div class="clearfix"></div>
                    <hr class="light-grey-hr ma-0"/>
                  </div>
                </li>
                <li>
                  <div class="streamline message-nicescroll-bar">

                    @foreach($notifikasis as $notif)
                      @if($notif->judul == "Lowongan Pekerjaan Baru Ditambahkan Oleh Pengguna")
                        <div class="sl-item">
                          <a href="/admin/tambahan-user">
                            <div class="icon bg-green">
                              <i class="ti-briefcase "></i>
                            </div>
                            <div class="sl-content">
                              <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                              {{ $notif->judul }}</span>
                              <div class="clearfix"></div>
                              <p class="truncate">{{ $notif->isi }}</p>
                            </div>
                          </a>  
                        </div>
                      @endif

                      @if($notif->judul == "Pengaduan Baru Ditambahkan Oleh Pengguna")
                        <div class="sl-item">
                          <a href="/admin/kelola-pengaduan">
                            <div class="icon bg-blue">
                              <i class="zmdi zmdi-email"></i>
                            </div>
                            <div class="sl-content">
                              <span class="inline-block capitalize-font  pull-left truncate head-notifications">{{ $notif->judul }}</span>
                              <div class="clearfix"></div>
                              <p class="truncate">{{ $notif->isi }}</p>
                            </div>
                          </a>  
                        </div>
                      @endif
                    <hr class="light-grey-hr ma-0"/>
                    @endforeach
                  </div>
                </li>
                <li>
                  <div class="notification-box-bottom-wrap">
                    <hr class="light-grey-hr ma-0"/>
                    <a class="block text-center read-all" href="javascript:void(0)"> </a>
                    <div class="clearfix"></div>
                  </div>
                </li>
              </ul>
            </li>
      <li class="dropdown auth-drp">
        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Hello {{ Auth::user()->name}} <img src="{{ asset('front/profile.png') }}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="zmdi zmdi-power"></i><span>Keluar</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
