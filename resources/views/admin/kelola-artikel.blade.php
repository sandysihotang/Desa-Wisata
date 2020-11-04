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
                <li class="page-item"><a class="page-link" href="#"><b class="fa fa-angle-left" aria-hidden="true"></b></a></li>
                <li class="page-item page-new"><a class="page-link" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
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