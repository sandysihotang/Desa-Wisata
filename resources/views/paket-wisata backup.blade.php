<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@include('template.header')

<div class="container" id="homes">
    <div class="row form-group">
        <q-carousel
            arrows
            animated
            v-model="slide"
            :autoplay="true"
            height="400px"
            prev-icon="fa fa-angle-left"
            next-icon="fa fa-angle-right"
            style="max-height: 400px !important; width: 100%;">
            <?php if(isset($slider[0])){ ?>
                <q-carousel-slide name="first" img-src="{{ $slider[0]->file_foto }}">
                    <a href="/detail-paket-wisata/{{$slider[0]->id_pkt_wisata}}">
                        <div class="carousel-in">
                            <div class="carousel-paket">{{ $slider[0]->nama_paket }}</div>
                            <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[0]->harga_paket)</div>
                        </div>
                    </a>
                </q-carousel-slide>
            <?php }

            if(isset($slider[1])){ ?>
                <q-carousel-slide name="second" img-src="{{$slider[1]->file_foto}}">
                    <a href="/detail-paket-wisata/{{$slider[1]->id_pkt_wisata}}">
                        <div class="carousel-in">
                            <div class="carousel-paket">{{ $slider[1]->nama_paket }}</div>
                            <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[1]->harga_paket)</div>
                        </div>
                    </a>
                </q-carousel-slide>
            <?php }

            if(isset($slider[2])){ ?>
                <q-carousel-slide name="third" img-src="{{$slider[2]->file_foto}}">
                    <a href="/detail-paket-wisata/{{$slider[2]->id_pkt_wisata}}">
                        <div class="carousel-in">
                            <div class="carousel-paket">{{ $slider[2]->nama_paket }}</div>
                            <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[2]->harga_paket)</div>
                        </div>
                    </a>
                </q-carousel-slide>
            <?php } ?>
        </q-carousel>
    </div>

    <div class="row form-group">
        @foreach($list as $data)
            <div class="col-md-4 form-group">
                <div class="card">
                    <a href="detail-paket-wisata/{{$data->id_pkt_wisata}}"><img src="{{$data->file_foto}}" alt="Avatar" class="card-img2">
                        <div class="card-in">
                            <div class="card-paket">{{$data->nama_paket}}</div>
                            <div class="card-paket-capt">mulai dari<br/>@currency($data->harga_paket)</div>
                        </div>
                    </a>
                    <div class="container">
                        <a href="detail-paket-wisata/{{$data->id_pkt_wisata}}">
                            <div class="card-title2">{{$data->nama_paket}}</div>
                        </a>
                        <div class="card-caption-home" style="white-space: pre-line;">
                            <?php echo substr($data->jadwal, 0, 200); ?>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach        
    </div>

    <ul class="pagination justify-content-center">
       {{ $list->links() }}
    </ul>
</div>


@include('template.footer')
