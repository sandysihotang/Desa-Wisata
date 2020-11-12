<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container-fluid">
    <div class="title">{{$pengalaman->judul_pengalaman}}</div>
    <div class="row background">
        <div class="container">
            <div class="detail-body">ditulis oleh <a href="#" class="link_galeri">{{$pengalaman->penulis->nama_lengkap}}</a> | {{$pengalaman->tanggal}}</div>
            <div class="detail-body">{{$pengalaman->isi_pengalaman}}</div>
            <div class="sub-title">LOKASI WISATA</div>
            <div class="detail-body">
                Pagi di Toba, angin semilir sejuk, sinar matahari hangat menyentuh kulit. Saya menuju desa Pardinggaran. Sepanjang perjalanan saya menikmati hijaunya persawahan dan langit yang biru. Jalanan sudah diaspal rapi sepanjang desa. Terdapat 2 lokasi wisata yang saya kunjungi, yaitu:
                <ol>
                    <li>Pantai Pardinggaran (desa Pardinggaran)</li>
                    <li>Pantai Hatulian (desa Lumban Binanga)</li>
                </ol>
            </div>
            <div class="sub-title">RUTE PERJALANAN DAN WAKTU TEMPUH</div>
            <div class="detail-body">
                <p>Untuk mencapai desa Pardinggaran, kita bisa masuk melalui Simpang Sirongit, Laguboti. Menyusuri jalan selama 15 menit, sampailah di pantai Pardinggaran. Jika terus mengikuti arah jalan, sekitar 5 menit, kita akan menjumpai Pantai Hatulian. Dari Hatulian di Lumban Binanga kita bisa menyusuri jalan desa hingga sampai ke Simpang Empat Laguboti. Desa Pardinggaran dan desa Lumban Binanga berada di kecamatan Laguboti.</p>
                <p>Pemerintah kabupaten Toba Samosir telah menata kedua kawasan wisata untuk memfasilitasi pengunjung yang datang. Ada tempat-tempat berteduh yang menghadap danau. Hanya saja perlu catatan besar bahwa setiap pengunjung hendaknya TIDAK MEMBUANG SAMPAH SEMBARANGAN. Kedua tempat ini cukup landai dan luas untuk bermain air. Dan jangan lupa membawa bekal makanan sekiranya lapar sehabis bermain air, karena di kedua tempat sampai saat ini hanya terdapat warung kecil yang menjual makanan ringan. Selamat menikmati keindahan Danau Toba.</p>
            </div>
            <div class="sub-title">FOTO DI PARDINGGARAN</div>
            <div class=" row detail-body">
                <div class="col-md-4">
                    <img src="/image/image/04_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                    <p>Lokasi Pardinggaran</p>
                </div>

                <div class="col-md-4">
                    <img src="/image/image/06_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                    <p>Jalan rapi sepanjang danau</p>
                </div>
                <div class="col-md-4">
                    <img src="/image/image/01_Pantai_Pardinggaran_Toba_Riyanthi_Sianturi.jpg" class="card-img2">
                    <p>Aktivitas nelayan di pagi hari</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
