<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Kontak Pengelola</div>
        <div class="container" style="margin-bottom: 20px">
            <!-- <a href="{{ URL('/tambah-profil-desa') }}" class="btn btn-new">Tambah Baru</a> -->
            <button class="btn btn-new" data-toggle="modal" data-target="#modalTambah">Tambah Baru</button>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="card-title-home" id="exampleModalLabel">Tambah Kontak Pengelola</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('simpan-kontak')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left">Nama</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="nama"/>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left">Tanggung Jawab</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="tanggungjawab"/>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left">No. HP</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="no_hp"/>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left">Email</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="email"/>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left"></div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-new" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Submit</button>
                                    </div>
                                </div>
                                        
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class=" pull-right">
                {{ $list->links() }}                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue">
            <div class="table-header" style="width: 100%;">Daftar Kontak Pengelola</div>
            <table class="table-style" style="width: 100%;">
                <tr class="table-title">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggung Jawab</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                <?php $id = 1;  ?>
                @foreach($list as $data)
                <tr class="table-content">
                    <td>{{$id}}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->posisi }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <button class="btn btn-new" data-toggle="modal" data-target="#modalEdit {{ $id }}">Edit</button>
                        <div class="modal fade" id="modalEdit {{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="card-title-home" id="exampleModalLabel">Edit Kontak Pengelola</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{url('/edit-kontak/'.$data->id_kontak)}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row mt-2">
                                                <div class="col-md-4 text-left">Nama</div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="nama" value="{{ $data->nama }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4 text-left">Tanggung Jawab</div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="tanggungjawab" value="{{ $data->posisi }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4 text-left">No. HP</div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="no_hp" value="{{ $data->no_hp }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4 text-left">Email</div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="email" value="{{ $data->email }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4 text-left"></div>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-new" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i>Submit</button>
                                                </div>
                                            </div>
                                                    
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-new" data-toggle="modal" data-target="#Modal{{ $id }}">Hapus</button>
                        <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus kontak ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <a href="{{ URL('/hapus-kontak/'.$data->id_kontak) }}" type="button" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $id++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
