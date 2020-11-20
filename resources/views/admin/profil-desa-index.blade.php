<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Profil Desa</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/tambah-profil-desa') }}" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $list->links() }}                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue">
            <div class="table-header" style="width: 100%;">Daftar Artikel</div>
            <table class="table-style background" style="width: 100%;">
                <tr class="table-title">
                    <th>No</th>
                    <th>Judul</th>
                    <!-- <th>Kategori Menu</th> -->
                    <th>Aksi</th>
                </tr>
                <?php $id = 1;  ?>
                @foreach($list as $data)
                <tr class="table-content">
                    <td>{{$id}}</td>
                    <td>{{ $data->nama_profil }}</td>
                    <td>
                        <a href="{{ URL('/lihat-profil-desa/'.$data->id_profil) }}" class="btn btn-new">Lihat
                        </a>
                        <a href="{{ URL('/edit-profil-desa/'.$data->id_profil) }}" class="btn btn-new">Edit</a>
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
                                        Apakah anda yakin ingin menghapus artikel ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <a href="{{ URL('/detail-profil-desa/delete/'.$data->id_profil) }}" type="button" class="btn btn-primary">Hapus</a>
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


@include('admin.layouts.footer')
