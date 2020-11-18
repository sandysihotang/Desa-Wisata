<template>
    <div>
        <div class="container-fluid">
            <div class="row background">
                <div class="container">
                    <div class="row">

                        <div class="container">
                            <div class="row mt-2">
                                <div class="col-md-2 text-left">Nama Lengkap</div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" required v-model="user.name"/>
                                </div>
                            </div>
                            <div class="row mt-2 justify-content-center" v-if="'name' in err">
                                <div class="col-md-2"></div>
                                <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['name'][0] }}
                                            </span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2 text-left">Email</div>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" required v-model="user.email"/>
                                </div>
                            </div>
                            <div class="row mt-2 mb-4 justify-content-center" v-if="'email' in err">
                                <div class="col-md-2"></div>
                                <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['email'][0] }}
                                            </span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2 text-left">Role</div>
                                <div class="col-md-7">
                                    <select id="myList" class="form-control" required v-model="user.role">
                                        <option value="superadmin">Superadmin</option>
                                        <option value="admin">Administrator</option>
                                        <option value="pengunjung">Pengunjung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <button @click="save" class="btn btn-submit w-100" type="submit">Submit</button>
                                </div>
                                <div class="col-md-3" align="left">
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row mt-2">
                                                            <div class="col-md-2 text-left">Password</div>
                                                            <div class="col-md-7">
                                                                <input class="form-control" type="password" required
                                                                       v-model="users.password"/>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2 mb-4 justify-content-center"
                                                             v-if="'password' in err">
<!--                                                            <div class="col-md-1"></div>-->
                                                            <div class="col-md-6">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['password'][0] }}
                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-2 text-left">Konfirmasi Password
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input class="form-control" type="password" required
                                                                       v-model="users.password_confirmation"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup
                                                    </button>
                                                    <button type="button" @click="changePassoword" class="btn btn-primary">Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-submit w-100" data-toggle="modal"
                                            data-target="#modal">Ubah Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    role: ''
                },
                users: {
                    password: '',
                    password_confirmation: ''
                },
                err: []
            }
        },
        methods: {
            save() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.post(`/edit-user/${id}`, this.user)
                    .then(e => {
                        alert('Berhasil mengubah data pengguna.')
                        window.location.href = '/kelola-user'
                    })
                    .catch(e => {
                        this.err = e.response.data.errors
                    })
            },
            changePassoword() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.post(`/ubahpassword/${id}`, this.users)
                    .then(e => {
                        alert("Password berhasil diubah")
                        this.users.password = ''
                        this.users.password_confirmation = ''
                    })
                    .catch(e => {
                        this.err = e.response.data.errors
                    })
            },
            getUser() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/userspesifik/${id}`)
                    .then(e => {
                        const {data} = e
                        this.user.name = data.nama_lengkap
                        this.user.email = data.email
                        this.user.role = data.role.nama_role
                    })
            }
        },
        mounted() {
            this.getUser()
        }
    }
</script>

<style scoped>

</style>
