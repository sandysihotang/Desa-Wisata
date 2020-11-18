@include('admin.layouts.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Tambah Foto</div>
        <!-- <div class="container">
            <a class="btn btn-new" href="/tambah-user">Tambah Baru</a>
        </div> -->
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
                <div class="row background" id="vue">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-left">Kategori Galeri</div>
                                        <div class="col-md-8">
                                            <!-- <input class="form-control" type="text"/> -->
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="">Daftar Kategori</option>
                                                @foreach ($kategori as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-2">
                                        <div class="col-md-2 text-left">Submenu</div>
                                        <div class="col-md-7">
                                        <select name="subKat" id="subKat" class="form-control">
                                            <option value="">== Select City ==</option>
                                        </select>
                                        </div>
                                    </div> -->
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-left">Judul</div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Unggah Foto</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="password"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Konfirmasi Password</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="password"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7" align="left">
                                            <button class="btn btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-2"></div> -->
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script>
    // $(function () {
    //     $('#kategori').on('change', function () {
    //         axios.post('route('tambah-foto') }}', {id: $(this).val()})
    //             .then(function (response) {
    //                 $('#subKat').empty();

    //                 $.each(response.data, function (id, name) {
    //                     $('#subKat').append(new Option(name, id))
    //                 })
    //             });
    //     });
    // });
</script>

