<template>
    <div class="row" style="background-color: #f7f7f7;width: 100%;">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col-md-3"></div>
                <div class="col-md-6 justify-content-center" style="background-color: white">
                    <div class="container">
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-3 text-left">Password</div>
                            <div class="col-md-7">
                                <input class="form-control" type="password" v-model="password"/>
                            </div>
                        </div>
                        <div class="row mt-2 mb-1 justify-content-center" v-if="'password' in err">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="container">
                                    <div class="row" v-for="val in err['password']">
                                        <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                            {{ val }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-3 text-left">Konfirmasi Password</div>
                            <div class="col-md-7">
                                <input class="form-control" type="password" v-model="confirmation_password"/>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-7">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6" align="left">
                                        </div>
                                        <div class="col-md-6">
                                            <button @click="reset_password" class="btn btn-primary"
                                                    style="width: 100%;">Reset
                                            </button>
                                        </div>
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
</template>

<script>
    export default {
        data() {
            return {
                password: '',
                confirmation_password: '',
                err: []
            }
        },
        methods: {
            reset_password() {
                var url = window.location.pathname;
                var token = url.substring(url.lastIndexOf('/') + 1);
                var urls = new URL(window.location.href);
                var email = urls.searchParams.get("email");
                axios.post('/password/reset', {
                    token: token,
                    email: email,
                    password: this.password,
                    password_confirmation: this.confirmation_password
                })
                    .then(e => {
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
