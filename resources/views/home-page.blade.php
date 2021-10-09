<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row justify-content-center mt-4">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleCaptions" class="w-100 carousel slide" data-ride="carousel">
                <div class="carousel-inner" align="center">
                    <?php if (isset($sliderObjek[0])) { ?>
                    <div class="carousel-item active">
                        <a href="/wisata-desa-detail/{{$sliderObjek[0]->id_obj_wisata}}">
                            <img src="{{ asset($sliderObjek[0]->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                style="object-fit: cover; max-height: 400px; width: 100% !important;">
                            <div class="carousel-caption absolute-bottom-right " style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                            $sliderObjek[0]->nama_wisata }}</h5>
                                <p class="text-white overme">
                                    <?php echo (strip_tags($sliderObjek[0]->deskripsi)); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php }
                    if (isset($sliderObjek[1])) { ?>
                    <div class="carousel-item">
                        <a href="/wisata-desa-detail/{{$sliderObjek[1]->id_obj_wisata}}">
                            <img src="{{ asset($sliderObjek[1]->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                style="object-fit: cover; max-height: 400px; width: 100% !important;">
                            <div class="carousel-caption absolute-bottom-right " style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                            $sliderObjek[1]->nama_wisata }}</h5>
                                <p class="text-white overme">
                                    <?php echo (strip_tags($sliderObjek[1]->deskripsi)); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php }
                    if (isset($slider2)) { ?>
                    <div class="carousel-item">
                        <a href="/detail-paket-wisata/{{$slider2->id_pkt_wisata}}">
                            <img src="{{ asset($slider2->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                style="object-fit: cover; max-height: 400px; width: 100% !important;">
                            <div class="carousel-caption absolute-bottom-right " style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                            $slider2->nama_paket }}</h5>
                                <p class="text-white overme">
                                    <?php echo (strip_tags($slider2->keterangan)); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php }
                    if (isset($slider3)) { ?>
                    <div class="carousel-item">
                        <a href="/berita-detail/{{$slider3->id_berita}}">
                            <img src="{{ asset($slider3->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                style="object-fit: cover; max-height: 400px; width: 100% !important;">
                            <div class="carousel-caption absolute-bottom-right " style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                            $slider3->judul_berita }}</h5>
                                <p class="text-white overme">
                                    <?php echo (strip_tags($slider3->isi_berita)); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4" id="berita-terbaru">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="sub-title">Wisata Unggulan</div>
            </div>
        </div>
        <div class="row">
            <div class="container background">
                <div class="row">
                    @if(count($unggulan))
                    @foreach($unggulan as $data)
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                                <img src="{{$data->file_foto}}" class="card-img2">
                            </a>
                            <div class="container">
                                <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                                    <div class="card-title-home">{{$data->nama_wisata}}</div>
                                </a>
                                <div class="card-caption-3baris">
                                    <?php echo (strip_tags($data->deskripsi)); ?>
                                </div>
                                <div class="card-link">
                                    <a href="{{ URL('/wisata-desa-detail/'.$data->id_obj_wisata) }}"
                                        style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </q-card>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 mt-lg-5 mb-lg-5">
                        <br>
                        <div class="jumbotron jumbotron-fluid w-100">
                            <div class="container-fluid">
                                <h5 class="display-5  d-flex justify-content-center">Informasi wisata belum
                                    tersedia</h5>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4" id="wisata-desa">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="sub-title">Paket Wisata</div>
            </div>
        </div>
        <div class="row ">
            <div class="container background">
                <div class="row">
                    @if(count($paket))
                    @foreach($paket as $data)
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <a href="/detail-paket-wisata/{{$data->id_pkt_wisata}}"><img src="{{$data->file_foto}}"
                                    class="card-img2"></a>

                            <q-card-section>
                                <a href="/detail-paket-wisata/{{$data->id_pkt_wisata}}">
                                    <div class="card-title-home">{{$data->nama_paket}}</div>
                                </a>
                                <div class="card-caption-home">
                                    <?php echo (strip_tags($data->keterangan)); ?>
                                </div>
                                <div class="card-link">
                                    <a href="{{ URL('/detail-paket-wisata/'.$data->id_pkt_wisata) }}"
                                        style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                                </div>
                            </q-card-section>
                        </q-card>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 mt-lg-5 mb-lg-5">
                        <br>
                        <div class="jumbotron jumbotron-fluid w-100">
                            <div class="container">
                                <h5 class="display-5  d-flex justify-content-center">Informasi paket wisata belum
                                    tersedia</h5>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer2')
