<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="row">
    <div class="container">
         <div class="container" align="right">
            <a href="/{{$pesanan->id_pkt_wisata}}/edit-pesanan" class="btn btn-new">Edit</a>
            <form action="/hapus-pesanan/{{ $pesanan->id_pkt_wisata }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-new">Hapus</button>
            </form>
        </div>

        <div class="col-md-12">
            <div class="sub-title" align="center">Pemesanan Paket Wisata {{ $pesanan->paketWisata->nama_paket }}</div>
        </div>
        <div class="col-md-12">
            <div class="container card-capt-home">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 card-capt-home">Nama Pemesans</div>
                            <div class="col-md-8">{{ $pesanan->nama_pemesan }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 card-capt-home">Kontak</div>
                            <div class="col-md-8">{{ $pesanan->no_hp }} / {{ $pesanan->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Tanggal Keberangkatan</div>
                            <div class="col-md-8">{{ $pesanan->check_in }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Jumlah Peserta</div>
                            <div class="col-md-8">{{ $pesanan->jumlah_peserta }} orang</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Pesan (Optional)</div>
                            <div class="col-md-8">{{ $pesanan->nama_pemesan }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Nama Pemesan</div>
                            <div class="col-md-8">{{ $pesanan->nama_pemesan }}</div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
