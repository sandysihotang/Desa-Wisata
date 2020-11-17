<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container">
<div class="row form-group">
    <div class="title">Detail Foto Wisata</div>
</div>

<div class="row form-group background">
    <div class="col-md-8">
        <div class="sub-title">Foto Kiriman Wisatawan</div>
        <div class="row form-group">
            @foreach($listSubKategori as $data)
                <a href="/detail-foto/{{$data->id_galeri}}" class="col-md-6 form-group">
                    <?php $datax = json_decode($data->file_foto);
                        $picture = $datax[0]; ?>
                    <img src="{{ asset('/image/galeri/'.$picture) }}" class="single-img"/>
                    <div class="foto-in">
                        <div class="foto-caption">{{$data->judul}}</div>
                    </div>
                </a>
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

<ul class="pagination" style="text-align: center">
    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
    </div>

@include('template.footer')
