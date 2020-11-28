<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container">
    <div class="row">
        <div class="title">{{ $berita->judul_berita}}</div>
    </div>
    <div class="row background" id="vue">
        <div class="col-md-12">
            <berita-detail-pengunjung></berita-detail-pengunjung>
        </div>
    </div>
</div>
@include('template.footer')
