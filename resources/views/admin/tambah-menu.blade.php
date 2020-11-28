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
                <div class="row" id="booking-wisata" style="width: 100%">
                    <div class="table-responsive container">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="table-header text-left">Daftar Menu</div>
                                <div class="container">
                                    <table class="table-style">
                                        <tr class="table-title">
                                            <th>Nama Menu</th>
                                            <th>Judul Halaman</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                        <?php $id = 0 ?>
                                        @foreach($menu as $data)
                                        <tr class="table-content">
                                            <td>{{ $data->nama_menu }}</td>
                                            <td>{{ $data->judul_halaman }}</td>
                                            <td width="13.1%">
                                                @if($data->mempunyai_sub_menu)
                                                <a href="{{ URL('/tambah-submenu/'.$data->id_menu) }}"
                                                   class="btn btn-new-lihat"><i class="fa fa-eye"></i> Sub Menu
                                                </a>
                                                @endif
                                            </td>
                                            <td width="20%">
                                                <a href="{{ URL('/edit-menu/'.$data->id_menu) }}"
                                                   class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                                                <button class="btn btn-new-hapus" data-toggle="modal"
                                                        data-target="#Modal{{ $id }}"><i class="fa fa-trash"></i> Hapus
                                                </button>
                                                <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="sub-title" id="exampleModalLabel">
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
                                                                <button type="button" class="btn btn-new-secondary"
                                                                        data-dismiss="modal">Tidak
                                                                </button>
                                                                <a href="{{ URL('/menu/delete/'.$data->id_menu) }}"
                                                                   type="button" class="btn btn-new-hapus">Ya</a>
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

