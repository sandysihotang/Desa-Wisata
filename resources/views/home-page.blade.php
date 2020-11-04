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
        <q-carousel-slide name="first" img-src="/image/home/Tipang_Mas.jpg">
            <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                <div class="float-right text-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title">Restoran Terapung Di Bakkara</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Restoran Terapung bernama tipang mas menyuguhkan lokasi tenang dengan pemandangan danau
                                dan
                                jajaran
                                perbukitan berlatar langit biru</p>
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
                            <div class="sub-title">Sibolahotang</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Tempat meditasi yang cocok untuk wisatawan</p>
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
                            <div class="sub-title">Pantai Lumban Binanga Hatulian</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Pantai pasir putih dengan danau biru yang menyegarkan mata</p>
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
                            <div class="sub-title">Bukit Singgolom</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Pemandangan Sunset yang indah dan memanjakan mata</p>
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
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/04_Istana_Sisingamangaraja_Riyanthi_Sianturi.jpg" class="card-img2">

                            <div class="container">
                                <div class="card-title-home">Artefak Kerajaan Sisingamangaraja</div>
                                <div class="card-caption-home">Kita dapat melihat makam Raja Sisingamangaraja XI di lokasi
                                    ini, termasuk rumah adat batak lengkap dengan gorga-nya yang mewah
                                </div>
                            </div>

                            <q-card-section class="q-pt-none">
                                KATEGORI WISATA / SENI DAN BUDAYA
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/04_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi-1.jpg" class="card-img2">

                            <q-card-section>
                                <div class="card-title-home">Matahari Terbit di Danau Toba</div>
                                <div class="card-caption-home">Pemandangan Danau Toba yang luar biasa bisa dinikmati di sini. Pada lokasi ini kta bisa memandang Pulau Sibandang, Muara, Balige dan Samosir di kejauhan.
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                GALERI   /   KELUARGA
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/02_Air_Terjun_Janji_Riyanthi_Sianturi.jpg" class="card-img2">

                            <q-card-section>
                                <div class="card-title-home">Air Terjun Janji</div>
                                <div class="card-caption-home">Selain menikmati percikan airnya saat berfoto, kita bisa mandi di area pemandian dengan air yang segar.
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                KATEGORI WISATA   /   ADVENTURE
                            </q-card-section>
                        </q-card>
                    </div>
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
        <div class="row" style="background-color: #f7f7f7">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/IMG_3684.JPG" class="card-img2">

                            <q-card-section>
                                <div class="card-title-home">Puncak Gotting</div>
                                <div class="card-caption-home">
                                    Puncak Gotting berada di ketinggian, tempat bersantai sambil memandang Danau Toba yang luas dari berbagai sisi. Jika ingin sambil berolahraga, dapat berjalan kaki atau bersepeda.
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WISATA DESA / ADVENTURE
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/IMG_3668.JPG" class="card-img2">

                            <q-card-section>
                                <div class="card-title-home">Terasering Desa</div>
                                <div class="card-caption-home">
                                    Kegiatan menanam padi menjadi tradisi yang dapat dijadikan wisata keluarga. Tiap keluarga dapat bermain sambil belajar menanam padi bersama dengan para petani.
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WISATA DESA  /   KELUARGA
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/image/IMG_3650.JPG" class="card-img2">

                            <q-card-section>
                                <div class="card-title-home">Lembah Bakara</div>
                                <div class="card-caption-home">
                                    Pemandangan aliran sungai Aek Silang yang mengarah ke Danau Toba, perumahan penduduk dan persawarahan yang dikelilingi oleh jajaran perbukitan hijau, membentuk pemandangan indah Lembah Bakara.
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WIISATA DESA  /   ALAM
                            </q-card-section>
                        </q-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
