<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">

    <div class="row form-group">
        <div class="title">wisata alam</div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <div class="card">
                <a href="wisata-desa-detail"><img src="/image/image/WhatsApp Image 2020-10-27 at 00.40.41.jpeg" class="card-img2"></a>
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <a href="wisata-desa-detail"> <div class="card-title2">Sungai Aek Silang</div></a>
                    <div class="card-caption">Sungai Aek Silang membentang sepanjang Lembah Bakara. Area ini menjadi tempat rafting favorit, dimana kegiatan akan berakhir di Danau Toba.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <a href="wisata-desa-detail"><img src="/image/image/Bakara_Humbang_Hasundutan_6938.jpg" alt="Avatar" class="card-img2"></a>
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <a href="wisata-desa-detail"> <div class="card-title2">Air Terjun Janji</div></a>
                    <div class="card-caption">Selain percikan airnya, Air Terjun janji menyajikan pemandangan indah ke air deburan air sekaligus ke Danau Toba. Airnya yang jernih dan segar menjadi favorit ketika berkunjung ke tempat ini.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/Bakara_Humbang_Hasundutan_6955.jpg" alt="Avatar" class="card-img2">
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <div class="card-title2">Air Terjun Sipultak Hoda</div>
                    <div class="card-caption">Tempat ini dapat dijangkau dengan trekking kurang lebih 20 kilometer, berjalan kaki menyusuri perbukitan di lembah Bakara dengan hijaunya pemandangan sepanjang perjalanan.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/IMG_3684.jpg" class="card-img2">
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <div class="card-title2">Puncak Gotting</div>
                    <div class="card-caption">Tempat ini dapat dijangkau dengan trekking kurang lebih 20 kilometer, berjalan kaki menyusuri perbukitan di lembah Bakara dengan hijaunya pemandangan sepanjang perjalanan.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/Pearung_DanauToba_1549.jpg" alt="Avatar" class="card-img2">
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <div class="card-title2">Pulau Simamora</div>
                    <div class="card-caption">Sungai Aek Silang membentang sepanjang Lembah Bakara. Area ini menjadi tempat rafting favorit, dimana kegiatan akan berakhir di Danau Toba.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="/image/image/Bakara_Humbang_Hasundutan_6779.jpg" alt="Avatar" class="card-img2">
                <div class="container">
                    <div class="card-kategori">Wisata Alam</div>
                    <div class="card-title2">Lembah Bakara</div>
                    <div class="card-caption">Selain percikan airnya, Air Terjun janji menyajikan pemandangan indah ke air deburan air sekaligus ke Danau Toba. Airnya yang jernih dan segar menjadi favorit ketika berkunjung ke tempat ini.</div>
                </div>
            </div>
        </div>
    </div>
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#"><span class="icon-previous"></span></a></li>
        <li class="page-item page-new"><a class="page-link" href="#">1</a></li>
        <li class="page-item page-new"><a class="page-link" href="#">2</a></li>
        <li class="page-item page-new"><a class="page-link" href="#">3</a></li>
        <li class="page-item page-new"><a class="page-link" href="#">Next</a></li>
    </ul>
</div>    

@include('template.footer')