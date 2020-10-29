@include('template.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <p class="h2 font-weight-bold text-center">BOOKING PAKET WISATA</p>
                </div>
                <div class="row" id="booking-wisata" style="background-color: #f7f7f7;width: 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Isi form ini untuk booking paket wisata</div>
                                        <div class="col-md-7"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Nama Lengkap</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Email</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">No HP</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Destinasi</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Tanggal Keberangkatan</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="datetime-local"/></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Jumlah Peserta</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Pesan (bila ada)</div>
                                        <div class="col-md-7">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-7" align="left">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
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
