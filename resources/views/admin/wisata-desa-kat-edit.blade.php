@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">

    <div class="row form-group">
        <div class="title">Ubah Kategori Wisata</div>
        <!-- <div class="container">
            <a class="btn btn-new" href="/tambah-user">Tambah Baru</a>
        </div> -->
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
                                        <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
                                    </form>
                                    
                                    <!-- <div class="row mt-2 mb-2">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7" align="left">
                                            <button class="btn btn-submit">Submit</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="col-md-2"></div> -->
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@include('template.footer')