<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="row">
    <div class="title">Mengelola Sub Menu: {{ $menu->nama_menu }}</div>
    <div class="container">
        <a href="{{ URL('/admin-tambah-submenu/'.$menu->id_menu) }}" class="btn btn-new">Tambah Sub Menu</a>
    </div>
</div>
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="row" id="booking-wisata" style="width: 100%">
                    <div class="table-responsive container">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="table-header text-left">Daftar Sub Menu</div>
                                <div class="container">
                                    <table class="table-style">
                                        <tr class="table-title">
                                            <th>Nama Sub Menu</th>
                                            <th>Judul Halaman</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                        <?php $id = 0 ?>
                                        @foreach($subMenu as $data)
                                        <tr class="table-content">
                                            <td>{{ $data->nama_submenu }}</td>
                                            <td>{{ $data->judul_halaman }}</td>
                                            <td>
                                                <a href="{{ URL('/edit-submenu/'.$data->id_submenu) }}"
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
                                                                Apakah anda yakin ingin menghapus Sub Menu ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-new-secondary"
                                                                        data-dismiss="modal">Tutup
                                                                </button>
                                                                <a href="{{ URL('/submenu/delete/'.$data->id_submenu) }}"
                                                                   type="button" class="btn btn-new">Hapus</a>
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
