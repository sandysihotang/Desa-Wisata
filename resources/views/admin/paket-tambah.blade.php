@include('admin.layouts.header')
<div class="container">    
    <div class="title">Tambah Paket Wisata</div>
    <div class="row" style="width: 100%;">
        <div class="container">
            <div class="col-md-8">
                <form method="post" action="{{url('save-new-paket')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Nama Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="nama" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="paket" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Foto Sampul</div>
                        <div class="col-md-8">
                            <input type="file" name="filename" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="harga" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Termasuk</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="harga1" required rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Tidak Termasuk</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="harga2" required rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Jadwal</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="jadwal" required rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Itinerary</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="itinerary" required rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Keterangan Tambahan</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="tambahan" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-8" align="left">
                            <button class="btn btn-new-form">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
