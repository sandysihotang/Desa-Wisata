<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Objek Wisata</div>
        <div class="container">
            <a href="/tambah-foto" class="btn btn-new">Tambah Baru</a>
        </div>
        <div class="container">
            <ul class="pagination pull-right">
                <li class="page-item"><a class="page-link page-new" href="#"><b class="fa fa-angle-left" aria-hidden="true"></b></a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">1</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">2</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#">3</a></li>
                <li class="page-item page-new"><a class="page-link page-new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar Objek Wisata</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>Nama Wisata</th>
                        <th>Gambar</th>
                        <th>Kategori Wisata</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($objek as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td>{{ $data->nama_wisata }}</td>
                            <td><img src="{{ $data->file_foto }}" style="width:200px; object-fit: cover;"/></td>
                            <td>{{ $data->kategoriWisata->nama_kategori }}</td>
                            <td>
                                <a href="/detail-wisata/{{$data->id_obj_wisata}}" class="btn btn-new">Lihat</a>
                                <a href="/{{$data->id_obj_wisata}}/edit-obj-wisata" class="btn btn-new">Edit</a>
                                <form action="/hapus-wisata/{{ $data->id_obj_wisata }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-new">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
    

@include('template.footer')

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
