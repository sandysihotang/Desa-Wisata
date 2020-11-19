<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row q-pa-md" id="homes">
    <q-carousel
        arrows
        animated
        v-model="slide"
        :autoplay="true"
        height="400px"
        swipeable
        padding
        prev-icon="fa fa-angle-left"
        next-icon="fa fa-angle-right"
        transition-prev="scale"
        transition-next="scale"
        style="max-height: 400px !important; width: 100%;"
    >
        <q-carousel-slide name="first" img-src="{{ $slider1->file_foto }}">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-title text-white">{{ $slider1->nama_wisata }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">
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
                </div>
            </div>
        </q-carousel-slide>
        <q-carousel-slide name="second" img-src="{{ $slider2->file_foto }}">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">{{ $slider2->nama_paket }}</div>
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

        <?php $datax = json_decode($slider3->file_foto);
            $picture = $datax[0]; ?>
        <q-carousel-slide name="third" img-src="{{ asset('/image/galeri/'.$picture) }}">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">{{ $slider3->judul }}</div>
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
        <q-carousel-slide name="fourth" img-src="{{ $slider4->gambar }}">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title text-white">{{ $slider4->judul_pengalaman }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-white">
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
                                <div class="card-caption-home">
                                    <?php
                                    $peng = json_decode($data->isi_berita, true);
                                    foreach ($peng['blocks'] as $temp) {
                                        if ($temp['type'] == 'paragraph') {
                                            echo substr($temp['data']['text'], 0, 200);
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
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

                            <q-card-section class="q-pt-none" style="text-transform: uppercase;">
                                {{$data->kategoriWisata->nama_kategori}}
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
