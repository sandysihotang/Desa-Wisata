<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Menu</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/admin-tambah-menu') }}" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Menu</a>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Menu</div>
            <div class="table-responsive container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>@sortablelink('nama_menu', 'Nama Menu')</th>
                        <th>@sortablelink('judul_halaman', 'Judul Halaman')</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    @foreach($menu as $id => $data)
                        <tr class="table-content">
                            <td>{{ $menu->firstItem() + $id }}</td>
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
                    @endforeach
                </table>
            </div>
        </div>
        <div class="container">
            <div class="pagination justify-content-center">
                {!! $menu->appends(\Request::except('page'))->render() !!}               
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

