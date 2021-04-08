<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
        <div class="title">{{ $kategori->nama_kategori}}</div>
    </div>

    <div class="row form-group" id="berita-terbaru">
        @if(count($list))
        @foreach($list as $data)
        <div class="col-md-4 form-group">
            <q-card class="my-card">
                <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"><img src="{{$data->file_foto}}"
                                                                            class="card-img2"></a>
                <div class="container">
                    <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}">
                        <div class="card-title2">{{$data->nama_wisata}}</div>
                    </a>
                    <div class="card-caption">
                        <?php echo(strip_tags($data->deskripsi)); ?>
                    </div>
                    <div class="card-link">
                        <a href="{{ URL('/wisata-desa-detail/'.$data->id_obj_wisata) }}"
                           style="padding-bottom-bottom: 10px">Baca Selengkapnya</a>
                    </div>
                </div>
            </q-card>
        </div>
        @endforeach
        @else
        <div class="col-md-12 mt-lg-5 mb-lg-5">
            <br>
            <div class="jumbotron jumbotron-fluid w-100">
                <div class="container">
                    <h5 class="display-5  d-flex justify-content-center">Informasi {{ $kategori->nama_kategori}} belum
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
        <div class="container background" style="height: 50px">
            <div class="card-title-home">Halaman ini diakses sebanyak: kali</div>
        </div>
    </div> -->
</div>

@include('template.footer2')
