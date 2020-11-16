<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Kategori Wisata</div>
        <div class="container">
            <a href="/tambah-kat-wisata" class="btn btn-new">Tambah Baru</a>
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
            <div class="table-header">Daftar Kategori Wisata</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <!-- <th>Gambar</th> -->
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($kategori as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <a href="/kelola-wisata/{{$data->id_kategori}}" class="btn btn-new">Lihat Daftar Wisata</a>
                                <a href="/{{$data->id_kategori}}/edit-kat-wisata" class="btn btn-new">Edit</a>
                                <form action="/hapus-kat-wisata/{{ $data->id_kategori }}" method="post" class="d-inline">
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
