@include('admin.layouts.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Profile User</div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid">
                <div class="row background" id="booking-wisata">
                    <div class="container">
                        <div class="row">
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
                                    <div class="row mt-2">
                                        <div class="col-md-2 text-left">Upload Foto</div>
                                        <div class="col-md-7">
                                            <input class="form-control file-upload" type="file"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7" align="left">
                                            <button class="btn btn-new-form">Edit</button>
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
@include('admin.layouts.footer')

