<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Persetujuan Artikel</div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="container" id="vue">
                        <div class="row">
                            <konfirmasi-artikel></konfirmasi-artikel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')

