<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Artikel</div>
        <div class="container">
            <button class="btn btn-new">Tambah Baru</button>
        </div>
        <div class="container">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                <li class="page-item page-new"><a class="page-link" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Pesanan Paket Wisata</div>
                <div class="container background">
                    <table class="table-style">
                        <tr class="table-title">
                            <th>No. Pesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Paket Wisata</th>
                            <th>Customer</th>
                            <th>Aksi</th>
                        </tr>
                        <tr class="table-content">
                            <td>2008-0008</td>
                            <td>08 Agustus 2020</td>
                            <td><a href="detail-paket-wisata" class="link-galeri">Jelajah Bakara 2D1N</a></td>
                            <td>Riyanthi Sianturi</td>
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                        <tr class="table-content">
                            <td>2009-0008</td>
                            <td>09 September 2020</td>
                            <td><a href="detail-paket-wisata" class="link-galeri">Wisata Keluarga 4D3N</a></td>
                            <td>Cynthia N</td>  
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Artikel Pengalaman Wisata</div>
                <div class="container background">
                    <table class="table-style background">
                        <tr class="table-title">
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                        <tr class="table-content">
                            <td>11 Oktober 2020</td>
                            <td>Indahnya Bakara</td>
                            <td>Yohanssen Sinaga</td>
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                        <tr class="table-content">                            
                            <td>5 Septem 2020</td>
                            <td>Merasakan Kehidupan Desa di Marbun Toruan</td>
                            <td>Arnaldo Sinaga</td>
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
