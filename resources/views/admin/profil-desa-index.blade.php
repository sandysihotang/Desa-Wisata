<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Profil Desa</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/tambah-profil-desa') }}" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Profil
                Desa</a>
        </div>
    </div>

    <!-- Profil Desa -->
    <div class="row">
        <div class="col-md-12" id="vue" style="margin-bottom: 20px">
            <div class="table-header">Profil Desa</div>
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No</th>
                        <th>@sortablelink('nama_profil', 'Profil Desa')</th>
                        <th>Keterangan</th>
                        <th width="30%">Aksi</th>
                    </tr>
                    @foreach($listData as $id => $data)
                    <tr class="table-content">
                        <td>{{ $listData->firstItem() + $id}}</td>
                        <td>{{ $data->nama_profil }}</td>
                        <td>{!! $data->deskripsi !!}</td>
                        <td>
                            <a href="{{ URL('/edit-profil-desa/'.$data->id_profil) }}" class="btn btn-new"><i
                                    class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="container">
            <div class="pagination justify-content-center">
                {{ $listData->links() }}
            </div>
        </div>
    </div>

    <!-- Menu Profil Desa -->
    <div class="row">
        <div class="col-md-12" id="vue" style="margin-bottom: 20px">
            <div class="table-header">Menu Profil Desa</div>
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No</th>
                        <th>@sortablelink('nama_profil', 'Judul')</th>
                        <!-- <th>Kategori Menu</th> -->
                        <th width="30%">Aksi</th>
                    </tr>
                    @foreach($list as $id => $data)
                    <tr class="table-content">
                        <td>{{ $list->firstItem() + $id}}</td>
                        <td>{{ $data->nama_profil }}</td>
                        <td>
                            <a href="{{ URL('/lihat-profil-desa/'.$data->id_profil) }}" class="btn btn-new-lihat"><i
                                    class="fa fa-eye"></i> Lihat
                            </a>
                            <a href="{{ URL('/edit-profil-desa/'.$data->id_profil) }}" class="btn btn-new"><i
                                    class="fa fa-edit"></i> Edit</a>
                            <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $id }}"><i
                                    class="fa fa-trash"></i> Hapus</button>
                            <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus artikel ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-new-secondary"
                                                data-dismiss="modal">Tidak</button>
                                            <a href="{{ URL('/detail-profil-desa/delete/'.$data->id_profil) }}"
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
                {{ $list->links() }}
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')