<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')

<div class="container background">
    <div class="row form-group">
        <div class="title">Berita Desa</div>
    </div>

    <div class="row form-group">
        @if(count($list))
        @foreach($list as $data)
        <div class="col-md-4 form-group">
            <div class="card">
                <a href="/berita-detail/{{$data->id_berita}}"><img src="{{$data->file_foto}}" class="card-img2"></a>
                <div class="container">
                    <div class="text-caption text-left" style="margin-top: 10px; font-family: 'BentonSans Regular">
                        ditulis pada
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
                    <a href="/berita-detail/{{$data->id_berita}}">
                        <div class="card-title-home">{{$data->judul_berita}}</div>
                    </a>
                    <div class="card-caption-3baris">
                        <?php echo(strip_tags($data->isi_berita)); ?>
                    </div>
                    <div class="card-link">
                        <a href="{{ URL('/berita-detail/'.$data->id_berita) }}" style="padding-bottom-bottom: 10px">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-12 mt-lg-5 mb-lg-5">
            <br>
            <div class="jumbotron jumbotron-fluid w-100">
                <div class="container">
                    <h5 class="display-5  d-flex justify-content-center">Informasi berita desa belum
                        tersedia</h5>
                </div>
            </div>
            <br>
        </div>
        @endif
    </div>
    <!-- {{ $list->fragment('foo')->links() }} -->
    <ul class="pagination justify-content-center">
        {{ $list->links() }}
    </ul>
</div>

@include('template.footer2')
