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
                    <img src="{{$data->file_foto}}" class="single-img">
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="sub-title">Galeri Lainnya</div>
            <div class="container"><a href="" class="link-galeri">Aktivitas Air</a></div>
            <div class="container"><a href="" class="link-galeri">Aktivitas Pantai</a></div>
            <div class="container"><a href="" class="link-galeri">Pemandangan Alam</a></div>
            <div class="container"><a href="" class="link-galeri">Kuliner Batak</a></div>
            <div class="container"><a href="" class="link-galeri">Aktivitas Keluarga</a></div>
            <div class="container"><a href="" class="link-galeri">Tempat Meditasi</a></div>
            <div class="container"><a href="" class="link-galeri">Budaya Batak Toba</a></div>
            <div class="container"><a href="" class="link-galeri">Tempat Memotret Sunset</a></div>
        </div>
    </div>
</div>
    

@include('template.footer')
