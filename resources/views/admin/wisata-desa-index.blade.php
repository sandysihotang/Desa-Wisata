<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Objek Wisata</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-objek" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $objek->links() }}                
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar Objek Wisata</div>
            <div class="table-responsive container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th style="width: 25%">Nama Wisata</th>
                        <th></th>
                        <th style="width: 25%">Gambar</th>
                        <th>Kategori</th>
                        <th style ="width:25%">Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($objek as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td>{{ $data->nama_wisata }}</td>
                            <td>
                                @if($data->isUnggulan === 1)
                                    Unggulan
                                @endif
                            </td>
                            <td><img src="{{ $data->file_foto }}" style="width:200px; height: 130px; object-fit: cover;"/></td>
                            <td>{{ $data->kategoriWisata->nama_kategori }}</td>
                            <td>
                                <a href="/detail-wisata-admin/{{$data->id_obj_wisata}}" class="btn btn-new">Lihat</a>
                                <a href="/edit-obj-wisata/{{$data->id_obj_wisata}}" class="btn btn-new">Edit</a>
                                <button class="btn btn-new" data-toggle="modal" data-target="#Modal{{ $i }}">Hapus</button>
                                <div class="modal fade" id="Modal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus objek wisata {{$data->nama_wisata}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <a href="{{ URL('/detail-wisata/delete/'.$data->id_obj_wisata) }}" type="button" class="btn btn-primary">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
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
