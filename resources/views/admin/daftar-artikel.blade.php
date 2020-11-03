<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container">

    <!-- <div class="row form-group"> -->
        <div class="title">Daftar Artikel</div>
    <!-- </div> -->

    <div class="row background">
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table-style">
                    <tr class="table-title">
                        <th>Judul Artikel</th>
                        <th>Penulis</th>
                        <th>Objek Wisata</th>
                        <th>Tanggal Artikel</th>
                        <th>Status Artikel</th>
                    </tr>
                    <tr class="table-content">
                        <td><a href="pengalaman-wisata-detail">Mandi di Air Danau Bening</a></td>
                        <td>Margaretha Simanjuntak</td>
                        <td>Air Danau Bening</td>
                        <td>21 Mei 2020</td>
                        <td>Diterima</td>
                    </tr>
                    <tr class="table-content">
                        <td><a href="pengalaman-wisata-detail">Jelajah Tepi Pulau Simamora</a></td>
                        <td>Verawaty Situmorang</td>
                        <td>Pulau Simamora</td>
                        <td>23 Desember 2019</td>
                        <td>Diterima</td> 
                    </tr>
                    <tr class="table-content">
                        <td><a href="pengalaman-wisata-detail">Pagi di Pardinggaran</a></td>
                        <td>Desy Isabel</td>
                        <td>Desa Pardinggaran</td>
                        <td>15 Januari 2020</td>
                        <td>Menunggu</td> 
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
