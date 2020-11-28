<template>
    <div v-if="success_get">
        <div class="title">{{ res.judul_halaman}}</div>
        <div class="row">
            <div class="container background">
                <ckeditor :editor="editor" :disabled="true"  v-model="res.isi_halaman" :config="editorConfig"></ckeditor>
            </div>
        </div>
    </div>
</template>

<script>
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../../UploadAdapter";

    export default {
        data() {
            return {
                res: [],
                success_get: false,
                isEdit: false,
                editor: CKEditorClassic,
                editorConfig: {
                    extraPlugins: [this.uploader],
                },
            }
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            getDetails() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-isi-menu/${id}`)
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
            this.getDetails()
        }
    }
</script>

<style>
</style>
