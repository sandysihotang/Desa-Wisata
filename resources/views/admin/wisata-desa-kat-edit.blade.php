@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="container">
    <div class="row form-group">
        <div class="title">Ubah Kategori Wisata</div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row background" id="vue">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-md-2"></div> -->
                        <div class="col-md-8">
                            <div class="container">
                                <form method="post" action="/save-kat-wisata/{{$kategori->id_kategori}}" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-left">Nama Kategori</div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="nama" value="{{ $kategori->nama_kategori }}"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-new-form" style="margin-top:12px; margin-bottom:12px">Simpan</button>
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
