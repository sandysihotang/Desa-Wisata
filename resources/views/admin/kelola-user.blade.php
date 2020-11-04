<!-- <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet"> -->
@include('admin.layouts.header')
<div class="container">

    <div class="row form-group">
        <div class="title">Mengelola User</div>
        <div class="container">
            <a class="btn btn-new" href="/tambah-user">Tambah Baru</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="table-header">Daftar User</div>
            <div class="container background">
                <table class="table-style background">
                    <tr class="table-title">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    <tr class="table-content">
                        <td>Yohanssen Sinaga</td>
                        <td>yohanssen.sinaga@gmail.com</td>
                        <td>yonaga</td>
                        <td>admin</td>
                        <td>
                            <a href="" class="btn btn-new">Lihat</a>
                            <a href="" class="btn btn-new">Edit</a>
                            <a href="" class="btn btn-new">Hapus</a>
                        </td>
                    </tr>
                    <tr class="table-content">
                        <td>Arnaldo Sinaga</td>
                        <td>arnaldo_sinaga@gmail.com</td>
                        <td>arnaldo</td>
                        <td>member</td>
                        <td>
                            <a href="" class="btn btn-new">Lihat</a>
                            <a href="" class="btn btn-new">Edit</a>
                            <a href="" class="btn btn-new">Hapus</a>
                        </td>
                    </tr>
                    <tr class="table-content">
                        <td>Verawaty</td>
                        <td>verawaty@gmail.com</td>
                        <td>verawaty</td>
                        <td>member</td>
                        <td>
                            <a href="" class="btn btn-new">Lihat</a>
                            <a href="" class="btn btn-new">Edit</a>
                            <a href="" class="btn btn-new">Hapus</a>
                        </td>
                    </tr>
                    <tr class="table-content">
                        <td>Desy Isabel</td>
                        <td>dedesy@gmail.com</td>
                        <td>desy.isabel</td>
                        <td>admin</td>
                        <td>
                            <a href="" class="btn btn-new">Lihat</a>
                            <a href="" class="btn btn-new">Edit</a>
                            <a href="" class="btn btn-new">Hapus</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    

@include('template.footer')
