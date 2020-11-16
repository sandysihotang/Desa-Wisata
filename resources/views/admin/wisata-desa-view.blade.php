<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
     <div class="container" align="right">
        <a href="/{{$objek->id_galeri}}/edit-galeri" class="btn btn-new">Edit</a>
        <form action="/hapus-galeri/{{ $objek->id_galeri }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-new">Hapus</button>
        </form>
    </div>
    <div class="title">{{ $objek->judul}}</div>
    <div class="row background">
            <p><img src="{{ $objek->file_foto }}" class="single-img"/></p>
            <p><detail-wisata-admin></detail-wisata-admin></p>
    </div>
</div>
@include('template.footer')
