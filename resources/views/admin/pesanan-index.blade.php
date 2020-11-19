<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Pesanan</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-pesanan" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $list->links() }}                
            </div>
        </div>
    </div>

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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($list as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td>08 Agustus 2020</td>
                            <td><a href="detail-paket/{{$data->pkt_wisata_id}}" class="link-galeri">{{$data->paketWisata->nama_paket}}</a></td>
                            <td>{{$data->nama_pemesan}}</td>
                            <td>
                                @if($data->status_pesanan === 1)
                                    Menunggu
                                @elseif($data->status_pesanan === 2)
                                    Selesai
                                @endif
                            </td>
                            <td><a href="/detail-pesanan/{{$data->id_pemesanan}}" class="btn btn-new">Lihat</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
