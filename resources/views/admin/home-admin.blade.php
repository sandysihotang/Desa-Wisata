@include('admin.layouts.header')
<div class="row">
    <div class="container">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Pesanan Paket Wisata</div>
                <div class="container" style="padding-bottom: 30px">
                    <table class="table-style">
                        <tr class="table-title">
                            <th style="width: 20%">No. Pesanan</th>
                            <th style="width: 30%">Tanggal Transaksi</th>
                            <th style="width: 30%">Paket Wisata</th>
                            <th style="width: 20%">Customer</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($listPemesanan as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td><?php
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
                            <td>
                                <a href="detail-paket/{{$data->pkt_wisata_id}}" class="link-galeri">{{$data->paketWisata->nama_paket}}</a>
                            </td>
                            <td>{{$data->nama_pemesan}}</td>
                            <td><a href="/detail-pesanan/{{$data->id_pemesanan}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Artikel Pengalaman Wisata</div>
                <div class="container">
                    <table class="table-style">
                        <tr class="table-title">
                            <th style="width: 20%">Tanggal</th>
                            <th style="width: 60%">Judul</th>
                            <th style="width: 20%">Penulis</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($listPengalaman as $data)
                        <tr class="table-content">
                            <td><?php
                                $tanggal = $data->tanggal;
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
                            <td>{{$data->judul_pengalaman}}</td>
                            <td>{{$data->penulis->nama_lengkap}}</td>
                            <td>
                                <a href="{{ URL('/lihat-artikel/'.$data->id_pengalaman) }}"
                                   class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')
