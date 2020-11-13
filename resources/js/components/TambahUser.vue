<template>
    <div>
        <div class="container-fluid">
            <div class="row background">
                <div class="container">
                    <div class="row">

                        <div class="container">
                            <form @submit.prevent="save">
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
                                <div class="row mt-2">
                                    <div class="col-md-2 text-left">Username</div>
                                    <div class="col-md-7">
                                        <input class="form-control" type="text" required v-model="user.username"/>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-4 justify-content-center" v-if="'username' in err">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['username'][0] }}
                                            </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2 text-left">Password</div>
                                    <div class="col-md-7">
                                        <input class="form-control" type="password" required v-model="user.password"/>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-4 justify-content-center" v-if="'password' in err">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['password'][0] }}
                                            </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2 text-left">Konfirmasi Password</div>
                                    <div class="col-md-7">
                                        <input class="form-control" type="password" required
                                               v-model="user.password_confirmation"/>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7" align="left">
                                        <button class="btn btn-submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-md-2"></div> -->
                    </div>
                </div>
            </div>
            <!-- </div> -->
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
                    password: '',
                    password_confirmation: '',
                    username: '',
                    role: 'superadmin'
                },
                err: []
            }
        },
        methods: {
            save() {
                axios.post('/tambah-user', this.user)
                    .then(e => {
                        alert('Berhasil mendaftarkan pengguna.')
                        window.location.href = '/kelola-user'
                    })
                    .catch(e => {
                        this.err = e.response.data.errors
                    })
            }
        }
    }
</script>

<style scoped>

</style>
