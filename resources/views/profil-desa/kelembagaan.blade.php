<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">Kelembagaan</div>
        <div class="row background">
            {{ $data->kelembagaan }}
        </div>
</div>
@include('template.footer')
