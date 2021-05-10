<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4 ml-2">
    <div class="container-fluid" id="vue">
        <div class="row" align="center">
            <div class="col-md-12">
                <p class="h2 font-weight-bold text-center">LOGIN</p>
            </div>
            <div class="row" style="background-color: #f7f7f7;width: 100%;">
                <login/>
            </div>
        </div>
    </div>
</div>
@include('template.footer2')
