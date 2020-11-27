<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Fasilitas</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/tambah-fasilitas') }}" class="btn btn-new">Tambah Baru</a>
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
            <div class="table-responsive container">
                <table class="table-style" style="width: 100%;">
                    <tr class="table-title">
                        <th>No</th>
                        <th>Judul</th>
                        <!-- <th>Kategori Menu</th> -->
                        <th width="30%">Aksi</th>
                    </tr>
                    <?php $id = 1;  ?>
                    @foreach($list as $data)
                    <tr class="table-content">
                        <td>{{$id}}</td>
                        <td>{{ $data->nama_fasilitas }}</td>
                        <td>
                            <a href="{{ URL('/lihat-fasilitas/'.$data->id_fasilitas) }}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                            <a href="{{ URL('/edit-fasilitas/'.$data->id_fasilitas) }}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                            <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $id }}"><i class="fa fa-trash"></i> Hapus</button>
                            <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                            <a href="{{ URL('/detail-fasilitas/delete/'.$data->id_fasilitas) }}" type="button" class="btn btn-new-hapus">Ya</a>
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
