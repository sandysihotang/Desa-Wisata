/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Editor from 'vue-editor-js'
import moment from "moment";

Vue.use(Editor)
Vue.component('login', require('./components/Authentication/Login.vue').default);
Vue.component('forgot-password', require('./components/Authentication/ForgotPassword.vue').default);
Vue.component('reset-password', require('./components/Authentication/ResetPassword.vue').default);
Vue.component('editor-blog', require('./components/EditorBlog.vue').default);
Vue.component('wisata-desa-detail', require('./components/WisataDesaDetail.vue').default);
Vue.component('pengalaman-wisata-detail', require('./components/PengalamanWisataDetail.vue').default);
Vue.component('register', require('./components/Authentication/Register.vue').default);
Vue.component('konfirmasi-artikel', require('./components/KonfirmasiArtikel.vue').default);
Vue.component('detail-artikel', require('./components/DetailArtikel.vue').default);
Vue.component('kelola-user', require('./components/KelolaUser.vue').default);
Vue.component('tambah-user', require('./components/TambahUser.vue').default);
Vue.component('tambah-objek', require('./components/TambahObjek.vue').default);
Vue.component('detail-wisata-admin', require('./components/DetailWisataAdmin.vue').default);
const app = new Vue({
    el: '#vue',
    methods: {
        getDate(value) {
            moment.lang('id');
            return moment(value).format('Do MMMM YYYY');
        }
    }
});
