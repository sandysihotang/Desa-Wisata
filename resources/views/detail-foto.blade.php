<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Detail Foto Wisata</div>
    </div>

    <div class="row form-group">
        <div class="col-md-8">
            <div class="sub-title">Dari Bandung ke Danau Toba</div>
            <div class="row form-group">
                @foreach($listFoto as $data)
                    <?php foreach (json_decode($data->file_foto)as $picture) { ?>
                        <img src="{{ asset('/image/galeri/'.$picture) }}" class="single-img"/>
                    <?php } ?>
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
