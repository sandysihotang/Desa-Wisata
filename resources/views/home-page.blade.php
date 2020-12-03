<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row justify-content-center mt-4">
    <div class="container">
        <div class="row">
            <div id="carouselExampleCaptions" class="w-100 carousel slide" data-ride="carousel">
                <div class="carousel-inner" align="center">
                    <?php if (isset($slider1)) { ?>
                        <div class="carousel-item active">
                            <a href="/wisata-desa-detail/{{$slider1->id_obj_wisata}}">
                                <img src="{{ asset($slider1->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <div class="carousel-caption absolute-bottom-right "
                                     style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                    <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                        $slider1->nama_wisata }}</h5>
                                    <p class="text-white overme">
                                        <?php
                                        $html = $slider1->deskripsi;

                                        if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                            $s = '';
                                            foreach ($matches['paragraphs'] as $val) {
                                                $s .= $val;
                                            }
                                            echo substr($s, 0, 200);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php }
                    if (isset($slider2)) { ?>
                        <div class="carousel-item">
                            <a href="/detail-paket-wisata/{{$slider2->id_pkt_wisata}}">
                                <img src="{{ asset($slider2->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <div class="carousel-caption absolute-bottom-right "
                                     style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                    <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                        $slider2->nama_paket }}</h5>
                                    <p class="text-white overme">
                                        <?php
                                        $html = $slider2->keterangan;

                                        if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                            $s = '';
                                            foreach ($matches['paragraphs'] as $val) {
                                                $s .= $val;
                                            }
                                            echo substr($s, 0, 200);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php }
                    if (isset($slider3)) { ?>
                        <div class="carousel-item">
                            <a href="/berita-detail/{{$slider3->id_berita}}">
                                <img src="{{ asset($slider3->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <div class="carousel-caption absolute-bottom-right "
                                     style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                    <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{
                                        $slider3->judul_berita }}</h5>
                                    <p class="text-white overme">
                                        <?php
                                        $html = $slider3->isi_berita;

                                        if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                            $s = '';
                                            foreach ($matches['paragraphs'] as $val) {
                                                $s .= $val;
                                            }
                                            echo substr($s, 0, 200);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php }
                    if (isset($slider4)) { ?>
                        <div class="carousel-item">
                            <a href="/pengalaman-wisata-detail/{{$slider4->id_pengalaman}}">
                                <img src="{{ asset($slider4->gambar) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <div class="carousel-caption absolute-bottom-right "
                                     style=" right: 5%;
                                    text-align: right;
                                    max-width: 500px;
                                    left: auto;
                                    padding:5px;">
                                    <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">
                                        {{
                                        $slider4->judul_pengalaman }}</h5>
                                    <p class="text-white overme">
                                        <?php
                                        $html = $slider4->isi_pengalaman;

                                        if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                            $s = '';
                                            foreach ($matches['paragraphs'] as $val) {
                                                $s .= $val;
                                            }
                                            echo substr($s, 0, 200);
                                        }
                                        ?>
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
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="sub-title">Wisata Unggulan</div>
            </div>
        </div>
        <div class="row">
            <div class="container background">
                <div class="row">
                    @foreach($unggulan as $data)
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"><img src="{{$data->file_foto}}"
                                                                                        class="card-img2"></a>
                            <div class="container">
                                <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                                    <div class="card-title-home">{{$data->nama_wisata}}</div>
                                </a>
                                <div class="card-caption-3baris">
                                    <?php
                                    $html = $data->deskripsi;

                                    if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                        $s = '';
                                        foreach ($matches['paragraphs'] as $val) {
                                            $s .= $val;
                                        }
                                        echo substr($s, 0, 200);
                                    }
                                    ?>
                                </div>
                                <div class="card-link">
                                    <a href="{{ URL('/wisata-desa-detail/'.$data->id_obj_wisata) }}"
                                       style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                                </div>
                            </div>
                            <q-card-section class="q-pt-none">
                                <a href="/kategori-wisata/{{$data->kategori_id}}">
                                    <div class="card-caption-home-kat" style="text-transform: uppercase">
                                        {{$data->kategoriWisata->nama_kategori}}
                                    </div>
                                </a>
                            </q-card-section>
                        </q-card>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4" id="wisata-desa">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="sub-title">Paket Wisata</div>
            </div>
        </div>
        <div class="row ">
            <div class="container background">
                <div class="row">
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
                                    <?php
                                    $html = $data->keterangan;

                                    if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                        $s = '';
                                        foreach ($matches['paragraphs'] as $val) {
                                            $s .= $val;
                                        }
                                        echo substr($s, 0, 200);
                                    }
                                    ?>
                                </div>
                                <div class="card-link">
                                    <a href="{{ URL('/detail-paket-wisata/'.$data->id_pkt_wisata) }}"
                                       style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                                </div>
                            </q-card-section>
                        </q-card>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer2')
