<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<?php Session::get('success'); ?>
@include('template.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <div class="container"> 
                        @if(session()->has('notif'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
                                <strong class="alert-font">Pemesanan berhasil ditambahkan</strong> 
                                <p class="alert-font">Pihak pengelola akan menghubungi anda melalui kontak yang telah diberikan untuk melanjutkan proses pemesanan</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="title">BOOKING PAKET WISATA</p>
                </div>
                <div class="row" id="booking-wisata" style="width: 100%;">
                    <div class="container background">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-10 text-left">Isi form ini untuk booking paket wisata {{ $paket->nama_paket }}</div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <form method="post" action="/save-booking/{{$paket->id_pkt_wisata}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Nama Lengkap</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="nama" required />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Email</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="email" />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">No HP</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="no_hp" required />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="date" name="tanggal" required /></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="peserta" required /></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Pesan (bila ada)</div>
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
@include('template.footer')
