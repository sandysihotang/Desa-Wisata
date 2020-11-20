<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

@include('admin.layouts.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-center">BOOKING PAKET WISATA</div>
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
                                            <div class="col-md-5 text-left">Nama Paket Wisata</div>
                                            <div class="col-md-7">
                                                <select name="paket" id="paket" class="form-control">
                                                    @foreach ($paket as $data)
                                                        <option value="{{ $data->id_pkt_wisata }}">{{$data->nama_paket}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Status Pesanan</div>
                                            <div class="col-md-7">
                                                <?php $pesanan = [
                                                    '1' => 'Menunggu',
                                                    '2' => 'Selesai'
                                                ]; ?>
                                                <select name="pesanan" id="pesanan" class="form-control">
                                                    @foreach ($pesanan as $id => $name)
                                                        <option value="{{ $id }}">{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Nama Lengkap</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text" name="nama" />
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
                                                <input class="form-control" type="text" name="no_hp" />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="datetime-local" name="tanggal" /></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control" type="text"/ name="peserta"></div>
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
