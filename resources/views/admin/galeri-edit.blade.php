@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<script>
    //Function that is called when the user clicks on the image
    function hide_image(id){
        document.getElementById(id).style.display = 'none';

        let url = "{{ route('hapusFoto', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
        // document.getElementById(id).innerHTML = arrRemove;
    }
</script>
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
    </div>
    <div class="row background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="/save-galeri/{{$galeri->id_sub_kat_galeri}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Kategori Galeri</div>
                            <div class="col-md-8">
                                <select name="kategori" id="kategori" class="form-control">
                                    @foreach ($kategori as $id => $name)
                                        <option value="{{ $id }}" {{ $id == $galeri->kategori_foto_id ? 'selected':'' }}>{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Judul</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="judul" value="{{$galeri->judul}}" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left card-caption-home">Unggah Foto</div>
                            <div class="col-md-8">
                                    <?php foreach ($listFoto as $picture) { ?>
                                        <p id="{{ $picture->id_galeri }}">
                                            <img src="{{ asset($picture->file_foto) }}" style="width:200px; object-fit: cover;" id="{{ $picture->id_galeri }}" />
                                            <input type="button" class="btn btn-new" value="Hapus" onclick="hide_image('{{ $picture->id_galeri }}')">
                                        </p>
                                    <?php } ?>
                                <div class="input-group control-group increment" >
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="filename[]" class="form-control-file">
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="filename[]" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                                <br/><label>Maks. Ukuran tiap File: 3MB <br/> Maks. Lebar tiap File: 1200 Pixel</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 text-left"></div>
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
@include('admin.layouts.footer')


