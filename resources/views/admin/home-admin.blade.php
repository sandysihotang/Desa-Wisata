<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Pesanan Paket Wisata</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No. Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Paket Wisata</th>
                        <th>Customer</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($listPemesanan as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td>08 Agustus 2020</td>
                            <td><a href="detail-paket-wisata" class="link-galeri">{{$data->paketWisata->nama_paket}}</a></td>
                            <td>{{$data->nama_pemesan}}</td>
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Artikel Pengalaman Wisata</div>
            <div class="container background">
                <table class="table-style background">
                    <tr class="table-title">
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($listPengalaman as $data)
                        <tr class="table-content">
                            <td>11 Oktober 2020</td>
                            <td>{{$data->judul_pengalaman}}</td>
                            <td>{{$data->penulis->name}}</td>
                            <td><button class="btn btn-new">Lihat</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
