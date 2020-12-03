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
                <div class="col-md-12">
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
                                <input type="file" name="filename">
                                <br/><label>Maks. Ukuran: 3MB <br/> Maks. Lebar: 1200 Pixel</label>
                                    <!-- <label for="file-upload" class="custom-file-upload">Upload Foto</label> -->
                                    <!-- <input required id="file-upload" name='filename' type="file" style="display:none;"> -->
                            </div>
                            <div class="col-md-4 text-left  card-caption-home"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-new-form" style="margin-top:12px">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#file-upload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#file-upload')[0].files[0].name;
        $(this).prev('label').text(file);
    });
</script>

@include('admin.layouts.footer')
