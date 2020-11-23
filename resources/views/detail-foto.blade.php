<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Detail Foto Wisata</div>
    </div>

    <div class="row form-group">
        <div class="col-md-8">
            <div class="sub-title">{{ $subKat->judul }}</div>
            <div class="row form-group">
                @foreach($listFoto as $data)
                    <img src="{{ asset($data->file_foto) }}" class="single-img"/>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="sub-title">Galeri Lainnya</div>
            @foreach($listKategori as $data)
                <div class="container"><a href="/galeri-berdasarkan-aktivitas/{{ $data->id_kategori_galeri }}" class="link-galeri">{{ $data->nama_kategori }}</a></div>
            @endforeach
        </div>
    </div>
</div>
    

@include('template.footer')
