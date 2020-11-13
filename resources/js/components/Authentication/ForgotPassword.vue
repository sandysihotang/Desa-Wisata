<template>
    <div class="container">
        <div v-if="!isEmailSend" class="row mt-4 mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 justify-content-center" style="background-color: white">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-8">
                            <p>Masukkan email Anda untuk me-reset password.</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="email" required/>
                        </div>
                    </div>
                    <div class="row mt-2 mb-4" v-if="'email' in err">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <span class="alert alert-danger" style="font-size: 10px" role="alert">
                                {{ err['email'][0] }}
                            </span>
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-7">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-5 mb-2" align="left">
                                        <button class="btn btn-primary" @click="resetPassword" style="width: 100%;">
                                            Reset
                                        </button>
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary" style="width: 100%;" @click="login">Cancel
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
        <div v-else class="row mt-4 mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 justify-content-center" style="background-color: white">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-8">
                            <p>Petunjuk untuk reset password telah dikirimkan ke alamat email anda.</p>
                            <p>Silahkan klik Reset Password</p>
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" style="width: 100%;" @click="login">Tutup
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
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                isEmailSend: false,
                err:[]
            }
        },
        methods: {
            resetPassword() {
                axios.post('/password/email', {email: this.email})
                    .then(e => {
                        this.isEmailSend = true
                    })
                    .catch(e => {

                        this.err = e.response.data.errors
                    })
            },
            login() {
                window.location.href = '/login'
            }
        }
    }
</script>

<style scoped>

</style>
