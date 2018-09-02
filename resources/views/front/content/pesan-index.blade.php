@extends('front.partials.layout')

@section('title')
Pesan
@endsection

@section('custom_css')
<style media="screen">
@import url(https://fonts.googleapis.com/css?family=Lato:400,700);
@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
/*http://codepen.io/drehimself/pen/KdXwxR?utm_source=bypeople
http://nicolasgallagher.com/pure-css-speech-bubbles/demo/*/

*, *:before, *:after {
box-sizing: border-box;
}
.chat .chat-history {
padding: 30px 30px 20px;
border-bottom: 2px solid white;
}
.chat .chat-history .message-data {
margin-bottom: 15px;
}
.chat .chat-history .message-data-time {
color: #a8aab1;
padding-left: 6px;
}
.chat .chat-history .message {
color: white;
padding: 18px 20px;
line-height: 26px;
font-size: 16px;
border-radius: 5px;
margin-bottom: 30px;
width: 90%;
position: relative;
}
.chat .chat-history .message:after {
content: "";
  position: absolute;
  top: -15px;
  left: 20px;
  border-width: 0 15px 15px;
  border-style: solid;
  border-color: #CCDBDC transparent;
  display: block;
  width: 0;
}
.chat .chat-history .you-message {
background: #CCDBDC;
color:#003366;
}
.chat .chat-history .me-message {
background: #E9724C;
}
.chat .chat-history .me-message:after {
border-color: #E9724C transparent;
  right: 20px;
  top: -15px;
  left: auto;
  bottom:auto;
}
.chat .chat-message {
padding: 30px;
}
.chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
font-size: 16px;
color: gray;
cursor: pointer;
}

.chat-ul li{
  list-style-type: none;
}

.align-left {
text-align: left;
}

.align-right {
text-align: right;
}

.float-right {
float: right;
}

.clearfix:after {
visibility: hidden;
display: block;
font-size: 0;
content: " ";
clear: both;
height: 0;
}
.you {
color: #CCDBDC;
}

.me {
color: #E9724C;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Raleway",sans-serif;
  color: #003366;
}

</style>
@endsection

@section('content')
<div class="page-hero page-hero-center" style="background-image: url({{ asset('front/herolaptop.jpg') }});">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-hero-content">
          <h2 class="page-title" style="color: #fff;">
            Pesan
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br>
<main class="main main-elevated">
  <div class="container clearfix">
      <div class="chat">
        <div class="chat-history">
          <div  style="max-height: 600px; overflow:auto;">
            <ul class="chat-ul">
              @forelse($pesans as $pesan)
              @if($pesan->sender_id != Auth::user()->id)
              <li>
                <div class="message-data">
                  <span class="message-data-name"><i class="fa fa-circle you"></i> {{ $penerima->name }}</span>
                </div>
                <div class="message you-message">
                  {{ $pesan->isi }}
                </div>
              </li>
              @else
              <li class="clearfix">
                <div class="message-data align-right">
                  <span class="message-data-name">{{ Auth::user()->name }} ( Saya )</span> <i class="fa fa-circle me"></i>
                </div>
                <div class="message me-message float-right">
                  {{ $pesan->isi }}
                </div>
              </li>
              @endif

              @empty
              <h1>Belum ada pesan.</h1>

              @endforelse

            </ul>
          </div>
          <br><hr><br>
          <div class="row">
            <form action="{{ route('pesan.store', ['id' => $penerima->id]) }}" method="post">
                @csrf
                <div class="col-md-10">
                  <input type="text" name="isi" required class="form-control">
                </div>
                <div class="col-md-2">
                  <input type="submit" name="submit" value="Kirim" class="btn btn-default">
                </div>
            </form>
          </div>

        </div> <!-- end chat-history -->

      </div> <!-- end chat -->
    </div>
</main>
@endsection
