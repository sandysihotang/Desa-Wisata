<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row" id="homes">
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
        <?php //$sliderNum = array('first', 'second', 'third', 'fourth'); ?>
        <!-- @foreach($slider as $data) -->

            <?php
                // $i = 0;
                // $s = substr($data->deskripsi, 0, 261);
                // $data->deskripsi = substr($s, 0, strrpos($s, ' '));  ?>
            <!-- <q-carousel-slide name="" img-src="{{$data->file_foto}}">
                <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                    <div class="float-right text-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-title">{{$data->nama_wisata}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-white">{{$data->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </q-carousel-slide> -->
            <?php //$i++;
            // print_r($sliderNum[$i]); die(); ?>
        <!-- @endforeach -->
        <q-carousel-slide name="first" img-src="/image/home/Tipang_Mas.jpg">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-title text-white">Restoran Terapung Di Bakkara</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">Restoran Terapung bernama tipang mas menyuguhkan lokasi tenang dengan pemandangan danau dan jajaran perbukitan berlatar langit biru</p>
                        </div>
                    </div>
                </div>
            </div>
        </q-carousel-slide>
        <q-carousel-slide name="second" img-src="/image/home/Meditasi_Sibolahotang.jpg">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">Sibolahotang</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">Tempat meditasi yang cocok untuk wisatawan</p>
                        </div>
                    </div>
                </div>
            </div>
        </q-carousel-slide>
        <q-carousel-slide name="third" img-src="/image/home/Lumban_Binanga_Hatulian_Toba.jpg">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">Pantai Lumban Binanga Hatulian</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">Pantai pasir putih dengan danau biru yang menyegarkan mata</p>
                        </div>
                    </div>
                </div>
            </div>
        </q-carousel-slide>
        <q-carousel-slide name="fourth" img-src="/image/home/Bukit_Singgolom.jpg">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">Bukit Singgolom</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">Pemandangan Sunset yang indah dan memanjakan mata</p>
                        </div>
                    </div>
                </div>
            </div>
        </q-carousel-slide>
    </q-carousel>
</div>
<div class="row mt-4" id="berita-terbaru">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="sub-title">BERITA TERBARU</div>
            </div>
        </div>
        <div class="row background">
            <div class="container">
                <div class="row">
                    @foreach($berita as $data)
                        <div class="col-md-4 mt-4 mb-4">
                            <q-card class="my-card">
                                <img src="{{$data->file_foto}}" class="card-img2">
                                <div class="container">
                                    <a href="/berita-detail/{{$data->id_berita}}">
                                        <div class="card-title-home">{{$data->judul_berita}}</div>
                                    </a>
                                    <div class="card-caption-home">{{$data->isi_berita}}</div>
                                </div>

                                <q-card-section class="q-pt-none">
                                    <!-- KATEGORI WISATA / SENI DAN BUDAYA -->
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
                <div class="sub-title">WISATA DESA</div>
            </div>
        </div>
        <div class="row background">
            <div class="container">
                <div class="row">
                    @foreach($wisata as $data)
                        <div class="col-md-4 mt-4 mb-4">
                            <q-card class="my-card">
                                <img src="{{$data->file_foto}}" class="card-img2">

                                <q-card-section>
                                    <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                                        <div class="card-title-home">{{$data->nama_wisata}}</div>
                                    </a>
                                    <div class="card-caption-home">
                                        <?php
                                        $peng = json_decode($data->deskripsi, true);
                                        foreach ($peng['blocks'] as $temp) {
                                            if ($temp['type'] == 'paragraph') {
                                                echo substr($temp['data']['text'], 0, 200);
                                                break;
                                            }
                                        }
                                        ?>
                                    </div>
                                </q-card-section>

                                <q-card-section class="q-pt-none" style="text-transform: uppercase;">{{$data->kategoriWisata->nama_kategori}}</q-card-section>
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
                <div class="sub-title">Inspirasi</div>
            </div>
        </div>
        <div class="row background">
            <div class="container">
                <div class="row">
                        <a href="#" class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Alam-01.svg">
                            <div class="sub-title">ALAM</div>
                        </a>
                        <a class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Keluarga-01.svg">
                            <div class="sub-title">Keluarga</div>
                        </a>
                        <a href="#" class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Belanja-01.svg">
                            <div class="sub-title">Belanja</div>
                        </a>
                        <a href="#" class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Kuliner-01.svg">
                            <div class="sub-title">Kuliner</div>
                        </a>
                        <a href="#" class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Budaya-01.svg">
                            <div class="sub-title">Budaya</div>
                        </a>
                        <a href="#" class="col-md-2 mt-2 mb-2">
                            <img src="/icons/inspirasi/Adventure-01.svg">
                            <div class="sub-title">Adventure</div>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
