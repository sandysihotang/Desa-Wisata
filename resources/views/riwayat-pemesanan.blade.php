<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">

    <!-- <div class="row form-group"> -->
        <div class="title">Riwayat Pemesanan</div>
    <!-- </div> -->

    <div class="row background">
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No. Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Paket Wisata</th>
                        <th>Status</th>
                    </tr>
                    <tr class="table-content">
                        <td>2008-0008</td>
                        <td>08 Agustus 2020</td>
                        <td><a href="detail-paket-wisata" class="link-galeri">Jelajah Bakara 2D1N</a></td>
                        <td>Selesai</td>
                    </tr>
                    <tr class="table-content">
                        <td>2009-0008</td>
                        <td>09 September 2020</td>
                        <td><a href="detail-paket-wisata" class="link-galeri">Wisuda Keluarga 4D3N</a></td>
                        <td>Batal</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
