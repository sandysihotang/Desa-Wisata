@include('template.header')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<div class="row mt-4">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <p class="h2 font-weight-bold text-center">PENGALAMAN WISATA</p>
                </div>
                <div class="row" id="booking-wisata" style="background-color: #f7f7f7;width: 100%;">
                    <div class="container">
                        @if(Auth::check())
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a class="btn btn-success float-right" href="{{ route('create-blog') }}">Tambah
                                    Cerita</a>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-4">
                            <div class="container">
                                <?php $cnt = 1; ?>
                                @foreach($pengalaman as $data)
                                @if($cnt == 1)
                                <div class="row justify-content-center">
                                    @endif
                                    <div class="col-md-4 mt-2">
                                        <q-card class="my-card">
                                            <img src="{{ $data->gambar }}" class="card-img2">

                                            <q-card-section>
                                                <div class="text-caption text-left">ditulis oleh <a href="{{ URL('/pengalaman-wisata?sort_penulis='.$data->penulis_id) }}">{{
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
                                                <div class="card-title2">{{ $data->judul_pengalaman }}
                                                </div>
                                                <div class="card-caption">
                                                    <?php
                                                    $peng = json_decode($data->isi_pengalaman, true);
                                                    foreach ($peng['blocks'] as $temp) {
                                                        if ($temp['type'] == 'paragraph') {
                                                            echo substr($temp['data']['text'], 0, 200);
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="text-caption text-left"><a
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
    </div>
</div>
</div>
@include('template.footer')
