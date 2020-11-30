<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Sub Menu: {{ $menu->nama_menu }}</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/admin-tambah-submenu/'.$menu->id_menu) }}" class="btn btn-new">Tambah Sub Menu</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {!! $subMenu->appends(\Request::except('page'))->render() !!}              
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar Sub Menu</div>
            <div class="table-responsive container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>@sortablelink('nama_submenu', 'Nama Sub Menu')</th>
                        <th>@sortablelink('judul_halaman', 'Judul Halaman')</th>
                        <th width="25%">Aksi</th>
                    </tr>
                    <?php $id = 0 ?>
                    @foreach($subMenu as $data)
                    <tr class="table-content">
                        <td>{{ $data->nama_submenu }}</td>
                        <td>{{ $data->judul_halaman }}</td>
                        <td>
                            <a href="{{ URL('/edit-submenu/'.$data->id_submenu) }}"
                               class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                            <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $id }}"><i class="fa fa-trash"></i> Hapus
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
                                            Apakah anda yakin ingin menghapus Sub Menu ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-new-secondary"
                                                    data-dismiss="modal">Tidak
                                            </button>
                                            <a href="{{ URL('/submenu/delete/'.$data->id_submenu) }}"
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
@include('admin.layouts.footer')
