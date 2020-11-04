<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Artikel</div>
        <div class="container">
            <button class="btn btn-new">Tambah Baru</button>
        </div>
        <div class="container">
            <ul class="pagination pull-right page-all">
                <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left" aria-hidden="true"></b></a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
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
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                        <tr class="table-content">
                            <td>11 Oktober 2020</td>
                            <td>Indahnya Bakara</td>
                            <td>Wisata Alam</td>
                            <td>Yohanssen Sinaga</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <tr class="table-content">                            
                            <td>5 September 2020</td>
                            <td>Merasakan Kehidupan Desa di Marbun Toruan</td>
                            <td>Galeri</td>
                            <td>Arnaldo Sinaga</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <tr class="table-content">
                            <td>4 September 2020</td>
                            <td>Piknik Keluarga di Air Terjun Janji</td>
                            <td>Keluarga</td>
                            <td>Verawaty</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <tr class="table-content">                            
                            <td>9 Agustus 2019</td>
                            <td>Berkunjung ke Istana Sisingamangaraja</td>
                            <td>Budaya</td>
                            <td>Desy Isabel</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <tr class="table-content">
                            <td>11 Juli 2019</td>
                            <td>Tempat Meditasi Terbaik di Marbun Toruan</td>
                            <td>Alam</td>
                            <td>Cynthia Nababan</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <tr class="table-content">                            
                            <td>5 April 2019</td>
                            <td>Pengalaman Menanam Padi di Marbun Toruan</td>
                            <td>Budaya</td>
                            <td>Margaretha</td>
                            <td>
                                <a href="/detail-artikel" class="btn btn-new">Lihat</a>
                                <a href="/detail-artikel" class="btn btn-new">Edit</a>
                                <a href="/detail-artikel" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
