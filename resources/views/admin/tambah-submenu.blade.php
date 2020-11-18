<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <div class="title">Tambah Sub Menu</div>
                </div>
                <div class="row background" id="booking-wisata">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Menu Utama</div>
                                        <div class="col-md-7">
                                            <select id = "myList" class="form-control">
                                                <option value = "0">Pilih Menu Utama</option>
                                                <option value = "1">Profil</option>
                                                <option value = "2">Wisata Desa</option>
                                                <option value = "3">Kategori Wisata</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Nama Sub Menu</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Link Menu</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-5 text-left">Keterangan</div>
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
@include('admin.layouts.footer')

