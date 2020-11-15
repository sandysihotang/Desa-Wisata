<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Artikel</div>
        <div class="container">
            <a href="{{ URL('/tambah-artikel') }}" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <ul class="pagination pull-right">
                <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left"
                                                                                aria-hidden="true"></b></a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right"
                                                                                         aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue">
            <div class="table-header" style="width: 100%;">Artikel Pengalaman Wisata</div>
            <table class="table-style background" style="width: 100%;">
                <tr class="table-title">
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
                <?php $id = 1;  ?>
                @foreach($pengalaman as $data)
                <tr class="table-content">
                    <td>
                        <date-template date="{{ $data->tanggal }}"></date-template>
                    </td>
                    <td>{{ $data->judul_pengalaman }}</td>
                    <td>{{ $data->kategoriWisata->nama_wisata }}</td>
                    <td>{{ $data->penulis->nama_lengkap }}</td>
                    <td>
                        <a href="{{ URL('/lihat-artikel/'.$data->id_pengalaman) }}" class="btn btn-new">Lihat
                        </a>
                        <a href="{{ URL('/edit-artikel/'.$data->id_pengalaman) }}" class="btn btn-new">Edit</a>
                        <button class="btn btn-new" data-toggle="modal" data-target="#Modal{{ $id }}">Hapus</button>
                        <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus pengalaman wisata ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <a href="{{ URL('/detail-artikel/delete/'.$data->id_pengalaman) }}" type="button" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $id++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>


@include('template.footer')
