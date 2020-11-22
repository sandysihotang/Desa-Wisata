@include('template.header')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="container">
    <div class="row form-group">
        <div class="title">PENGALAMAN WISATA</div>
    </div>
    <div class="row form-group">
        @if(Auth::check())
            <div class="row mt-2">
                <div class="col-md-12">
                    <a class="btn btn-success float-right" href="{{ route('create-blog') }}" style="font-family: 'BentonSans Medium'">Tambah Cerita</a>
                </div>
            </div>
        @endif
        <?php $cnt = 1; ?>
        @foreach($pengalaman as $data)
            @if($cnt == 1)
                <div class="row justify-content-center">
            @endif
            <div class="col-md-4 form-group">
                <div class="card">
                    <a href="wisata-desa-detail"><img src="{{ $data->gambar }}" class="card-img2"></a>
                    <div class="container">
                        <div class="text-caption text-left">
                            ditulis oleh <a href="#">{{ $data->penulis->nama_lengkap}}</a> |
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
                        <a href="/wisata-desa-detail/{{$data->id_obj_wisata}}"> <div class="card-title2">{{$data->judul_pengalaman}}</div></a>
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
                        <div class="text-caption text-left">
                            <a href="{{ URL('/pengalaman-wisata-detail/'.$data->id_pengalaman) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
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
        @endforeach
            <ul class="pagination justify-content-center">
               {{ $pengalaman->links() }}
            </ul>
    </div>
</div>

@include('template.footer')
