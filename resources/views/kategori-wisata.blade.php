<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
        <div class="title">{{ $kategori->nama_kategori}}</div>
    </div>
        
    <div class="row form-group" id="berita-terbaru">
        @foreach($list as $data)
            <div class="col-md-4 form-group">
                <q-card class="my-card">
                    <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"><img src="{{$data->file_foto}}" class="card-img2"></a>
                    <div class="container">
                        <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"> <div class="card-title2">{{$data->nama_wisata}}</div></a>
                        <div class="card-caption">
                            <?php
                            $html = $data->deskripsi;

                            if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                echo substr($matches['paragraphs'][0],0,200);
                            }
                            ?>
                        </div>
                    </div>
                </q-card>
            </div>
        @endforeach
    </div>

    <ul class="pagination justify-content-center">
       {{ $list->links() }}
    </ul>
</div>    

@include('template.footer')