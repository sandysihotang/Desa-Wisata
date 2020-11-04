<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@include('template.header')

<div class="container" id="homes">
    <div class="row form-group">
    <q-carousel
        arrows
        animated
        v-model="slide"
        :autoplay="true"
        height="400px"
        prev-icon="fa fa-arrow-left"
        next-icon="fa fa-arrow-right"
        style="max-height: 400px !important; width: 100%;"
    >
        <q-carousel-slide name="first" img-src="/image/image/DSC01476.JPG">
            <a href="detail-paket-wisata">
                <div class="carousel-in">
                    <div class="carousel-paket">Jelajah Bakara</div>
                    <div class="carousel-paket-capt">2D1N</div>
                    <div class="carousel-paket-capt">mulai dari<br/> Rp. 800.000</div>
                </div>
            </a>
        </q-carousel-slide>
        <q-carousel-slide name="second" img-src="/image/image/03_Bukit_Singgolom_Toba_Riyanthi_Sianturi.JPG.JPG.jpg">
            <a href="detail-paket-wisata">
                <div class="carousel-in">
                    <div class="carousel-paket">Sunset Toba</div>
                    <div class="carousel-paket-capt">1 Day</div>
                    <div class="carousel-paket-capt">mulai dari<br/> Rp. 200.000</div>
                </div>
            </a>
        </q-carousel-slide>
        <q-carousel-slide name="third" img-src="/image/image/DSC01536.JPG">
            <a href="detail-paket-wisata">
                <div class="carousel-in">
                    <div class="carousel-paket">Wisata Keluarga</div>
                    <div class="carousel-paket-capt">4D3N</div>
                    <div class="carousel-paket-capt">mulai dari<br/> Rp. 2.000.000</div>
                </div>
            </a>
        </q-carousel-slide>
    </q-carousel>
</div>
<!-- <div class="container"> -->
    <div class="row form-group">
        <div class="col-md-4">
            <a href="detail-paket-wisata" class="card">
                <img src="/image/image/DSC01476.JPG" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Jelajah Bakara</div>
                    <div class="card-paket-capt">2D1N</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 800.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Jelajah Bakara - 2D1N</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/03_Bukit_Singgolom_Toba_Riyanthi_Sianturi.JPG.JPG.jpg" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Sunset Toba</div>
                    <div class="card-paket-capt">1 Day</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 200.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Sunset Toba - 1 Day</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/DSC01536.JPG" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Wisata Keluarga</div>
                    <div class="card-paket-capt">4D3N</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 2.000.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Wisata Keluarga - 4D3N</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/DSC01372.JPG" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Wisata Gunung</div>
                    <div class="card-paket-capt">2D1N</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 500.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Wisata Gunung - 2D1N</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/DSC01408.JPG" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Samosir</div>
                    <div class="card-paket-capt">2D1N</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 800.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Samosir - 2D1N</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/Bakara_Humbang_Hasundutan_6779.jpg" alt="Avatar" class="card-img2">
                <div class="card-in">
                    <div class="card-paket">Rafting</div>
                    <div class="card-paket-capt">1 Day</div>
                    <div class="card-paket-capt">mulai dari<br/> Rp. 400.000</div>
                </div>
                <div class="container">
                    <div class="card-title2">Rafting - 1 Day</div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('template.footer')
