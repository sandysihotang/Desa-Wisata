@include('admin.layouts.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Logo tidak berhasil diubah</strong><br><br>
        Pastikan ukuran gambar sesuai dengan ketentuan.
      </div>
    @endif
    <div class="row form-group">
        <div class="col-md-8">
            <div class="title">Kelola Logo Desa</div>
        </div>
    </div>
    <div class="row background">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <form method="post" action="/save-logo/{{$logo->id_profil}}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="row mt-2">
                                <div class="col-md-4 text-left card-caption-home">Logo Sekarang</div>
                                <div class="col-md-8">
                                    <p>
                                        <img src="{{ asset($logo->deskripsi) }}" style="width:200px; object-fit: cover;"/>
                                    </p>
                                </div>
                                <div class="col-md-4 text-left card-caption-home">Unggah Logo Baru</div>
                                <div class="col-md-8">
                                    <!-- <label for="file-upload" class="custom-file-upload">Upload Foto</label> -->
                                    <!-- <input id="file-upload" name='filename' type="file" style="display:none;"> -->
                                    <input type="file" name="filename">
                                    <br/><label>Maks. Ukuran: 3MB <br/> Maks. Lebar: 1200 Pixel</label>
                                </div>
                                <div class="col-md-4 text-left"></div>
                                <div class="col-md-8">   
                                    <div class="input-group control-group increment">
                                        <button type="submit" class="btn btn-new-form" style="margin-top:12px">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
