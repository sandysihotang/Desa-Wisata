<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="title">Foto Wisata</div>

    <div class="row background" id="berita-terbaru">
        <div class="container">
            <div class="row form-group">
                @if(count($listKategori))
                @foreach($listKategori as $data)
                <div class="col-md-4 form-group">
                    <q-card class="my-card">
                        <a href="galeri-berdasarkan-aktivitas/{{$data->id_kategori_galeri}}">
                            <img src="{{$data->file_foto_sampul}}" class="card-img2">
                            <div class="container">
                                <div class="foto-title">{{$data->nama_kategori}}</div>
                            </div>
                        </a>
                    </q-card>
                </div>
                @endforeach
                @else
                <div class="col-md-12 mt-lg-5 mb-lg-5 w-100">
                    <br>
                    <div class="jumbotron jumbotron-fluid w-100">
                        <div class="container">
                            <h5 class="display-5  d-flex justify-content-center">Informasi galeri foto belum
                                tersedia</h5>
                        </div>
                    </div>
                    <br>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row background" style="height: 50px;">
        <div class="container">
            <ul class="pagination justify-content-center">
                {{ $listKategori->links() }}
            </ul>
        </div>
    </div>
</div>


@include('template.footer2')
