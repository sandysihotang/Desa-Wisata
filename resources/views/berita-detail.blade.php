<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container">
    <div class="title">{{ $berita->judul_berita}}</div>
    <div class="row background" id="vue">
        <berita-detail-pengunjung></berita-detail-pengunjung>
    </div>
</div>
@include('template.footer')
