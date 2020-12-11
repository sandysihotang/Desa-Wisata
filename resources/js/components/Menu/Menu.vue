<template>
    <div>
        <div class="title" v-if="success_get">{{ res.judul_halaman}}</div>
        <div class="row">
            <div class="container background">
                <div class="w-100 ck-content ck" v-html="res.isi_halaman"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import UploadAdapter from "../../UploadAdapter";

    export default {
        data() {
            return {
                res: [],
                success_get: false,
                isEdit: false,
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
                        this.construct()
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
            construct() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor'))
                    .then(editor => {
                        window.editor = editor;
                        window.editor.isReadOnly  = true
                        window.editor.extraPlugins = [this.uploader(editor)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
        },
        mounted() {
            this.getDetails()
        }
    }
</script>

<style>
</style>
