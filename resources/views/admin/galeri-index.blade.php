<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Galeri</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-foto" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Galeri</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Galeri</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th width="30%">@sortablelink('judul', 'Judul')</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th width="30%">Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($galeri as $i => $data)
                        <?php $listFoto = App\Models\GaleriDesa::where('kategori_foto_id', '=', $data->id_sub_kat_galeri)->get();?>
                        <tr class="table-content">
                            <td>{{ $galeri->firstItem() + $i }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>
                                <div data-city="{{$data->id_sub_kat_galeri}}" style="padding-top: 15px">
                                    <button onclick="readMore('{{$data->id_sub_kat_galeri}}')" class="btn btn-new-lihat myBtn">Tampilkan</button>
                                    <div style="padding-top: 15px">
                                        <span class="dots"></span>
                                        <span class="more" style="display: none;">
                                            <?php foreach ($listFoto as $picture) { ?>
                                                <p>
                                                    <img src="{{ asset($picture->file_foto) }}" style="width:200px; object-fit: cover;"/>
                                                </p>
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $data->kategoriGaleri->nama_kategori }}</td>
                            <td>
                                <a href="/detail-galeri/{{$data->id_sub_kat_galeri}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="/{{$data->id_sub_kat_galeri}}/edit-galeri" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
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
                                                Apakah anda yakin ingin menghapus galeri {{$data->judul}} ini?<br/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="{{ URL('/hapus-galeri/'.$data->id_sub_kat_galeri) }}" type="button" class="btn btn-new">Ya</a>
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
        <div class="container">
            <div class="pagination justify-content-center">
                {{ $galeri->links() }}                
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
            btnText.textContent = "Tampilkan";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.textContent = "Tutup";
            moreText.style.display = "inline";
        }
    }
</script>
