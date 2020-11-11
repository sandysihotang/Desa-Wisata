<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
        <div class="title">Berita Desa</div>
    </div>
        
    <div class="row form-group">
        @foreach($list as $data)
            <div class="col-md-4 form-group">
                <div class="card">
                    <a href="wisata-desa-detail"><img src="{{$data->file_foto}}" class="card-img2"></a>
                    <div class="container">
                        <a href="/berita-detail/{{$data->id_berita}}"> <div class="card-title-home">{{$data->judul_berita}}</div></a>
                        <div class="card-caption-home">{{substr($data->isi_berita, 0, 200)}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- {{ $list->fragment('foo')->links() }} -->
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left" aria-hidden="true"></b></a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
        <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
    </ul>
</div>    

@include('template.footer')