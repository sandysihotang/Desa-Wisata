<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container">
    <div class="row form-group">
        <div class="title">Detail Foto Wisata</div>
    </div>

    <div class="row form-group background">
        <div class="col-md-8">
            <div class="sub-title">{{ $namaKategori->nama_kategori }}</div>
            <div class="row form-group">
                @foreach($listSubKategori as $data)
                    <a href="/detail-foto/{{$data->id_sub_kat_galeri}}" class="col-md-6 form-group">
                        <?php $foto = App\Models\GaleriDesa::where('kategori_foto_id', '=', $data->id_sub_kat_galeri)->first(); ?>
                        <img src="{{ asset($foto->file_foto) }}" class="single-img"/>
                        <div class="foto-in">
                            <div class="foto-caption">{{$data->judul}}</div>
                        </div>
                    </a>
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

    <ul class="pagination justify-content-center">
       {{ $listSubKategori->links() }}
    </ul>
</div>

@include('template.footer')
