<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

<?php Session::get('success'); ?>

@include('admin.layouts.header')
<div class="container">
    @if(session()->has('notif'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
            <p class="alert-font">Paket Wisata tidak dapat dihapus. Terdapat pemesanan untuk paket yang dipilih</p>
        </div>
    @endif
    <div class="pull-right">
        <a href="/edit-paket/{{ $paket->id_pkt_wisata }}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
        <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal"><i class="fa fa-trash"></i> Hapus</button>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus paket wisata {{ $paket->nama_wisata }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                        <a href="{{ URL('/detail-paket/delete/'.$paket->id_pkt_wisata) }}" type="button" class="btn btn-new-hapus">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="title">Detail Paket Wisata</div>
</div>


<div class="container background" id='homes'>
    <div class="carousel container">
        <img src="{{$paket->file_foto}}" style="max-height: 400px !important; width: 100%;object-fit: cover;">
        <div class="carousel-in">
            <div class="carousel-paket">{{$paket->nama_paket}}</div>
            <div class="carousel-paket"> {{ $paket->paket }}</div>
            <div class="carousel-paket-capt">mulai dari<br/>@currency($paket->harga_paket)</div>
        </div>
    </div>
</div>

<div class="container background" id="vue">
    <paket-detail-admin></paket-detail-admin>
</div>
@include('admin.layouts.footer')