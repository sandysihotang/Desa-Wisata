<template>
    <div class="row">
        <div class="container-fluid">
            <div class="row background">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row mt-2">
                                    <div class="col-md-4 text-left card-caption-home">Nama Lengkap</div>
                                    <div class="col-md-8">
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
                                    <div class="col-md-4 text-left card-caption-home">Email</div>
                                    <div class="col-md-8">
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
                                    <div class="col-md-4 text-left card-caption-home">Username</div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" required v-model="user.username"/>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-center" v-if="'username' in err">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['username'][0] }}
                                            </span>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-2">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button @click="save" class="btn btn-new w-100" type="submit">Submit
                                        </button>
                                    </div>
                                    <div class="col-md-4" align="left">
                                        <button class="btn btn-new w-100" data-toggle="modal"
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
        <div class="modal fade" id="modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="sub-title" id="exampleModalLabel">Ubah
                            Password</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mt-2">
                                <div class="col-md-4 text-left card-caption-home">Password</div>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" required
                                           v-model="users.password"/>
                                </div>
                            </div>
                            <div class="row mt-3 mb-4"
                                 v-if="'password' in err">
                                <!--                                                            <div class="col-md-1"></div>-->
                                <div class="col-md-2"></div>
                                <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['password'][0] }}
                                            </span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 text-left card-caption-home">Konfirmasi Password
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" required
                                           v-model="users.password_confirmation"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-new-secondary"
                                data-dismiss="modal">Tutup
                        </button>
                        <button type="button" @click="changePassoword"
                                class="btn btn-new">Simpan
                        </button>
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
                    username: ''
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
                axios.post(`/edit-profile`, this.user)
                    .then(e => {
                        alert('Berhasil mengubah data pengguna.')
                        window.location.href = '/edit-profile'
                    })
                    .catch(e => {
                        this.err = e.response.data.errors
                    })
            },
            changePassoword() {
                axios.post(`/ubah-password-profile`, this.users)
                    .then(e => {
                        alert("Password berhasil diubah")
                        this.users.password = ''
                        this.users.password_confirmation = ''
                        window.location.href = '/edit-profile'
                    })
                    .catch(e => {
                        this.err = e.response.data.errors
                    })
            },
            getUser() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-user-member`)
                    .then(e => {
                        const {data} = e
                        this.user.name = data.nama_lengkap
                        this.user.email = data.email
                        this.user.username = data.username
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
