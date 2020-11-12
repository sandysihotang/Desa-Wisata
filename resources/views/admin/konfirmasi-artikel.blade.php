<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Persetujuan Artikel</div>
        <div class="container">
            <ul class="pagination pull-right page-all">
                <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left"
                                                                                aria-hidden="true"></b></a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right"
                                                                                         aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row form-group">
                <div class="col-md-12">
                    <div class="container background" id="vue">
                        <div class="row">
                            <konfirmasi-artikel></konfirmasi-artikel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('template.footer')
