@include('admin.layouts.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Tambah Artikel</div>
        <!-- <div class="container">
            <a class="btn btn-new" href="/tambah-user">Tambah Baru</a>
        </div> -->
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
                <div class="row background" id="vue">
                    <div class="container">
                        <div class="row">
                            <editor-blog/>
                            <!-- <div class="col-md-2"></div> -->
                            <!-- <div class="col-md-8"> -->
                                <div class="container">
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Nama Lengkap</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Email</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Role</div>
                                        <div class="col-md-7">
                                            <select id = "myList" class="form-control">
                                                <option value = "1">Superadmin</option>
                                                <option value = "2">Administrator</option>
                                                <option value = "3">Pokdarwis</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Username</div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Password</div>
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
                            <!-- </div> -->
                            <!-- <div class="col-md-2"></div> -->
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@include('template.footer')
