<template>
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-md-12">
                <p class="h2 font-weight-bold text-center">DAFTAR</p>
            </div>
            <div class="row" style="background-color: #f7f7f7;width: 100%;">
                <div class="container">
                    <div class="row mt-4 mb-4">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 justify-content-center" style="background-color: white">
                            <div class="container">
                                <form @submit.prevent="register()">
                                    <div class="row mt-4 justify-content-center">
                                        <div class="col-md-2 text-left">Nama</div>
                                        <div class="col-md-7">
                                            <input required class="form-control" v-model="user.name" type="text"/>
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
                                    <div class="row mt-4 justify-content-center">
                                        <div class="col-md-2 text-left">Email</div>
                                        <div class="col-md-7">
                                            <input required class="form-control" v-model="user.email" type="text"/>
                                        </div>
                                    </div>
                                    <div class="row mt-2 justify-content-center" v-if="'email' in err">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-7">
                                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                                {{ err['email'][0] }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-4 justify-content-center">
                                        <div class="col-md-2 text-left">Username</div>
                                        <div class="col-md-7">
                                            <input required class="form-control" v-model="user.username" type="text"/>
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
                                    <div class="row mt-4 justify-content-center">
                                        <div class="col-md-2 text-left">Password</div>
                                        <div class="col-md-7">
                                            <input required class="form-control" v-model="user.password"
                                                   type="password"/>
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
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6" align="left">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-primary"
                                                                style="width: 100%;" type="submit">Daftar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <b>
                                                        <a href="/login" style="font-size: 10px">Sudah memiliki
                                                            akun</a>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 mb-2">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <p style="width: 100%; text-align: center; border-bottom: 1px solid #000; line-height: 0.1em;margin: 10px 0 20px;">
                                                    <span style="background:#fff; padding:0 10px;">atau</span></p>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2" style="">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <a class="btn btn-social btn-facebook text-center" href="/login/facebook"
                                                   style="color: white; background-color: #043A77;width: 100%">
                                                    <i class="fa fa-facebook fa-fw"></i>LOGIN DENGAN FACEBOOK
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4" style="">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <a class="btn btn-social btn-facebook text-center" href="/login/google"
                                                   style="color: white; background-color: #E32121;width: 100%;">
                                                    <i class="fa fa-google fa-fw"></i>LOGIN DENGAN GOOGLE
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
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
                    username: '',
                    email: '',
                    password: '',
                    name: ''
                },
                err: [],
            }
        },
        methods: {
            register() {
                axios.post('register', this.user)
                    .then(res => {
                        window.location.href = '/';
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
