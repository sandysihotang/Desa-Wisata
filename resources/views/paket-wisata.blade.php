<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@include('template.header')

<div class="container">
    <div class="row form-group">
        <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <a href="detail-paket-wisata">
                    <div class="carousel-item active">
                        <img class="carousel-style d-block w-100" src="/image/image/DSC01476.jpg" alt="First slide">
                        <div class="carousel-in">
                            <div class="carousel-paket">Jelajah Bakara</div>
                            <div class="carousel-paket-capt">2D1N</div>
                            <div class="carousel-paket-capt">mulai dari<br/> Rp. 800.000</div>
                        </div>
                    </div>
                </a>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/image/image/DSC01408.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/image/image/DSC01476.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <ol class="carousel-indicators">
                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1" ></li>
                    <li data-target="#mycarousel" data-slide-to="2" ></li>
                </ol>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <a href="detail-paket-wisata" class="card">
                <img src="/image/image/DSC01476.jpg" alt="Avatar" class="card-img2">
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
                <img src="/image/image/DSC01536.jpg" alt="Avatar" class="card-img2">
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
                <img src="/image/image/DSC01372.jpg" alt="Avatar" class="card-img2">
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
                <img src="/image/image/DSC01408.jpg" alt="Avatar" class="card-img2">
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
