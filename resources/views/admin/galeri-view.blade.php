<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
     <div class="container" align="right">
        <a href="/{{$galeri->id_sub_kat_galeri}}/edit-galeri" class="btn btn-new">Edit</a>
        <button class="btn btn-new" data-toggle="modal" data-target="#Modal">Hapus</button>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus galeri {{$galeri->judul}} ini?<br/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a href="{{ URL('/hapus-galeri/'.$galeri->id_sub_kat_galeri) }}" type="button" class="btn btn-primary">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="title">{{ $galeri->judul}}</div>
    <div class="row background">
        <?php foreach ($listFoto as $picture) { ?>
            <p><img src="{{ asset($picture->file_foto) }}" class="single-img"/></p>
        <?php } ?>
    </div>
</div>
@include('admin.layouts.footer')

