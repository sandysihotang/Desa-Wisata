<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                                    <div class="col-md-7 text-left card-caption-home">{{ $pesanan->paketWisata->nama_paket}} - {{ $pesanan->paketWisata->paket }} (@currency($pesanan->paketWisata->harga_paket ))
                                    </div>
                                </div>
                                    <form method="post" action="/riwayat-pemesanan/editSave/{{$pesanan->id_pemesanan}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" id="harga" name="harga" value="{{$pesanan->paketWisata->harga_paket}}">
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Nama Lengkap</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ $pesanan->nama_pemesan }}" required />
                                                @error('nama')
                                                    <div class="invalid-feedback" style="text-align:left">Nama harus diisi</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Email</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $pesanan->email }}" />
                                                @error('email')
                                                    <div class="invalid-feedback" style="text-align:left">Email harus diisi dan valid</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">No HP</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('no_hp') is-invalid @enderror" type="text" name="no_hp" value="{{ $pesanan->no_hp }}" required />
                                                @error('no_hp')
                                                    <div class="invalid-feedback" style="text-align:left">No HP harus diisi dengan angka</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Tanggal Keberangkatan</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" value="{{ $pesanan->check_in }}" required /></div>
                                                @error('tanggal')
                                                    <div class="invalid-feedback" style="text-align:left">Tanggal keberangkatan harus diisi</div>
                                                @enderror
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Jumlah Peserta</div>
                                            <div class="col-md-7">
                                                <input class="form-control @error('peserta') is-invalid @enderror" type="text" name="peserta" value="{{ $pesanan->jumlah_paket }}" required id="isPeserta" onchange="getTotal()"/>
                                                @error('peserta')
                                                    <div class="invalid-feedback" style="text-align:left">Peserta harus diisi dengan angka</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-5 text-left card-caption-home">Total</div>
                                            <label class="col-md-7 text-left card-caption-home" id="total" value="{{ old('total') }}" name="total">@currency($pesanan->jumlah_paket * $pesanan->paketWisata->harga_paket )</label>
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

<script>
    function getTotal(){
        var arr = document.getElementById('isPeserta').value;
        var harga = document.getElementById('harga').value;
        var tot=0;
        tot = harga*arr;
        // var total = parseFloat(tot);

        // var total = (50000/1).toFixed(0).replace('.');
        // total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        document.getElementById('total').innerHTML ="Rp. " + tot;
        // newWidget = newWidget.replace(/widgetId/g,widgetId);
        // console.log(newWidget);
        // console.log(tot);
        // console.log(total);
    }

    // function validateEmail(email) {
    //   const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //   return re.test(email);
    // }

    // function validate() {
    //   const $result = $("#result");
    //   const email = $("#email").val();
    //   $result.text("");

    //   if (validateEmail(email)) {
    //     $result.text(email + " is valid :)");
    //     $result.css("color", "green");
    //   } else {
    //     $result.text(email + " is not valid :(");
    //     $result.css("color", "red");
    //   }
    //   return false;
    // }

    // $("#validate").on("click", validate);
</script>

@include('template.footer2')
