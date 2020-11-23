<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@include('template.header')

<div class="container" id="homes">
    <div id="carouselExampleCaptions" class="form-group carousel slide" data-ride="carousel">
        <div class="carousel-inner" align="center">
            <?php if(isset($slider[0])){ ?>
                <div class="carousel-item active">
                    <img src="{{ asset($slider[0]->file_foto) }}" class="img-fluid d-block w-100 h-auto"  style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-in">
                        <div class="carousel-paket">{{ $slider[0]->nama_paket }}</div>
                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[0]->harga_paket)</div>
                    </div>
                </div>
            <?php }
            if(isset($slider[1])){ ?>            
                <div class="carousel-item">
                    <img src="{{ asset($slider[1]->file_foto) }}" class="img-fluid d-block w-100 h-auto" style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-in">
                        <div class="carousel-paket">{{ $slider[0]->nama_paket }}</div>
                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[0]->harga_paket)</div>
                    </div>
                </div>
            <?php } 
            if(isset($slider[2])){ ?>
                <div class="carousel-item">
                    <img src="{{ asset($slider[2]->file_foto) }}" class="img-fluid d-block w-100 h-auto"  style="object-fit: cover; max-height: 400px; width: 1200px !important">
                    <div class="carousel-in">
                        <div class="carousel-paket">{{ $slider[0]->nama_paket }}</div>
                        <div class="carousel-paket-capt">mulai dari<br/>@currency($slider[0]->harga_paket)</div>
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
