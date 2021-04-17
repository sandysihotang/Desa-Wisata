<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

<?php Session::get('success'); ?>

@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Paket Wisata</div>
        <div class="col-md-12">
            <div class="container"> 
                @if(session()->has('notif'))
                    <div class="alert alert-danger">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button> -->
                        <p class="alert-font">Paket Wisata tidak dapat dihapus. Terdapat pemesanan untuk paket yang dipilih</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-paket" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Paket</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Paket Wisata</div>
            <div class="table-responsive container">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th width="35%">@sortablelink('nama_paket', 'Nama Paket')</th>
                        <th>@sortablelink('harga_paket', 'Harga')</th>
                        <th>Foto Sampul</th>
                        <th width="30%">Aksi</th>
                    </tr>
                    @foreach($list as $i => $data)
                        <tr class="table-content">
                            <td>{{ $list->firstItem() + $i }}</td>
                            <td>{{ $data->nama_paket }} - {{ $data->paket }}</td>
                            <td>@currency($data->harga_paket)</td>
                            <td> <img src="{{ $data->file_foto }}" style="width:200px; height: 130px; object-fit: cover;"/></td>
                            <td>
                                <a href="/detail-paket/{{$data->id_pkt_wisata}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="/edit-paket/{{$data->id_pkt_wisata}}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $i }}"><i class="fa fa-trash"></i> Hapus</button>
                                <div class="modal fade" id="Modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus paket wisata {{ $data->nama_paket }} ini?<br/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="{{ URL('/detail-paket/delete/'.$data->id_pkt_wisata) }}" type="button" class="btn btn-new-hapus">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="container">
            <div class="pagination justify-content-center">
                {!! $list->appends(\Request::except('page'))->render() !!}             
            </div>
        </div>
    </div>

</div>
    

@include('admin.layouts.footer')

<script type="text/javascript">
    function readMore(id) {
        let dots = document.querySelector(`[data-city="${id}"] .dots`);
        let moreText = document.querySelector(`[data-city="${id}"] .more`); 
        let btnText = document.querySelector(`[data-city="${id}"] .myBtn`);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.textContent = "Tampilkan Gambar";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.textContent = "Tutup"; 
            moreText.style.display = "inline";
        }
    }
</script>
