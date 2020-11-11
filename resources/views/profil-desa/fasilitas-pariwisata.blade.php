<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Fasilitas Pariwisata</div>
        <div class="row background">
            {{ $data->fasilitas_wisata }}
        </div>
</div>
@include('template.footer')
