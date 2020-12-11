<template>
    <div>
        <div v-if="success_get" class="title">{{ res.judul_halaman}}</div>
        <div class="row">
            <div class="container background">
                <div class="w-100 ck-content ck" v-html="res.isi_halaman"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
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
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            getDetails() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-isi-subsubmenu/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.construct()
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
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 90%;
        width: 100%;
    }

    .too img {
        width: 100%;
        max-width: 100%;
        height: 450px;
        max-height: 450px;
        object-fit: cover;
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
