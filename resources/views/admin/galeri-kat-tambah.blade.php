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
                <div class="col-md-8">
                    <form method="post" action="{{url('save-kat-galeri')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Nama Kategori</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nama"/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Foto Sampul</div>
                            <div class="col-md-8">
                                <div class="input-group control-group increment" >
                                    <input type="file" name="filename">
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
@include('admin.layouts.footer')
