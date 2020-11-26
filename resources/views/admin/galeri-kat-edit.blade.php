@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">
    <div class="row form-group">
        <div class="title">Edit Kategori Galeri</div>
    </div>
    <div class="row background">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form method="post" action="/save-kat-galeri/{{$kategori->id_kategori_galeri}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Nama Kategori</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nama" value="{{ $kategori->nama_kategori }}"/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Foto Sampul</div>
                            <div class="col-md-8">                                            
                                <p>
                                    <img src="{{ asset($kategori->file_foto_sampul) }}" style="width:200px; object-fit: cover;"/>
                                </p>
                                <div class="input-group control-group increment">
                                    <input type="file" name="filename">
                                </div>
                            </div>
                            <div class="col-md-4 text-left  card-caption-home"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-new-form" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
