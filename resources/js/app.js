require('./bootstrap');
window.Vue = require('vue');
import Editor from 'vue-editor-js'
Vue.use(Editor)
Vue.component('editor-blog', require('./components/EditorBlog.vue').default);
Vue.component('wisata-desa-detail', require('./components/WisataDesaDetail.vue').default);
Vue.component('pengalaman-wisata-detail', require('./components/PengalamanWisataDetail.vue').default);
const app = new Vue({
    el: '#vue',
});
