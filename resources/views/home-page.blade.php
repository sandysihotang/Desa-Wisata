<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row justify-content-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="margin-left: 15px;">
        <div class="carousel-inner" align="center">
            <?php if(isset($slider1)){ ?>
                <div class="carousel-item active">
                    <img src="{{ asset($slider1->file_foto) }}" class="img-fluid d-block w-100 h-auto"  style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-caption absolute-bottom-right "
                        style=" right: 5%;
                                text-align: right;
                                max-width: 500px;
                                left: auto;
                                padding:5px;">
                        <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{ $slider1->nama_wisata }}</h5>
                        <p class="text-white" style="height: 40px; overflow: hidden;">
                            <?php
                            $peng = json_decode($slider1->deskripsi, true);
                            foreach ($peng['blocks'] as $temp) {
                                if ($temp['type'] == 'paragraph') {
                                    echo substr($temp['data']['text'], 0, 200);
                                    break;
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            <?php }
            if(isset($slider2)){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider2->file_foto) }}" class="img-fluid d-block w-100 h-auto" style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-caption absolute-bottom-right "
                        style=" right: 5%;
                                text-align: right;
                                max-width: 500px;
                                left: auto;
                                padding:5px;">
                        <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{ $slider2->nama_paket }}</h5>
                        <p class="text-white" style="height: 40px; overflow: hidden; white-space: pre-line;">
                            <?php echo substr($slider2->jadwal, 0, 200); ?>
                        </p>
                    </div>
                </div>
            <?php }
            if(isset($slider3)){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider3->file_foto) }}" class="img-fluid d-block w-100 h-auto"  style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-caption absolute-bottom-right "
                        style=" right: 5%;
                                text-align: right;
                                max-width: 500px;
                                left: auto;
                                padding:5px;">
                        <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{ $slider3->kategoriGaleri->judul }}</h5>
                        <p class="text-white" style="height: 40px; overflow: hidden; white-space: pre-line;">
                            <?php echo substr($slider2->jadwal, 0, 200); ?>
                        </p>
                    </div>
                </div>
            <?php }
            if(isset($slider4)){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider4->gambar) }}" class="img-fluid d-block w-100 h-auto"  style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-caption absolute-bottom-right "
                        style=" right: 5%;
                                text-align: right;
                                max-width: 500px;
                                left: auto;
                                padding:5px;">
                        <h5 class="slider-title text-white" style="height: 60px; overflow: hidden;">{{ $slider4->judul_pengalaman }}</h5>
                        <p class="text-white" style="height: 40px; overflow: hidden;">
                            <?php
                            $peng = json_decode($slider4->isi_pengalaman, true);
                            foreach ($peng['blocks'] as $temp) {
                                if ($temp['type'] == 'paragraph') {
                                    echo substr($temp['data']['text'], 0, 200);
                                    break;
                                }
                            }
                            ?>
                        </p>
                    </div>
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
                            <img src="{{$data->file_foto}}" class="card-img2">
                            <div class="container">
                                <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                                    <div class="card-title-home">{{$data->nama_wisata}}</div>
                                </a>
                                <div class="card-caption-home">
                                    <?php
                                    $peng = json_decode($data->deskripsi, true);
                                    foreach ($peng['blocks'] as $temp) {
                                        if ($temp['type'] == 'paragraph') {
                                            $allWords = $temp['data']['text'];
                                            $output =  substr($allWords, 0, 150);
                                            // $output =  substr($allWords, 0, strpos($allWords, ' ', 150));
                                            // echo wordwrap($output,31,"<br>\n",TRUE);
                                            echo $output;
                                            // echo substr($allWords, 0, strpos($allWords, ' ', 150));
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <q-card-section class="q-pt-none">
                                <a href="/kategori-wisata/{{$data->kategori_id}}">
                                    <div class="card-caption-home-kat" style="text-transform: uppercase; color: black">{{$data->kategoriWisata->nama_kategori}}</div>
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
                            <img src="{{$data->file_foto}}" class="card-img2">

                            <q-card-section>
                                <a href="/detail-paket-wisata/{{$data->id_pkt_wisata}}">
                                    <div class="card-title-home">{{$data->nama_paket}}</div>
                                </a>
                                <div class="card-caption-home" style="white-space: pre-line;">
                                    <?php
                                    echo substr($data->jadwal, 0, 200);
                                    ?>
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
<!-- <div class="row mt-4" id="wisata-desa">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="sub-title">Inspirasi</div>
            </div>
        </div>
        <div class="row background">
            <div class="container">
                <div class="row" style="object-fit: cover;">
                    @foreach($kategori as $data)
                        <div style="width: 100px">
                            <a href="/kategori-wisata/{{ $data->id_kategori }}">
                                <img src="{{$data->icon}}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->
@include('template.footer')
