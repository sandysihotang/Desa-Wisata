<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<style type="text/css">
    @font-face {
        font-family: OptimusPrinceps;
        src: url('{{ public_path('fonts/BentonSans Black.otf') }}');
    }
</style>
@include('template.header')

<div class="row form-group">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-style d-block w-100" src="/image/image/DSC01476.jpg" alt="First slide">
                <div class="carousel-in">
                    <div class="carousel-paket">Jelajah Bakara</div>
                    <div class="carousel-paket-capt">2D1N</div>
                    <div class="carousel-paket-capt">mulai dari<br/> Rp. 800.000</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <div class="detail-title">Jadwal Open Trip</div>
        <div class="detail-body">17-18 November 2020<br/>20-21 November 2020<br/>24-25 Desember 2020</div>

        <div class="detail-title">Harga</div>
        <div class="detail-body">Rp 880.000,- / orang</div>

        <div class="detail-title">Harga Termasuk</div>
        <div class="detail-body">
            <ul>
                <li>- Transportasi darat selama trip</li>
                <li>- Satu malam menginap di homestay Marbun Toruan</li>
                <li>- Biaya retribusi</li>
                <li>- Tiket masuk Istana Sisingamangaraja</li>
                <li>- Makan 2x</li>
                <li>- Air mineral</li>
                <li>- Guide lokal</li>
            </ul>
        </div>

        <div class="detail-title">Harga Tidak Termasuk</div>
        <div class="detail-body">
            <ul>
                <li>- Tiket pesawat ke Bakara</li>
                <li>- Tipping untuk guide</li>
                <li>- Pengeluaran pribadi</li>
            </ul>
        </div>
    </div>

    <div class="col-md-4">

    </div>

    <div class="col-md-4">

    </div>
</div>
    

@include('template.footer')
