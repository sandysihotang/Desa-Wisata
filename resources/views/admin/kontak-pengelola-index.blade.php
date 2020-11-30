<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row">
        <div class="title">Mengelola Kontak Pengelola</div>
        <div class="container" style="margin-bottom: 20px">
            <!-- <a href="{{ URL('/tambah-profil-desa') }}" class="btn btn-new">Tambah Baru</a> -->
            <button class="btn btn-new" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Kontak</button>
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
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="vue" style="margin-bottom: 20px">
            <div class="table-header" style="width: 100%;">Daftar Kontak Pengelola</div>
            <table class="table-style" style="width: 100%;">
                <tr class="table-title">
                    <th>No</th>
                    <th width="25%">@sortablelink('nama', 'Nama')</th>
                    <th width="25%">@sortablelink('posisi', 'Tanggung Jawab')</th>
                    <th>No. HP</th>
                    <th>@sortablelink('email', 'Email')</th>
                    <th width="18%">Aksi</th>
                </tr>
                @foreach($list as $id => $data)
                <tr class="table-content">
                    <td>{{ $list->firstItem() + $id}}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->posisi }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <button class="btn btn-new" data-toggle="modal" data-target="#modalEdit {{ $id }}"><i class="fa fa-edit"></i> Edit</button>
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
                        <button class="btn btn-new-hapus" data-toggle="modal" data-target="#Modal{{ $id }}"><i class="fa fa-trash"></i> Hapus</button>
                        <div class="modal fade" id="Modal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus kontak ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                        <a href="{{ URL('/hapus-kontak/'.$data->id_kontak) }}" type="button" class="btn btn-new-hapus">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="container">
            <div class="pagination justify-content-center">
                {!! $list->appends(\Request::except('page'))->render() !!}               
            </div>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
