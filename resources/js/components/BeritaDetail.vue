<template>
    <div v-if="success_get">
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-new" @click="edit"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-new-hapus" @click="hapus"><i class="fa fa-trash"></i> Hapus</button>
            </div>
        </div>
        <div class="title">{{ res.judul_berita}}</div>
        <div class="row background">
            <br/>
            <ckeditor id="editor" class="w-100" :editor="editor" :disabled="true" v-model="res.isi_berita"
                      :config="editorConfig"></ckeditor>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
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
            onInitialized(editor) {
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
            edit() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/edit-berita/${id}`;
            },
            hapus() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-berita/delete/${id}`)
                    .then(e => {
                        alert('Data berita berhasil dihapus')
                        window.location.href = '/kelola-berita'
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getDetail()
        }
    };
</script>

<style>
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 90%;
        width: 100%;
    }

    .ce-header {
        font-family: "BentonSans Medium";
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
