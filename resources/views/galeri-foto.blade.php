<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="title">Foto Wisata</div>

    <div class="row background">
        <div class="row form-group">
            @foreach($listKategori as $data)
                <div class="col-md-4 form-group">
                    <a href="galeri-berdasarkan-aktivitas/{{$data->id_kategori_galeri}}" class="card">
                        <img src="{{$data->file_foto_sampul}}" class="card-img2">
                        <div class="container">
                            <div class="foto-title">{{$data->nama_kategori}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <ul class="pagination justify-content-center">
       {{ $listKategori->links() }}
    </ul>
</div>
    

@include('template.footer')
