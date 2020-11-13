<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Pesanan Paket Wisata</div>
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
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Lihat Sub Kategori</a>
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Edit</a>
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
    

@include('template.footer')
