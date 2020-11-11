<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Aksesibilitas</div>
        <div class="row background">
            {{ $data->aksesibilitas }}
        </div>
</div>
@include('template.footer')
