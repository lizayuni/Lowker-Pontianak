<div style="max-height:30px; color:#FFF; background-color:#00c6ff;">
  <div class="container">
    @guest
    <p style="">
      Selamat Datang di Website Lowongan Pekerjaan Pontianak
    </p>
    @endguest

    @auth
    <p style="">
      Halo {{Auth::user()->name}}, Selamat Datang di Website Lowongan Pekerjaan Pontianak
    </p>
    @endauth
  </div>
</div>
<header class="header">
  <br>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="mast-head">
          <h1 class="site-logo">
            <a href="/">
              <img src="{{ asset('front/images/logo.png') }}" alt="" width="300"> </a>
          </h1>
          <nav class="nav">
            <ul class="navigation-main">
              <li class="menu-item-home current-menu-item-{{ active('front.beranda') }}">
                <a href="/">Beranda</a>
              </li>
              <li class="menu-item-home current-menu-item-{{ active('front.tentang') }}">
                <a href="/tentang-kami">Tentang</a>
              </li>
              @auth
                @if(Auth::user()->role == 'pencari')
                  <li class="menu-item-home current-menu-item-{{ active('lowongan-pekerjaan.*') }}">
                    <a href="/lowongan-pekerjaan">Lowker</a>
                  </li>
                  <li class="menu-item-home current-menu-item-{{ active('lamaran-saya.*') }}">
                    <a href="/lamaran-saya">Lamaran Saya</a>
                  </li>
                @else
                  <li class="menu-item-home current-menu-item-{{ active('lowker-saya.*') }}">
                    <a href="/lowker-saya">Lowker Saya</a>
                  </li>
                @endif
              @endauth
              <li class="menu-item-home current-menu-item-{{ active(['front.jobfairDetail', 'front.jobfair']) }}">
                <a href="/jobfair">Job Fair</a>
              </li>
              <li class="menu-item-home current-menu-item-{{ active('front.') }}">
                <a href="/kontak-kami">Kontak</a>
              </li>
              @guest
              <li class="menu-item-home current-menu-item-{{ active('auth.login') }}">
                <a href="/login">Masuk</a>
              </li>
              <li class="menu-item-btn current-menu-item-{{ active('auth.register') }}">
                <a href="/register">Daftar</a>
              </li>
              @endguest

              @auth
              <li class="menu-item-home">
                <a href="/profil">Profil</a>
              </li>
              @php
              $jlhnotif = App\Notifikasi::where('receiver_id', Auth::user()->id)->where('status', 0)->get()->count();
              @endphp
              @if(Auth::check() && Auth::user()->role != 'admin')
              <li class="menu-item-home">
                <form action="{{ route('front.notifikasiDone') }}" method="post" id="notif">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <li class="menu-item-home">
                    <a href="#" onclick="document.getElementById('notif').submit();" style="color:#fff; padding:8px 0; margin-left:30px;">Notifikasi ({{ $jlhnotif }})</a>
                  </li>
                </form>
              </li>
              @endif
              @endauth

              @if(Auth::check() && Auth::user()->role == 'admin')
              <li class="menu-item-home">
                <a href="/admin">Admin Panel</a>
              </li>
              @endif

              @auth
              <li class="menu-item-home">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
              @endauth
            </ul>
            <!-- #navigation -->
            <a href="#mobilemenu" class="mobile-nav-trigger">
              <i class="fa fa-navicon"></i> Menu </a>
          </nav>
          <!-- #nav -->
          <div id="mobilemenu"></div>
        </div>
      </div>
    </div>
  </div>
</header>
