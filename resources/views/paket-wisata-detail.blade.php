<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4 ml-1 mr-1">
    <div class="container-fluid background" id="homes">
        <div class="row background">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="form-group carousel slide background" data-ride="carousel">
                    <div class="carousel-inner" align="center">
                        <div class="carousel-item active">
                            <img src="{{$paket->file_foto}}" class="img-fluid d-block w-100 h-auto"
                                 style="object-fit: cover; max-height: 400px; width: 100% !important">
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
</div>
<div class="row ml-1 mr-1">
    <div class="container-fluid background" id="vue">
        <paket-detail-pengunjung></paket-detail-pengunjung>
    </div>
</div>
@include('template.footer2')
