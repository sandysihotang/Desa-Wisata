@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<div class="container">
@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Sorry !</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          Foto berhasil diunggah
        </div>
        @endif
    <div class="row form-group">
        <div class="title">Edit Foto</div>
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
                                    <form method="post" action="/save-galeri/{{$galeri->id_galeri}}" enctype="multipart/form-data">
                                    @method('patch')
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Kategori Galeris</div>
                                            <div class="col-md-8">
                                                <select name="kategori" id="kategori" class="form-control">
                                                    @foreach ($kategori as $id => $name)
                                                        <option value="{{ $id }}" {{ $id == $galeri->kategori_foto_id ? 'selected':'' }}>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Judul</div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="judul" value="{{$galeri->judul}}" />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Unggah Foto</div>
                                            <div class="col-md-8">
                                                    <?php foreach (json_decode($galeri->file_foto)as $picture) { ?>
                                                        <p>
                                                            <img src="{{ asset('/image/galeri/'.$picture) }}" style="width:200px; object-fit: cover;"/>
                                                            <button class="btn btn-new">Hapus</button>
                                                            <p>{{$picture}}</p>
                                                        </p>
                                                    <?php } ?>
                                                <div class="input-group control-group increment" >
                                                    <input type="file" name="filename[]" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                                    </div>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <input type="file" name="filename[]" class="form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD
                                        </div>
                                        <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Simpan</button>
=======
                                        </div>     

                                           
                                        <button type="submit" class="btn btn-new" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Simpan</button>
>>>>>>> 23614d211716732cd2bacb932aa91c2877a111c5
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
@include('admin.layouts.footer')


<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });
    });
</script>
