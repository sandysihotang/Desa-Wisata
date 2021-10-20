<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Berita Desa</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/tambah-berita') }}" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Berita</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue" style="margin-bottom: 20px">
            <div class="table-header">Daftar Berita</div>
            <div class="table-responsive container">
                <table class="table-style" style="width: 100%;">
                    <tr class="table-title">
                        <th>No</th>
                        <th width="45%">@sortablelink('judul_berita', 'Judul')</th>
                        <th>Foto Sampul</th>
                        <th width="30%">Aksi</th>
                    </tr>
                    @foreach($list as $id => $data)
                    <tr class="table-content">
                        <td>{{$list->firstItem() + $id}}</td>
                        <td>{{ $data->judul_berita }}</td>
                        <td><img src="{{ $data->file_foto }}" style="width:200px; height: 130px; object-fit: cover;"/></td>
                        <td>
                            <a href="{{ URL('/lihat-berita/'.$data->id_berita) }}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat
                            </a>
                            <a href="{{ URL('/edit-berita/'.$data->id_berita) }}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
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
                                            Apakah anda yakin ingin menghapus berita ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                            <a href="{{ URL('/detail-berita/delete/'.$data->id_berita) }}" type="button" class="btn btn-new-hapus">Ya</a>
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
                {!! $list->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
