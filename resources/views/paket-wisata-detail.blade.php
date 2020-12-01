<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background" id='homes'>

    <div class="row form-group">
        <q-carousel
            arrows
            animated
            v-model="slide"
            :autoplay="true"
            height="400px"
            style="max-height: 400px !important; width: 100%;"
        >
            <q-carousel-slide name="first" img-src="{{$paket->file_foto}}">
                <div class="carousel-in">
                    <div class="carousel-paket">{{$paket->nama_paket}}</div>
                    <div class="carousel-paket">{{$paket->paket}}</div>
                    <div class="carousel-paket-capt">mulai dari<br/>@currency($paket->harga_paket)</div>
                </div>
            </q-carousel-slide>
        </q-carousel>
    </div>
</div>
<div class="container background" id="vue">
    <paket-detail-pengunjung></paket-detail-pengunjung>
</div>


@include('template.footer')
