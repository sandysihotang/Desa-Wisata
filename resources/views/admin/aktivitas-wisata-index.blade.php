<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Aktivitas Wisata</div>
        <div class="container" style="margin-bottom: 20px">
            <a href="/tambah-aktivitas" class="btn btn-new"><i class="fa fa-plus"></i> Tambah Aktivitas Wisata</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Aktivitas Wisata</div>
            <div class="table-responsive container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th style="width: 25%">@sortablelink('judul', 'Judul')</th>
                        <!-- <th></th> -->
                        <th style="width: 25%">Gambar</th>
                        <!-- <th>Kategori</th> -->
                        <th style ="width:30%">Aksi</th>
                    </tr>
                    @foreach($aktivitas as $key => $data)
                        <tr class="table-content">
                            <td>{{ $aktivitas->firstItem() + $key }}</td>
                            <td>{{ $data->judul }}</td>
                            <!-- <td>
                                @if($data->isUnggulan === 1)
                                    Unggulan
                                @endif
                            </td> -->
                            <td><img src="{{ $data->file_foto }}" style="width:200px; height: 130px; object-fit: cover;"/></td>
                            <td>
                                <a href="/detail-aktivitas-admin/{{$data->aktivitas_id}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="/edit-aktivitas/{{$data->aktivitas_id}}" class="btn btn-new"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $key }}"><i class="fa fa-trash"></i> Hapus</button>
                                <div class="modal fade" id="Modal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus aktivitas wisata {{$data->judul}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="{{ URL('/detail-aktivitas/delete/'.$data->aktivitas_id) }}" type="button" class="btn btn-new-hapus">Ya</a>
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
                {!! $aktivitas->appends(\Request::except('page'))->render() !!}            
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
