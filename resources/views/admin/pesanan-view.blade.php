<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
     <div class="container" align="right">
        <a href="/{{$pesanan->id_galeri}}/edit-pesanan" class="btn btn-new">Edit</a>
        <form action="/hapus-pesanan/{{ $pesanan->id_galeri }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-new">Hapus</button>
        </form>
    </div>
    <div class="sub-title">Pemesanan Paket Wisata {{ $pesanan->paketWisata->nama_paket }}</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">Nama Pemesan</div>
            <div class="col-md-8">{{ $pesanan->nama_pemesan }}</div>
        </div>
    </div>
</div>
@include('template.footer')
