<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Fasilitas Umum</div>
        <div class="row background">
            {{ $data->fasilitas_umum }}
        </div>
</div>
@include('template.footer')
