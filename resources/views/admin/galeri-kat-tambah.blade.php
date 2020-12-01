@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">
    <div class="row form-group">
        <div class="title">Tambah Kategori Galeri</div>
    </div>
    <div class="row background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{url('save-kat-galeri')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Nama Kategori</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nama" required />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Foto Sampul</div>
                            <div class="col-md-8">
                                <div class="input-group control-group increment" >
                                    <label for="file-upload" class="custom-file-upload">Upload Foto</label>
                                    <input required id="file-upload" name='filename' type="file" style="display:none;">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-new-form" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Tambah</button>
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
