<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <p class="h2 font-weight-bold text-center">LUPA PASSWORD</p>
                </div>
                <div class="row" id="vue" style="background-color: #f7f7f7;width: 100%;">
                    <forgot-password></forgot-password>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
