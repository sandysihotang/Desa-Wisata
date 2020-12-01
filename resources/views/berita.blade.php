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
                    <a href="/berita-detail/{{$data->id_berita}}"><img src="{{$data->file_foto}}" class="card-img2"></a>
                    <div class="container">
                        <div class="text-caption text-left" style="margin-top: 10px; font-family: 'BentonSans Regular">ditulis oleh {{ $data->penulis->nama_lengkap }}</a> |
                        <?php
                        $tanggal = $data->tanggal;
                        $bulan = array(
                            1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );

                        $pecahkan = explode('-', $tanggal);

                        // variabel pecahkan 0 = tahun
                        // variabel pecahkan 1 = bulan
                        // variabel pecahkan 2 = tanggal

                        echo $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

                        ?>
                    </div>
                        <a href="/berita-detail/{{$data->id_berita}}"> <div class="card-title-home">{{$data->judul_berita}}</div></a>
                        <div class="card-caption-home">
                            <?php
                            $html = $data->isi_berita;

                            if (preg_match_all('~<p>(?P<paragraphs>.*?)</p>~is', $html, $matches)) {
                                echo substr($matches['paragraphs'][0],0,200);
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
