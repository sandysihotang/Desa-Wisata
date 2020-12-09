<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container background">
    <div class="row form-group">
        <div class="title">Edit Pengalaman Saya</div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" id="vue">
            <edit-pengalaman/>
        </div>
    </div>
</div>

@include('template.footer2')
