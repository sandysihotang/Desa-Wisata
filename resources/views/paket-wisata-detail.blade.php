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
                <a href="detail-paket-wisata">
                    <div class="carousel-in">
                        <div class="carousel-paket">{{$paket->nama_paket}}</div>
                        <div class="carousel-paket-capt">mulai dari<br/>@currency($paket->harga_paket)</div>
                    </div>
                </a>
            </q-carousel-slide>
        </q-carousel>
    </div>
</div>
<div class="container background">

    <div class="row form-group">
        <div class="col-md-4">
            <div class="detail-title">Jadwal Open Trip</div>
            <div class="detail-body">{{$paket->jadwal}}</div>

            <div class="detail-title">Harga</div>
            <div class="detail-body">@currency($paket->harga_paket) / orang</div>

            <div class="detail-title">Harga Termasuk</div>
            
                <div class="detail-body">
                    <hargatermasuk-pengunjung></hargatermasuk-pengunjung>
                </div>

            <div class="detail-title">Harga Tidak Termasuk</div>
            <div class="detail-body">
                <div class="detail-body">
                    <harga-tidaktermasuk-pengunjung></harga-tidaktermasuk-pengunjung>
                </div>
                {{$paket->harga_tidak_termasuk}}
            </div>
        </div>

        <div class="col-md-4">
            <div class="detail-title">Itinerary</div>
            <div class="detail-body">
                {{$paket->itinerary}}
            </div>
        </div>

        <div class="col-md-4">
            <div class="row mt-4 mb-4 justify-content-center">
                <a href="/booking-wisata/{{$paket->id_pkt_wisata}}" class="btn btn-new" style="width:60%">BOOKING DI WEBSITE</a>
            </div>
            <div class="row mt-4 mb-4 justify-content-center">
                <button class="btn btn-new" style="width:60%">BOOKING DI WHATSAPP</button>
            </div>
        </div>
    </div>
</div>


@include('template.footer')
