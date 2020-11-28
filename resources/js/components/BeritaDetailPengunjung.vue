<template>
    <div v-if="success_get">
        <div class="row background">
            <ckeditor id="editor" class="w-100" :editor="editor" :disabled="true" v-model="res.isi_berita"
                      :config="editorConfig"></ckeditor>
        </div>
    </div>
</template>

<script>
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
                editor: CKEditorClassic,
                editorConfig: {
                    extraPlugins: [this.uploader],
                },
            };
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            getDetail() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-berita/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
        },
        mounted() {
            this.getDetail()
        }
    };
</script>

<style>
</style>
