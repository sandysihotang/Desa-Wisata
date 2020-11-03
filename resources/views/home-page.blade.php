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
                            <div class="text-uppercase"><h5>Restoran Terapung Di Bakkara</h5></div>
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
                            <div class="text-uppercase"><h5>Sibolahotang</h5></div>
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
                            <div class="text-uppercase"><h5>Pantai Lumban Binanga Hatulian</h5></div>
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
                            <div class="text-uppercase"><h5>Bukit Singgolom</h5></div>
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
                <h4 class="text-uppercase">BERITA TERBARU</h4>
            </div>
        </div>
        <div class="row" style="background-color: #f7f7f7">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/Bakara_Humbang_Hasundutan_6938.jpg">

                            <q-card-section>
                                <div class="text-h6">ARTEFAK KERAJAAN SISINGAMANGARAJA</div>
                                <div class="text-subtitle3">Kita dapat melihat makam Raja Sisingamangaraja XI dilokasi
                                    ini, termasuk rumah adat batak lengkap dengan gorga-nya yang mewah
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                KATEGORI WISATA/ SENI DAN BUDAYA
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/DSC01372.JPG">

                            <q-card-section>
                                <div class="text-h6">ARTEFAK KERAJAAN SISINGAMANGARAJA</div>
                                <div class="text-subtitle3">Kita dapat melihat makam Raja Sisingamangaraja XI dilokasi
                                    ini, termasuk rumah adat batak lengkap dengan gorga-nya yang mewah
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                KATEGORI WISATA/ SENI DAN BUDAYA
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/DSC01536.JPG">

                            <q-card-section>
                                <div class="text-h6">ARTEFAK KERAJAAN SISINGAMANGARAJA</div>
                                <div class="text-subtitle3">Kita dapat melihat makam Raja Sisingamangaraja XI dilokasi
                                    ini, termasuk rumah adat batak lengkap dengan gorga-nya yang mewah
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                KATEGORI WISATA/ SENI DAN BUDAYA
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
                <h4 class="text-uppercase">WISATA DESA</h4>
            </div>
        </div>
        <div class="row" style="background-color: #f7f7f7">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/DSC01408.JPG">

                            <q-card-section>
                                <div class="text-h6">PUNCAK GOTTING</div>
                                <div class="text-subtitle3">
                                    Puncak gotting berada diketinggian, tempat bersantai sambil
                                    memandang Danau Toba yang luas dari berbagai sisi.
                                    jika ingin sambil berolahraga, dapat berjalan kaki atau sepeda
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WISATA DESA / ADVENTURE
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/DSC01476.JPG">

                            <q-card-section>
                                <div class="text-h6">PUNCAK GOTTING</div>
                                <div class="text-subtitle3">
                                    Puncak gotting berada diketinggian, tempat bersantai sambil
                                    memandang Danau Toba yang luas dari berbagai sisi.
                                    jika ingin sambil berolahraga, dapat berjalan kaki atau sepeda
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WISATA DESA / ADVENTURE
                            </q-card-section>
                        </q-card>
                    </div>
                    <div class="col-md-4 mt-4 mb-4">
                        <q-card class="my-card">
                            <img src="/image/home/DSC01411.JPG">

                            <q-card-section>
                                <div class="text-h6">PUNCAK GOTTING</div>
                                <div class="text-subtitle3">
                                    Puncak gotting berada diketinggian, tempat bersantai sambil
                                    memandang Danau Toba yang luas dari berbagai sisi.
                                    jika ingin sambil berolahraga, dapat berjalan kaki atau sepeda
                                </div>
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                WISATA DESA / ADVENTURE
                            </q-card-section>
                        </q-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
