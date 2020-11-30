<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Kategori Galeri</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-kat-galeri" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Kategori Galeri</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Kategori Galeri</div>
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th width="25%">Foto Sampul</th>
                        <th>@sortablelink('nama_kategori', 'Nama Kategori')</th>
                        <th width="40%">Aksi</th>
                    </tr>
                    @foreach($kategori as $i => $data)
                        <tr class="table-content">
                            <td>{{ $kategori->firstItem() + $i }}</td>
                            <td><img src="{{ $data->file_foto_sampul }}" style="width:200px; height: 130px; object-fit: cover;"/></td>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <a href="/kelola-galeri/{{$data->id_kategori_galeri}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat Sub Kategori</a>
                                <a href="/{{$data->id_kategori_galeri}}/edit-kat-galeri" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $i }}"><i class="fa fa-trash"></i> Hapus</button>
                                <div class="modal fade" id="Modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus kategori {{$data->nama_kategori}} ini?<br/>
                                                Semua Foto dengan kategori {{$data->nama_kategori}} juga akan dihapus
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="{{ URL('/hapus-kat-galeri/'.$data->id_kategori_galeri) }}" type="button" class="btn btn-new-hapus">Ya</a>
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
                {!! $kategori->appends(\Request::except('page'))->render() !!}              
            </div>
        </div>
    </div>

</div>


@include('admin.layouts.footer')

