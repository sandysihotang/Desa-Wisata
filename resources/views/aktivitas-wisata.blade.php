<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
    </div>
        
    <div class="row form-group" id="berita-terbaru">
        @foreach($aktivitas as $data)
            <div class="col-md-4 form-group">
                <q-card class="my-card">
                    <a href="/aktivitas-wisata-detail/{{$data->aktivitas_id}}"><img src="{{$data->file_foto}}" class="card-img2"></a>
                    <div class="container">
                        <a href="/aktivitas-wisata-detail/{{$data->aktivitas_id}}"> <div class="card-title2">{{$data->judul}}</div></a>
                        <div class="card-caption">
                            <?php echo(strip_tags($data->deskripsi)); ?>
                        </div>
                        <div class="card-link">
                            <a href="{{ URL('/aktivitas-wisata-detail/'.$data->aktivitas_id) }}" style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                        </div>
                    </div>
                </q-card>
            </div>
        @endforeach
    </div>

    <ul class="pagination justify-content-center">
       {{ $aktivitas->links() }}
    </ul>
    <!-- <div class="row">
        <div class="container background" style="height: 50px">
            <div class="card-title-home">Halaman ini diakses sebanyak: kali</div>
        </div>
    </div> -->
</div>    

@include('template.footer2')