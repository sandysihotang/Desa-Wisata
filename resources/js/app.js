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
Vue.component('edit-user', require('./components/EditUser.vue').default);
Vue.component('lihat-artikel', require('./components/LihatArtikel.vue').default);
Vue.component('tambah-artikel', require('./components/TambahArtikel.vue').default);
Vue.component('edit-blog-approve', require('./components/EditBlogApprove.vue').default);


Vue.component('fasilitas-tambah', require('./components/FasilitasTambah.vue').default);
Vue.component('fasilitas-edit', require('./components/FasilitasEdit.vue').default);
Vue.component('fasilitas-detail', require('./components/FasilitasDetail.vue').default);
Vue.component('fasilitas-detail-pengunjung', require('./components/FasilitasDetailPengunjung.vue').default);

Vue.component('profil-desa-tambah', require('./components/ProfilDesaTambah.vue').default);
Vue.component('profil-desa-edit', require('./components/ProfilDesaEdit.vue').default);
Vue.component('profil-desa-detail', require('./components/ProfilDesaDetail.vue').default);
Vue.component('profil-desa-detail-pengunjung', require('./components/ProfilDesaDetailPengunjung.vue').default);

Vue.component('berita-index', require('./components/BeritaIndex.vue').default);
Vue.component('berita-tambah', require('./components/BeritaTambah.vue').default);
Vue.component('berita-edit', require('./components/BeritaEdit.vue').default);
Vue.component('berita-detail', require('./components/BeritaDetail.vue').default);
Vue.component('edit-profile', require('./components/EditProfile.vue').default);


Vue.component('paket-index', require('./components/BeritaIndex.vue').default);
Vue.component('paket-tambah', require('./components/PaketTambah.vue').default);
Vue.component('paket-edit', require('./components/PaketEditCoba.vue').default);
Vue.component('paket-detail', require('./components/PaketDetailCoba.vue').default);

Vue.component('hargatermasuk', require('./components/PaketWisata/HargaTermasuk.vue').default);
Vue.component('hargatermasuk-pengunjung', require('./components/PaketWisata/HargaTermasukPengunjung.vue').default);
Vue.component('harga-tidaktermasuk-pengunjung', require('./components/PaketWisata/HargaTidakTermasukPengunjung.vue').default);

Vue.component('berita-detail-pengunjung', require('./components/BeritaDetailPengunjung.vue').default);
Vue.component('paket-detail-pengunjung', require('./components/PaketDetailPengunjung.vue').default);

Vue.component('tambah-menu', require('./components/Menu/TambahMenu.vue').default);
Vue.component('tambah-submenu', require('./components/Menu/TambahSubMenu.vue').default);
Vue.component('edit-submenu', require('./components/Menu/EditSubMenu.vue').default);
Vue.component('edit-menu', require('./components/Menu/EditMenu.vue').default);
Vue.component('menu-visit', require('./components/Menu/Menu.vue').default);
Vue.component('sub-menu', require('./components/Menu/SubMenu.vue').default);
Vue.component('search-page', require('./components/Search.vue').default);

const app = new Vue({
    el: '#vue',
});
