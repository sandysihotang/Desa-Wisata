@include('admin.layouts.header')
<div class="row mt-4 ml-2">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="title">Edit Paket Wisata</div>
                    <div class="row" style="width: 100%;">
                        <div class="container">
                            <div class="col-md-8">
                                <form method="post" action="/save-paket/{{$paket->id_pkt_wisata}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row mt-2">
                                        <div class="col-md-4">Nama Paket</div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="nama" value="{{ $paket->nama_paket }}" required/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Foto Sampul</div>
                                        <div class="col-md-8">
                                            <p>               
                                                <img src="{{ asset($paket->file_foto) }}" style="width:200px; object-fit: cover;"/>
                                            </p>
                                            <input type="file" name="filename">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Harga Paket</div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="number" name="harga" value="{{ $paket->harga_paket }}" required/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Harga Termasuk</div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="harga1" required rows="4">{{ $paket->harga_termasuk }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Harga Tidak Termasuk</div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="harga2" required rows="4">{{ $paket->harga_tidak_termasuk }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Jadwal</div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="jadwal" required rows="4">{{ $paket->jadwal }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Itinerary</div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="itinerary" required rows="4">{{ $paket->itinerary }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">Keterangan Tambahan</div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="tambahn" rows="4">{{ $paket->keterangan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8" align="left">
                                            <button class="btn btn-new">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
