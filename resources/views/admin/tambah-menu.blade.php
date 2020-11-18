<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
    <div class="row">
        <div class="title">Mengelola Menu</div>
        <div class="container">
            <button class="btn btn-new">Tambah Baru</button>
        </div>
    </div>

<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="row background" id="booking-wisata">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <!-- <div class="col-md-8"> -->
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Nama Menu</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Submenu</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-2">
                                        <div class="col-md-5 text-left">Keterangan</div>
                                        <div class="col-md-7">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7" align="left">
                                            <button class="btn btn-submit">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div>
                            <div class="col-md-2"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

