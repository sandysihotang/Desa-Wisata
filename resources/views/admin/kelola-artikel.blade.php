<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Artikel</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="{{ URL('/tambah-artikel') }}" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Artikel</a>
        </div>
        <div class="container">
            <div class="pagination pull-right">
                {!! $pengalaman->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue">
            <div class="table-header">Artikel Pengalaman Wisata</div>
            <table class="table-style">
                <tr class="table-title">
                    <th>@sortablelink('tanggal', 'Tanggal')</th>
                    <th width="40%">@sortablelink('judul_pengalaman', 'Judul')</th>
                    <th>Penulis</th>
                    <th width="30%">Aksi</th>
                </tr>
                <?php $id = 1;  ?>
                @foreach($pengalaman as $data)
                <tr class="table-content">
                    <td>
                        <date-template date="{{ $data->tanggal }}"></date-template>
                    </td>
                    <td>{{ $data->judul_pengalaman }}</td>
                    <td>{{ $data->penulis->nama_lengkap }}</td>
                    <td>
                        <a href="{{ URL('/lihat-artikel/'.$data->id_pengalaman) }}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="{{ URL('/edit-artikel/'.$data->id_pengalaman) }}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $id }}"><i class="fa fa-trash"></i> Hapus</button>
                        <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus pengalaman wisata ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                        <a href="{{ URL('/detail-artikel/delete/'.$data->id_pengalaman) }}" type="button" class="btn btn-new-hapus">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $id++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>


@include('admin.layouts.footer')

