<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="row">
    <div class="title">Mengelola Menu</div>
    <div class="container">
        <a href="{{ URL('/admin-tambah-menu') }}" class="btn btn-new">Tambah Baru</a>
    </div>
</div>
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="row background" id="booking-wisata">
                    <div class="container">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="table-header text-left">Daftar Menu</div>
                                <div class="container background">
                                    <table class="table-style">
                                        <tr class="table-title">
                                            <th>Nama Menu</th>
                                            <th>Judul Halaman</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php $id = 0 ?>
                                        @foreach($menu as $data)
                                        <tr class="tab-content">
                                            <td>{{ $data->nama_menu }}</td>
                                            <td>{{ $data->judul_halaman }}</td>
                                            <td>
                                                @if($data->mempunyai_sub_menu)
                                                <a href="{{ URL('/tambah-submenu/'.$data->id_menu) }}"
                                                   class="btn btn-new">Sub Menu
                                                </a>
                                                @endif
                                                <a href="{{ URL('/edit-menu/'.$data->id_menu) }}"
                                                   class="btn btn-new">Edit</a>
                                                <button class="btn btn-new" data-toggle="modal"
                                                        data-target="#Modal{{ $id }}">Hapus
                                                </button>
                                                <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Konfirmasi Hapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus Menu ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup
                                                                </button>
                                                                <a href="{{ URL('/menu/delete/'.$data->id_menu) }}"
                                                                   type="button" class="btn btn-primary">Hapus</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

