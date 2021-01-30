<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container">
    <div class="row">
        <div class="title">Mengelola Kategori Wisata</div>
        <!-- <div class="container" style="margin-bottom: 20px">
            <button class="btn btn-new" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Kategori Wisata</button>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="card-title-home" id="exampleModalLabel">Tambah Kategori Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('save-kat-wisata')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left">Nama Kategori</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="nama" required />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left"></div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-new-form" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Tambah</button>
                                    </div>
                                </div>
                                        
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="row form-group">
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="table-header">Daftar Kategori Wisata</div>
            <div class="container background">
                <table class="table-style">
                    <tr class="table-title">
                        <th>No.</th>
                        <th>@sortablelink('nama_kategori', 'Nama Kategori')</th>
                        <!-- <th>Icon</th> -->
                        <th width="40%">Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($kategori as $i => $data)
                        <tr class="table-content">
                            <td>{{ $kategori->firstItem() + $i }}</td>
                            <td>{{ $data->nama_kategori }}</td>
                            <!-- <td>
                                @if($data->icon != null)            
                                    <img src="{{ $data->icon }}" style="width:200px; height: 130px; object-fit: cover;"/>
                                @endif
                            </td> -->
                            <td>
                                <a href="/kelola-wisata/{{$data->id_kategori}}" class="btn btn-new-lihat"><i class="fa fa-eye"></i> Lihat Daftar Wisata</a>
                                <!-- <button class="btn btn-new" data-toggle="modal" data-target="#modalEdit {{ $i }}"><i class="fa fa-edit"></i> Edit</button>
                                <div class="modal fade" id="modalEdit {{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="card-title-home" id="exampleModalLabel">Edit Kategori Wisata</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{url('save-kat-wisata/'.$data->id_kategori)}}" enctype="multipart/form-data">
                                                    @method('patch')
                                                    {{csrf_field()}}
                                                    <div class="row mt-2">
                                                        <div class="col-md-4 text-left">Nama Kategori</div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" name="nama" required value="{{$data->nama_kategori}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-4 text-left"></div>
                                                        <div class="col-md-8">
                                                            <button type="submit" class="btn btn-new-form" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Edit</button>
                                                        </div>
                                                    </div>
                                                            
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                Apakah anda yakin ingin menghapus kategori wisata ini?<br/>
                                                Semua objek wisata dengan kategori {{$data->nama_kategori}} juga akan dihapus
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="{{ URL('/kat-wisata/delete/'.$data->id_kategori) }}" type="button" class="btn btn-new-hapus">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="container">
            <div class="pagination justify-content-center">
                {!! $kategori->appends(\Request::except('page'))->render() !!}              
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
