<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container" id="vue">
    <div class="row">
        <div class="title">Mengelola User</div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row" style="margin-bottom: 20px">
                <a class="btn btn-new" href="/tambah-user"><i class="fa fa-plus"></i> Tambah User</a>
            </div>
            <div class="row form-group">
                <div class="table-header" style="width: 100%;">Daftar User</div>
                <div class="table-responsive container">
                    <table class="table-style" style="width: 100%;">
                        <tr class="table-title">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($user as $val)
                        <tr class="table-content">
                            <td>{{ $val->nama_lengkap }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->username }}</td>
                            <td>{{ $val->role->nama_role }}</td>
                            <td>
                                @if((($val->role->nama_role == 'pengunjung' || $val->role->nama_role == 'admin') &&
                                App\Models\Role::find(Auth::user()->role_id)->nama_role == 'admin') ||
                                App\Models\Role::find(Auth::user()->role_id)->nama_role == 'super_admin')
                                    <a href="{{ URL('/edit-user/'.$val->id_user)}}" class="btn btn-new">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                @endif
                                @if((($val->role->nama_role == 'pengunjung' || $val->role->nama_role == 'admin') &&
                                App\Models\Role::find(Auth::user()->role_id)->nama_role == 'admin') ||
                                App\Models\Role::find(Auth::user()->role_id)->nama_role == 'super_admin')
                                    <button data-toggle="modal" data-target="#Modal{{$val->id_user}}"
                                            class="btn btn-new-hapus">
                                            <i class="fa fa-trash"></i> Hapus
                                    </button>
                                    <div class="modal fade" id="Modal{{$val->id_user}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda yakin ingin menghapus pengguna ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-new-secondary"
                                                            data-dismiss="modal">Tidak
                                                    </button>
                                                    <a class="btn btn-new-hapus"
                                                       href="{{ URL('/hapus-user/'.$val->id_user) }}">Ya
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')

