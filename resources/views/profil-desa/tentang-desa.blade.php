<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Tentang Desa</div>
        <div class="row background">
            {{ $data->nama_desa }}
        </div>
</div>
@include('template.footer')
