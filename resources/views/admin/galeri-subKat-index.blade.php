<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Pesanan Paket Wisata</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($subKat as $data)
                        <tr class="table-content">
                            <td>{{ $i }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>                                
                                <div data-city="{{$data->id_galeri}}" style="padding-top: 15px">
                                    <button onclick="readMore('{{$data->id_galeri}}')" class="btn btn-new myBtn" style="width: 200px">Tampilkan Gambar</button>
                                    <div class="container" style="padding-top: 15px">
                                        <span class="dots"></span>
                                        <span class="more" style="display: none;">
                                            <?php foreach (json_decode($data->file_foto)as $picture) { ?>
                                                <img src="{{ asset('/image/galeri/'.$picture) }}" style="width:200px; object-fit: cover;"/>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    
                                </div>
                            </td>
                            <td>
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Lihat</a>
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Edit</a>
                                <a href="/view-pesanan/{{$data->id_kategori_galeri}}" class="btn btn-new">Hapus</a>
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
