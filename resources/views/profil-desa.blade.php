<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container" id="vue">
    <div class="title">{{ $data->nama_profil }}</div>
    <div class="row">
        <div class="container-fluid background" style="padding-right: 40px">
            <profil-desa-detail-pengunjung></profil-desa-detail-pengunjung>
        </div>
    </div>
    <!-- <div class="row">
	    <div class="container background" style="height: 50px">
	        <div class="card-title-home">Halaman ini diakses sebanyak:  kali</div>
	    </div>
	</div> -->
</div>
@include('template.footer2')
