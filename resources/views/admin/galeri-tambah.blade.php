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
        <div class="title">Tambah Foto</div>
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
                                    <form method="post" action="{{url('save-new-galeri')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Kategori Galeri</div>
                                            <div class="col-md-8">
                                                <!-- <input class="form-control" type="text"/> -->
                                                <select name="kategori" id="kategori" class="form-control">
                                                    <option value="">Daftar Kategori</option>
                                                    @foreach ($kategori as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Judul</div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="judul"/>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4 text-left">Unggah Foto</div>
                                            <div class="col-md-8">
                                                <div class="input-group control-group increment" >
                                                    <div class="col-md-2 input-group-btn">
                                                        <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="file" name="filename[]" class="form-control-file">
                                                    </div>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <div class="col-md-2 input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="file" name="filename[]" class="form-control-file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-new-form" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Tambah</button>
                                    </form>
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
