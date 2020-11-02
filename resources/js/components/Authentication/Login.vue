<template>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 justify-content-center" style="background-color: white">
                <div class="container">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-2 text-left">Username</div>
                        <div class="col-md-7">
                            <input class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-2 text-left">Password</div>
                        <div class="col-md-7">
                            <input class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-7">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6" align="left">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Ingat saya?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" style="width: 100%;">Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-7">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>
                                            <a href="/register" style="font-size: 10px">Daftar Sekarang</a>
                                        </b>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="/forgot-password" style="font-size: 9px;">Lupa password</a>
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
</template>

<script>
    export default {
        name: "Login"
    }
</script>

<style scoped>

</style>
