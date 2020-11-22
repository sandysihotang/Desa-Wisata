<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
        <div class="title">{{ $kategori->nama_kategori}}</div>
    </div>
        
    <div class="row form-group">
        @foreach($list as $data)
            <div class="col-md-4 form-group">
                <div class="card">
                    <a href="wisata-desa-detail"><img src="{{$data->file_foto}}" class="card-img2"></a>
                    <div class="container">
                        <div class="card-kategori">{{$kategori->nama_kategori}}</div>
                        <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"> <div class="card-title2">{{$data->nama_wisata}}</div></a>
                        <div class="card-caption">
                            <?php
                                $peng = json_decode($data->deskripsi, true);
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

    <ul class="pagination justify-content-center">
       {{ $list->links() }}
    </ul>
</div>    

@include('template.footer')