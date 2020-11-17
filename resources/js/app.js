/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Editor from 'vue-editor-js'

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
Vue.component('edit-objek', require('./components/EditObjek.vue').default);
Vue.component('wisata-desa-detail-admin', require('./components/WisataDesaDetailAdmin.vue').default);
Vue.component('date-template', require('./components/DateTemplate.vue').default);
Vue.component('edit-blog', require('./components/EditBlog.vue').default);
Vue.component('lihat-artikel', require('./components/LihatArtikel.vue').default);
Vue.component('tambah-artikel', require('./components/TambahArtikel.vue').default);
Vue.component('edit-blog-approve', require('./components/EditBlogApprove.vue').default);

Vue.component('fasilitas-index', require('./components/FasilitasIndex.vue').default);
Vue.component('fasilitas-tambah', require('./components/FasilitasTambah.vue').default);
Vue.component('fasilitas-edit', require('./components/FasilitasEdit.vue').default);
Vue.component('fasilitas-detail', require('./components/FasilitasDetail.vue').default);

const app = new Vue({
    el: '#vue',
});
