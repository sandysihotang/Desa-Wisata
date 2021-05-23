<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="container background">
    <div class="row form-group">
        <div class="title">Pengalaman Saya</div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-responsive-sm w-100">
                <table class="table w-100">
                    <tr>
                        <th>Tanggal</th>
                        <th width="50%">Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach($pengalaman as $val)
                    <tr>
                        <td><?php
                            $tanggal = $val->tanggal;
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

                            ?></td>
                        <td>{{ $val->judul_pengalaman }}</td>
                        <td>{{ $val->penulis->nama_lengkap }}</td>
                        <td>
                            @if($val->status == 1)
                            <span class="badge badge-secondary">Pending</span>
                            @else
                            <span class="badge badge-success">Diterima</span>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                @if($val->status == 1)
                                <a href="{{ URL('/edit-pengalaman/'.$val->id_pengalaman) }}" type="button"
                                   class="btn btn-new btn-sm">Edit</a>
                                @else
                                <a href="{{ URL('/pengalaman-wisata-detail/'.$val->id_pengalaman) }}" type="button"
                                   class="btn btn-new btn-sm">Lihat</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </table>
                <br>
            </div>
        </div>
    </div>
</div>

@include('template.footer2')
