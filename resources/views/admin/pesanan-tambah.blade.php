<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                                                        <option value="{{ $data->id_pkt_wisata }}" onchange="getHarga()">{{$data->nama_paket}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="harga" name="harga">
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
                                                <input class="form-control" type="date" value="{{ $today }}" name="tanggal_pesanan" required/></div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Nama Pemesan</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}"/>
                                                @error('nama')
                                                    <div class="invalid-feedback" style="text-align:left">Nama harus diisi</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Email</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="invalid-feedback" style="text-align:left">Email harus diisi dan valid</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">No HP</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('no_hp') is-invalid @enderror" type="text" name="no_hp" value="{{ old('no_hp') }}"/>
                                                @error('no_hp')
                                                    <div class="invalid-feedback" style="text-align:left">No. HP harus diisi dengan angka</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" value="{{ old('tanggal') }}"/>
                                                @error('tanggal')
                                                    <div class="invalid-feedback" style="text-align:left">Tanggal keberangkatan harus diisi</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 detail-body">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('peserta') is-invalid @enderror" type="text"/ name="peserta" value="{{ old('peserta') }}">
                                                @error('peserta')
                                                    <div class="invalid-feedback" style="text-align:left">Jumlah peserta harus diisi dengan angka</div>
                                                @enderror
                                            </div>
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
                                                <button class="btn btn-new-form">Tambah</button>
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

<script>
    // function getHarga(){
    //     var paket = document.getElementById('harga').value;
    //     var tot=0;
    //     tot = harga*arr;

    //     document.getElementById('total').innerHTML ="Rp. " + tot;
    // }
    function getTotal(){
        var arr = document.getElementById('isPeserta').value;
        var harga = document.getElementById('harga').value;
        var tot=0;
        tot = harga*arr;

        document.getElementById('total').innerHTML ="Rp. " + tot;
    }

    function validateEmail(email) {
      const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function validate() {
      const $result = $("#result");
      const email = $("#email").val();
      $result.text("");

      if (validateEmail(email)) {
        $result.text(email + " is valid :)");
        $result.css("color", "green");
      } else {
        $result.text(email + " is not valid :(");
        $result.css("color", "red");
      }
      return false;
    }

    $("#validate").on("click", validate);
</script>

@include('admin.layouts.footer')