<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4">
    <div class="container background" id="homes">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="form-group carousel slide" data-ride="carousel">
                    <div class="carousel-inner" align="center">
                        <?php if (isset($slider[0])) { ?>
                            <div class="carousel-item active">
                                <img src="{{ asset($slider[0]->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <a href="detail-paket-wisata/{{$slider[0]->id_pkt_wisata}}">
                                    <div class="carousel-in">
                                        <div class="carousel-paket">{{ $slider[0]->nama_paket }}</div>
                                        <div class="carousel-paket">{{ $slider[0]->paket }}</div>
                                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[0]->harga_paket)
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                        if (isset($slider[1])) { ?>
                            <div class="carousel-item">
                                <img src="{{ asset($slider[1]->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <a href="detail-paket-wisata/{{$slider[1]->id_pkt_wisata}}">
                                    <div class="carousel-in">
                                        <div class="carousel-paket">{{ $slider[1]->nama_paket }}</div>
                                        <div class="carousel-paket">{{ $slider[1]->paket }}</div>
                                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[1]->harga_paket)
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                        if (isset($slider[2])) { ?>
                            <div class="carousel-item">
                                <img src="{{ asset($slider[2]->file_foto) }}" class="img-fluid d-block w-100 h-auto"
                                     style="object-fit: cover; max-height: 400px; width: 1200px !important">
                                <a href="detail-paket-wisata/{{$slider[2]->id_pkt_wisata}}">
                                    <div class="carousel-in">
                                        <div class="carousel-paket">{{ $slider[2]->nama_paket }}</div>
                                        <div class="carousel-paket">{{ $slider[2]->paket }}</div>
                                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[2]->harga_paket)
                                        </div>
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
        <div class="row form-group">
            @if(count($list))
            @foreach($list as $data)
            <div class="col-md-4 form-group">
                <div class="card">
                    <a href="detail-paket-wisata/{{$data->id_pkt_wisata}}">
                        <img src="{{$data->file_foto}}" class="card-img2">
                        <div class="card-in">
                            <div class="card-paket">{{$data->nama_paket}}</div>
                            <div class="card-paket">{{$data->paket}}</div>
                            <div class="card-paket-capt">mulai dari<br/>@currency($data->harga_paket)</div>
                        </div>
                    </a>
                    <div class="container">
                        <a href="detail-paket-wisata/{{$data->id_pkt_wisata}}">
                            <div class="card-title2">{{$data->nama_paket}} - {{ $data->paket }}</div>
                        </a>
                        <div class="card-caption-home">
                            <?php echo(strip_tags($data->keterangan)); ?>
                        </div>
                        <div class="card-link">
                            <a href="{{ URL('/detail-paket-wisata/'.$data->id_pkt_wisata) }}"
                               style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
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

        <ul class="pagination justify-content-center">
            {{ $list->links() }}
        </ul>

        <!-- <div class="row">
            <div class="container">
                <div class="card-title-home">Halaman ini diakses sebanyak:  kali</div>
            </div>
        </div>    -->
    </div>
</div>

@include('template.footer2')
