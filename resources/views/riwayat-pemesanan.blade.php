<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">

    <!-- <div class="row form-group"> -->
        <div class="title">Riwayat Pemesanan</div>
    <!-- </div> -->

    <div class="row background">
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No. Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Paket Wisata</th>
                        <th>Status</th>
                    </tr>
                    @foreach($listPesanan as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td>{{$data->tanggal_pesanan}}</td>
                            <td><a href="detail-paket-wisata" class="link-galeri">{{$data->paketWisata->nama_paket}}</a></td>
                            <td>
                                @if($data->status_pesanan === 1)
                                    Menunggu
                                @elseif($data->status_pesanan === 2)
                                    Selesai
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
