<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Potensi dan Daya Tarik</div>
        <div class="row background">
            {{ $data->daya_tarik_desa }}
        </div>
</div>
@include('template.footer')
