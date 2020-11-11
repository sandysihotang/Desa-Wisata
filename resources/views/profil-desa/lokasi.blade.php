<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Lokasi Desa</div>
        <div class="row background">
            {{ $data->lokasi_desa }}
        </div>
</div>
@include('template.footer')
