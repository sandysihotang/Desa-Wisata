<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="title">Foto Wisata</div>

    <div class="row background">
        <div class="row form-group">
            <div class="col-md-4">
                <a href="galeri-berdasarkan-aktivitas" class="card">
                    <img src="/image/image/02_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Foto Kiriman Wisatawan</div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/05_Pantai_Binasi_Sorkam_Sibolga_Riyanthi_Sianturi.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Aktivitas Air</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/09_Pantai_Binasi_Sorkam_Sibolga_Riyanthi_Sianturi.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Aktivitas Pantai</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/02_Bukit_Singgolom_Toba_Riyanthi_Sianturi.JPG.jpg" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Pemandangan Alam</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/08_Pantai_Binasi_Sorkam_Sibolga_Riyanthi_Sianturi.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Kuliner Batak</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/02_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Aktivitas Keluarga</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/10_Lumban_Binanga_Hatulian_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Tempat Meditasi</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/05_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Budaya Batak Toba</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="/image/image/03_Bukit_Singgolom_Toba_Riyanthi_Sianturi.JPG.JPG.jpg" alt="Avatar" class="card-img2">
                    <div class="container">
                        <div class="foto-title">Tempat Memotret Sunset</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left" aria-hidden="true"></b></a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
    </ul>
</div>
    

@include('template.footer')
