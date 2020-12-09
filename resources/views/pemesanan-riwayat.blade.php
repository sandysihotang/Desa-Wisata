<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">
    <div class="col-md-12">
        <div class="container"> 
            @if(session()->has('notif'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
                    <strong class="alert-font">Pemesanan berhasil diperbarui</strong> 
                    <p class="alert-font">Pihak pengelola akan menghubungi anda melalui kontak yang telah diberikan untuk melanjutkan proses pemesanan</p>
                </div>
            @endif
        </div>
    </div>
    

    <!-- <div class="row form-group"> -->
        <div class="title">Riwayat Pemesanan</div>
    <!-- </div> -->

    <div class="row background">
        <div class="container">
            <div class="row form-group">
                <div class="col-md-12">
                    <table class="table-style">
                        <tr class="table-title">
                            <th>No. Pesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Paket Wisata</th>
                            <th>Status</th>
                            <th width="26%">Aksi</th>
                        </tr>
                        <?php $i = 1; ?>
                        @foreach($listPesanan as $data)
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

                                    ?></td>
                                <td><a href="/detail-paket-wisata/{{ $data->pkt_wisata_id }}" class="link-paket">{{$data->paketWisata->nama_paket}} - {{ $data->paketWisata->paket }}</a></td>
                                <td>
                                    @if($data->status_pesanan === 1)
                                        Menunggu
                                    @elseif($data->status_pesanan === 2)
                                        Selesai
                                    @elseif($data->status_pesanan === 3)
                                        Batal
                                    @endif
                                </td>
                                <td>
                                    <a href="/riwayat-pemesanan/lihat/{{$data->id_pemesanan}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                                    @if($data->status_pesanan === 1)
                                        <a href="/riwayat-pemesanan/edit/{{$data->id_pemesanan}}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-new-remove" data-toggle="modal" data-target="#Modal{{ $i }}"><i class="fa fa-times"></i> Batalkan</button>
                                        <div class="modal fade" id="Modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembatalan Pesanan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin membatalkan pesanan untuk paket wisata {{ $data->paketWisata->nama_paket }} - {{ $data->paketWisata->paket }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                        <a href="{{ URL('/riwayat-pemesanan/batal/'.$data->id_pemesanan) }}" type="button" class="btn btn-new-remove">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
        <ul class="pagination justify-content-center">
           {{ $listPesanan->links() }}
        </ul></div>
    </div>
</div>
    

@include('template.footer2')
