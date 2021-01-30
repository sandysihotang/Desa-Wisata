<template>
    <div>
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-new" @click="edit"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-new-hapus" @click="hapus"><i class="fa fa-trash"></i> Hapus</button>
            </div>
        </div>
        <div class="title" style="padding-left: 0px" v-if="success_get">{{ res.judul}}
        </div>
        <div class="row background">
            <br/>
            <div class="w-100 ck-content ck" v-html="res.deskripsi"></div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
            };
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
            getDetail() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-aktivitas/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.construct();
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
            edit() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/edit-aktivitas/${id}`;
            },
            hapus() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-aktivitas/delete/${id}`)
                    .then(e => {
                        alert('Data aktivitas berhasil dihapus')
                        window.location.href = '/kelola-aktivitas'
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getDetail();
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
