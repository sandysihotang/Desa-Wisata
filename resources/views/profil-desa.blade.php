<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container" id="vue">
    <div class="title">{{ $data->nama_profil }}</div>
    <div class="row">
        <div class="container background">
            @if ($data->nama_profil == 'Lokasi')
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15946.0343004496!2d98.80435472673621!3d2.3339329727841225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e223ff4358fe1%3A0xcf40602c8b490108!2sMarbun%20Toruan%2C%20Bakti%20Raja%2C%20Kabupaten%20Humbang%20Hasundutan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1611886355329!5m2!1sid!2sid"
                class="w-100" height="450" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <br />
            @endif
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