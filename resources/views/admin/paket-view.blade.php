<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="pull-right">
        <a href="/edit-paket/{{ $paket->id_pkt_wisata }}" class="btn btn-new">Edit</a>
        <button class="btn btn-new" data-toggle="modal" data-target="#Modal">Hapus</button>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus paket wisata {{ $paket->nama_wisata }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a href="{{ URL('/detail-paket/delete/'.$paket->id_pkt_wisata) }}" type="button" class="btn btn-primary">Hapus</a>
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
            <div class="carousel-paket-capt">mulai dari<br/>@currency($paket->harga_paket)</div>
        </div>
    </div>
</div>

<div class="container background">

    <div class="row form-group">
        <div class="col-md-6">
            <div class="detail-title">Jadwal Open Trip</div>
            <div class="detail-body" style="white-space: pre-wrap;">{{$paket->jadwal}}</div>

            <div class="detail-title">Harga</div>
            <div class="detail-body">@currency($paket->harga_paket) / orang</div>

            <div class="detail-title">Harga Termasuk</div>
            <div class="detail-body" style="white-space: pre-wrap;">{{$paket->harga_termasuk}}</div>

            <div class="detail-title">Harga Tidak Termasuk</div>
            <div class="detail-body" style="white-space: pre-wrap;">{{$paket->harga_tidak_termasuk}}</div>
        </div>

        <div class="col-md-6">
            <div class="detail-title">Itinerary</div>
            <div class="detail-body" style="white-space: pre-wrap;">{{$paket->itinerary}}</div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script type="text/javascript"> 
    function display() { 
        var txt; 
        txt = "hai</br>h</br>a</br>h</br>a"; 
        var text = txt.split("</br>"); 
        var str = text.join('\n'); 
        document.write(str); 
        // return str;
    } 
</script>