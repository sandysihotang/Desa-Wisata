<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Pesanan</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-pesanan" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Pesanan</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Pesanan Paket Wisata</div>
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>@sortablelink('no_pesanan', 'No. Pesanan')</th>
                        <th>@sortablelink('check_in', 'Tanggal Keberangkatan')</th>
                        <th>Paket Wisata</th>
                        <th width="20%">@sortablelink('nama_pemesan', 'Customer')</th>
                        <th>@sortablelink('status_pesanan', 'Status')</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($list as $data)
                        <tr class="table-content">
                            <td>{{$data->no_pesanan}}</td>
                            <td>
                                <?php
                                $tanggal = $data->check_in;
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
        <div class="container">
            <div class="pagination justify-content-center">
                {!! $list->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
