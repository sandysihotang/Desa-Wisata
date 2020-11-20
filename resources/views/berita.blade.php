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
                        <div class="card-caption-home">
                            <?php
                            $peng = json_decode($data->isi_berita, true);
                            foreach ($peng['blocks'] as $temp) {
                                if ($temp['type'] == 'paragraph') {
                                    echo substr($temp['data']['text'], 0, 200);
                                    break;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- {{ $list->fragment('foo')->links() }} -->
    <ul class="pagination justify-content-center">
       {{ $list->links() }}
    </ul>
</div>    

@include('template.footer')