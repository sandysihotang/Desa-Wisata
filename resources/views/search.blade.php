<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container-fluid" id="vue">
    <div class="container background">
        <div class="row form-group">
            <div class="title">Pencarian</div>
        </div>
        <search-page></search-page>
    </div>
</div>
@include('template.footer')
