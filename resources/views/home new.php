
            if(isset($slider2)){ ?>            
                <div class="carousel-item">
                    <img src="{{ asset($slider2->file_foto) }}" class="d-block" height="400px" width="1230" style="object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block absolute-bottom-right">
                        <h5 class="slider-title text-white">{{ $slider2->paket_wisata }}</h5>
                    </div>
                </div>
            <?php } 
            if(isset($slider3)){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider3->file_foto) }}" class="d-block" height="400px" width="1230" style="object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block absolute-bottom-right">
                        <h5 class="slider-title text-white">{{ $slider3->judul }}</h5>
                    </div>
                </div>
            <?php }
            if(isset($slider4)){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider3->file_foto) }}" class="d-block" height="400px" width="1230" style="object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block absolute-bottom-right">
                        <h5 class="slider-title text-white">{{ $slider4->judul_pengalaman }}</h5>
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
            <?php }