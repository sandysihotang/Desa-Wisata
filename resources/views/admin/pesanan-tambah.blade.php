<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

<?php $month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
@include('admin.layouts.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-center">Tambah Pemesanan Paket Wisata</div>
                </div>
                <div class="row" id="booking-wisata" style="background-color: #f7f7f7;width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <form method="post" action="/save-booking-admin" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Nama Paket Wisata</div>
                                            <div class="col-md-7">
                                                <select name="paket" id="paket" class="form-control">
                                                    @foreach ($paket as $data)
                                                        <option value="{{ $data->id_pkt_wisata }}">{{$data->nama_paket}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Status Pesanan</div>
                                            <div class="col-md-7">
                                                <?php $pesanan = [
                                                    '1' => 'Menunggu',
                                                    '2' => 'Selesai',
                                                    '3' => 'Dibatalkan'
                                                ]; ?>
                                                <select name="pesanan" id="pesanan" class="form-control">
                                                    @foreach ($pesanan as $id => $name)
                                                        <option value="{{ $id }}">{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Tanggal Transaksi</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="date" value="{{ $today }}" name="tanggal" required/></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Nama Pemesan</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="nama" required/>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Email</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="email"/>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">No HP</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="no_hp" required/>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="date" name="tanggal" required/></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text"/ name="peserta" required></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Pesan (bila ada)</div>
                                            <div class="col-md-7">
                                                <textarea class="form-control" name="pesan"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-2 mb-2">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-7" align="left">
                                                <button class="btn btn-new">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')