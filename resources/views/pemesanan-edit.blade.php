<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<?php Session::get('success'); ?>
@include('template.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <p class="title">Edit Pemesanan PAKET WISATA</p>
                </div>
                <div class="row" id="booking-wisata" style="background-color: #f7f7f7;width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-md-5 text-left card-caption-home">No. Pesanan</div>
                                    <div class="col-md-7 text-left card-caption-home">{{ $pesanan->no_pesanan }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 text-left card-caption-home">Nama Paket</div>
                                    <div class="col-md-7 text-left card-caption-home">{{ $pesanan->paketWisata->nama_paket}} - {{ $pesanan->paketWisata->paket }}</div>
                                </div>
                                    <form method="post" action="/riwayat-pemesanan/editSave/{{$pesanan->id_pemesanan}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Nama Lengkap</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="nama" value="{{ $pesanan->nama_pemesan }}" required />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Email</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="email" value="{{ $pesanan->email }}" />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">No HP</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="no_hp" value="{{ $pesanan->no_hp }}" required />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="date" name="tanggal" value="{{ $pesanan->check_in }}" required /></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="peserta" value="{{ $pesanan->jumlah_paket }}" required /></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Pesan (bila ada)</div>
                                            <div class="col-md-7">
                                                <textarea class="form-control" name="pesan" ></textarea>
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
@include('template.footer')
