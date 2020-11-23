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
        <?php if(isset($slider1)){ ?>
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
        <?php }

        if(isset($slider2)){ ?>
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
        <?php }

        if(isset($slider3)){  ?>
            <q-carousel-slide name="third" img-src="{{ asset($slider3->file_foto) }}">
                <div class="absolute-bottom-right col-md-5 text-subtitle2 justify-content-center">
                    <div class="float-right text-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sub-title text-white">{{ $slider3->kategoriGaleri->judul }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </q-carousel-slide>
        <?php }

        if(isset($slider4)){ ?>
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
        <?php } ?>
    </q-carousel>