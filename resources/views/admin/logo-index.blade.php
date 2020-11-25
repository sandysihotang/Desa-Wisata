@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">
    <div class="row form-group">
        <div class="title">Kelola Logo Desa</div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row background" id="vue">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container">
                                <form method="post" action="/save-logo/{{$logo->id_profil}}" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-left">Logo Desa</div>
                                        <div class="col-md-8">                                            
                                            <p>
                                                <img src="{{ asset($logo->deskripsi) }}" style="width:200px; object-fit: cover;"/>
                                            </p>
                                        </div>
                                        <div class="col-md-4 text-left">Unggah Logo Baru</div>
                                        <div class="col-md-8">   
                                            <div class="input-group control-group increment">
                                                <input type="file" name="filename">
                                            </div>
                                        </div>
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
        </div>
    </div>
</div>
@include('admin.layouts.footer')
