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
            <a href="detail-foto" class="col-md-6">
                <img src="/image/image/02_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                <div class="foto-in">
                    <div class="foto-caption">Dari Bandung ke Danau Toba</div>
                </div>
            </a>
            <div class="col-md-6">
                <img src="/image/image/02_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                <div class="foto-in">
                    <div class="foto-caption">Tidak Rugi Bangun Pagi</div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <img src="/image/image/09_Pantai_Binasi_Sorkam_Sibolga_Riyanthi_Sianturi.jpg" class="card-img2">
                <div class="foto-in">
                    <div class="foto-caption">Piknik Santai di Pantai</div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/image/image/07_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                <div class="foto-in">
                    <div class="foto-caption">Hanya Ada di Danau Toba</div>
                </div>
            </div>
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
