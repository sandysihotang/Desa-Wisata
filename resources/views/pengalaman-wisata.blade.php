<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<div class="container">
    <div class="row form-group">
        <div class="title">PENGALAMAN WISATA</div>
    </div>
    <div class="row form-group" id="berita-terbaru">
        <div class="container-fluid background">
            @if(Auth::check())
            <div class="row mt-2">
                <div class="col-md-12">
                    <a class="btn btn-success float-right" href="{{ route(App\Models\Role::find(Auth::user()->role_id)->nama_role == 'pengunjung'?'create-blog':'tambah-artikel') }}">Tambah
                        Cerita</a>
                </div>
            </div>
            @else
            <div class="row mt-2">
                <div class="col-md-12">
                    <a class="btn btn-success float-right" href="{{ URL('/login') }}">Tambah
                        Cerita</a>
                </div>
            </div>
            @endif
            <div class="row mt-4">

                @if(count($pengalaman))
                <div class="container">
                    <?php $cnt = 1; ?>
                    @foreach($pengalaman as $data)
                    @if($cnt == 1)
                    <div class="row justify-content-center mt-lg-5 mb-lg-5">
                        @endif
                        <div class="col-md-4 mt-2">
                            <q-card class="my-card" style="margin-bottom: 15px">
                                <img src="{{ $data->gambar }}" class="card-img2">

                                <q-card-section>
                                    <div class="text-caption text-left">ditulis oleh <a
                                            href="{{ URL('/pengalaman-wisata?sort_penulis='.$data->penulis_id) }}">{{
                                            $data->penulis->nama_lengkap
                                            }}</a> |
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
                                    <div class="card-title2">
                                        <a href="{{ URL('/pengalaman-wisata-detail/'.$data->id_pengalaman) }}">{{ $data->judul_pengalaman }}</a>
                                    </div>
                                    <div class="card-caption">
                                        <?php
                                        echo(substr(strip_tags($data->isi_pengalaman),0,200));
                                        ?>
                                    </div>
                                    <div class="text-caption text-left card-link"><a
                                            href="{{ URL('/pengalaman-wisata-detail/'.$data->id_pengalaman) }}">Baca
                                            Selengkapnya</a>
                                    </div>
                                </q-card-section>

                            </q-card>
                        </div>
                        <?php $cnt++; ?>
                        @if($cnt == 4)
                        <?php $cnt = 1 ?>
                    </div>
                    @endif
                    @endforeach
                    @if($cnt != 1)
                </div>
                @endif
                @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-lg-5 mb-lg-5">
                            <br>
                            <div class="jumbotron jumbotron-fluid w-100">
                                <div class="container">
                                    <h5 class="display-5  d-flex justify-content-center">Informasi pengalaman wisata belum
                                        tersedia</h5>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row mt-4 mb-4 justify-content-center">
            <ul class="pagination justify-content-center">
                {{ $pengalaman->links() }}
            </ul>
        </div>
    </div>
</div>
</div>
@include('template.footer2')
