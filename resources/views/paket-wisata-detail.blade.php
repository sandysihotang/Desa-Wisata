<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4">
    <div class="container background" id="homes">
        <div class="row">
            <div id="carouselExampleCaptions" class="form-group carousel slide" data-ride="carousel">
                <div class="carousel-inner" align="center">
                    <div class="carousel-item active">
                        <img src="{{$paket->file_foto}}" class="img-fluid d-block w-100 h-auto"
                             style="object-fit: cover; max-height: 400px; width: 1200px !important">
                        <div class="carousel-in">
                            <div class="carousel-paket">{{$paket->nama_paket}}</div>
                            <div class="carousel-paket">{{$paket->paket}}</div>
                            <div class="carousel-paket-capt">mulai dari<br/>@currency($paket->harga_paket)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="container background" id="vue">
        <paket-detail-pengunjung></paket-detail-pengunjung>
    </div>
</div>
@include('template.footer2')
