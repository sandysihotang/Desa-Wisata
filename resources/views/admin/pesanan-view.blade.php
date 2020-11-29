<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="pull-right">
        <?php $user = Illuminate\Support\Facades\Auth::user(); ?>
        @if($pesanan->akun_id === $user->id_user && $pesanan->status_pesanan === 1)
            <a href="/edit-pesanan/{{ $pesanan->id_pemesanan }}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
        @endif

        @if($pesanan->status_pesanan === 1)
            <button class="btn btn-new-lihat" data-toggle="modal" data-target="#Modal1"><i class="fa fa-check"></i> Selesai</button>
            <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Ubah Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin mengubah status pemesanan paket ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                            <a href="{{ URL('/status-pesanan/selesai/'.$pesanan->id_pemesanan) }}" type="button" class="btn btn-new-lihat">Ya</a>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal2"><i class="fa fa-times"></i> Batalkan</button>
            <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Ubah Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin mengubah status pemesanan paket ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                            <a href="{{ URL('/status-pesanan/batal/'.$pesanan->id_pemesanan) }}" type="button" class="btn btn-new-hapus">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="title">Detail Paket Wisata</div>

<div class="container background">

    <div class="row form-group detail-body">
        <div class="col-md-8">
            <div class="detail-title">Data Pemesanan</div>
            <div class="row">
                <div class="col-md-4">No. Pesanan</div>
                <div class="col-md-8">{{ $pesanan->no_pesanan }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Status Pesanan</div>
                <div class="col-md-8">
                    @if($pesanan->status_pesanan === 1)
                        Menunggu
                    @elseif($pesanan->status_pesanan === 2)
                        Selesai
                    @elseif($pesanan->status_pesanan === 3)
                        Dibatalkan
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Tanggal Transaksi</div>
                <div class="col-md-8">
                    <?php $date=date_create($pesanan->tanggal_pesanan);
                    echo date_format($date,"d M Y"); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Nama Paket</div>
                <div class="col-md-8">{{ $pesanan->paketWisata->nama_paket}} - {{$pesanan->paketWisata->paket}}</div>
            </div>
        <!-- </div>
        <div class="col-md-5"> -->
            <div class="detail-title">Data Diri</div>
            <div class="row">
                <div class="col-md-4">Nama Pemesan</div>
                <div class="col-md-8">{{ $pesanan->nama_pemesan}}</div>
            </div>
            <div class="row">
                <div class="col-md-4">No. HP / Email</div>
                <div class="col-md-8">{{ $pesanan->no_hp}} / {{ $pesanan->email}}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Jumlah Peserta</div>
                <div class="col-md-8">{{ $pesanan->jumlah_paket}} orang</div>
            </div>
            <div class="row">
                <div class="col-md-4">Tanggal Keberangkatan</div>
                <div class="col-md-8">
                    <?php $date=date_create($pesanan->check_in);
                    echo date_format($date,"d M Y"); ?>
                </div>
            </div>
            @if(isset($pesanan->pesan))
                <div class="row">
                    <div class="col-md-4">Pesan</div>
                    <div class="col-md-8">{{ $pesanan->pesan}}</div>
                </div>
            @endif
            <div class="detail-title">Total: @currency($pesanan->paketWisata->harga_paket * $pesanan->jumlah_paket)</div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script type="text/javascript"> 
    function display() { 
        var txt; 
        txt = "hai</br>h</br>a</br>h</br>a"; 
        var text = txt.split("</br>"); 
        var str = text.join('\n'); 
        document.write(str); 
        // return str;
    } 
</script>