@extends('front.partials.layout')

@section('title')
Job Fair
@endsection

@section('content')
<div class="page-hero page-hero-lg" style="background-image: url({{ asset('front/herohand.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title">
            <span class="text-theme">Job Fair.</span>
            <br> Temukan Job Fair Terbaru Disini. </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<main class="main main-elevated">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-8 col-xs-12">
        <div class="content-wrap">
          <div class="infinite-scroll">
            @foreach($jobfairs as $jobfair)
            <article class="entry">
              <figure class="entry-thumb">
                <a href="{{ route('front.jobfairDetail', ['id' => $jobfair->id]) }}">
                  <img src="{{ asset('uploads/jobfair') }}/{{ $jobfair->foto }}" alt=""> </a>
                </figure>
                <div class="entry-meta">
                  <span class="entry-categories">
                    <a href="">Dipost Oleh : {{ $jobfair->user->name }}</a>
                  </span>
                </div>
                <h1 class="entry-title">
                  <a href="{{ route('front.jobfairDetail', ['id' => $jobfair->id]) }}">{{ $jobfair->judul }}</a>
                </h1>
                <div class="entry-content">
                  <p>{{ str_limit($jobfair->isi,200) }}</p>
                </div>
                <a href="{{ route('front.jobfairDetail', ['id' => $jobfair->id]) }}" class="btn btn-read-more">Lihat Selengkapnya</a>
              </article>
              @endforeach
              {{ $jobfairs->links() }}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-xs-12">
        <div class="sidebar">
          <aside class="widget widget_text group">
            <h3 class="widget-title">Pengertian Job Fair</h3>
            <p>Bursa kerja, atau bursa karier (bahasa Inggris: job fair), adalah bursa atau pameran bagi para majikan, perekrut, dan sekolah untuk bertemu dengan para pencari kerja yang prospektif. Bursa ini biasanya diikuti oleh perusahaan atau organisasi yang menyediakan meja untuk mengumpulkan resume atau bilik tempat bertukar kartu nama. Di perguruan tinggi, bursa kerja umumnya digunakan untuk merekrut para lulusan baru. Seringkali disponsori oleh pusat-pusat karier, bursa kerja memberi kesempatan kepada para lulusan baru untuk melakukan wawancara kerja pertama mereka.</p>
          </aside>
          <!-- /widget -->
          <!-- For a list of all supported social icons please see: http://fontawesome.io/icons/#brand -->
          <aside class="widget widget_ci-callout-widget">
            <div class="callout-wrapper">
              <img class="callout-thumb" src="images/logo-dark.png" alt="">
              <p>
                <strong>Mempunya informasi tentang job fair yang akan datang ?</strong>
              </p>
              </p>
              <a href="/kontak-kami" class="btn btn-round btn-transparent">Beritahu Kami</a>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('custom_js')
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,

            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endsection
