require('./bootstrap');
window.Vue = require('vue');
import Editor from 'vue-editor-js'
Vue.use(Editor)
Vue.component('editor-blog', require('./components/EditorBlog.vue').default);
const app = new Vue({
    el: '#test',
});
