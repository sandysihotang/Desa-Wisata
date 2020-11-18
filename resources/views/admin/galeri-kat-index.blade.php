<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Kategori Galeri</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-kat-galeri" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $kategori->links() }}                
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar Kategori Galeri</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>Foto Sampul</th>
                        <th>Kategori Galeri</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($kategori as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td><img src="{{ $data->file_foto_sampul }}" style="width:200px; object-fit: cover;"/></td>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <a href="/kelola-galeri/{{$data->id_kategori_galeri}}" class="btn btn-new">Lihat Sub Kategori</a>
                                <a href="/{{$data->id_kategori_galeri}}/edit-kat-galeri" class="btn btn-new">Edit</a>
                                <button class="btn btn-new" data-toggle="modal" data-target="#Modal{{ $i }}">Hapus</button>
                                <div class="modal fade" id="Modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus kategori {{$data->nama_kategori}} ini?<br/>
                                                Semua Foto dengan kategori {{$data->nama_kategori}} juga akan dihapus
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <a href="{{ URL('/hapus-kat-galeri/'.$data->id_kategori_galeri) }}" type="button" class="btn btn-primary">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>


@include('admin.layouts.footer')

