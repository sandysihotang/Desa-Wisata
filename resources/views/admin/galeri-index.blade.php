<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Galeri</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-foto" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $galeri->links() }}                
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar Galeri</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($galeri as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>
                                <div data-city="{{$data->id_galeri}}" style="padding-top: 15px">
                                    <button onclick="readMore('{{$data->id_galeri}}')" class="btn btn-new myBtn" style="width: 165px">Tampilkan Gambar</button>
                                    <div style="padding-top: 15px">
                                        <span class="dots"></span>
                                        <span class="more" style="display: none;">
                                            <?php foreach (json_decode($data->file_foto)as $picture) { ?>
                                                <p><img src="{{ asset('/image/galeri/'.$picture) }}" style="width:200px; object-fit: cover;"/></p>
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $data->kategoriGaleri->nama_kategori }}</td>
                            <td>
                                <a href="/detail-galeri/{{$data->id_galeri}}" class="btn btn-new">Lihat</a>
                                <a href="/{{$data->id_galeri}}/edit-galeri" class="btn btn-new">Edit</a>
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
                                                Apakah anda yakin ingin menghapus galeri {{$data->judul}} ini?<br/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <a href="{{ URL('/hapus-galeri/'.$data->id_galeri) }}" type="button" class="btn btn-primary">Hapus</a>
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
