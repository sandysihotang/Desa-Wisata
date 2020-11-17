<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container"><div class="title">{{$data->nama_profil}}</div>
        <div class="row background">
            {{ $data->deskripsi }}
        </div>
</div>
@include('template.footer')
