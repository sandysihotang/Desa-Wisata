<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
     <div class="container" align="right">
        <a href="/{{$galeri->id_galeri}}/edit-galeri" class="btn btn-new">Edit</a>
        <form action="/hapus-galeri/{{ $galeri->id_galeri }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-new">Hapus</button>
        </form>
    </div>
    <div class="title">{{ $galeri->judul}}</div>
    <div class="row background">
        <?php foreach (json_decode($galeri->file_foto)as $picture) { ?>
            <p><img src="{{ asset('/image/galeri/'.$picture) }}" class="single-img"/></p>
        <?php } ?>
    </div>
</div>
@include('template.footer')
