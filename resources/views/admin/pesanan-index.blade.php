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
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No. Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Paket Wisata</th>
                        <th width="20%">Customer</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($list as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td>
                                <?php
                                $tanggal = $data->tanggal_pesanan;
                                $bulan = array(
                                    1 => 'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                );

                                $pecahkan = explode('-', $tanggal);

                                echo $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

                                ?>
                            </td>
                            <td><a href="detail-paket/{{$data->pkt_wisata_id}}" class="link-galeri">{{$data->paketWisata->nama_paket}} - {{$data->paketWisata->paket}}</a></td>
                            <td>{{$data->nama_pemesan}}</td>
                            <td>
                                @if($data->status_pesanan === 1)
                                    Menunggu
                                @elseif($data->status_pesanan === 2)
                                    Selesai
                                @elseif($data->status_pesanan === 3)
                                    Dibatalkan
                                @endif
                            </td>
                            <td><a href="/detail-pesanan/{{$data->id_pemesanan}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
