<template>
    <div>
        <div class="row">
            <div class="container">
                <div class="pull-right">
                    <button class="btn btn-new" @click="edit"><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-new-hapus" @click="hapus"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>
        <div class="row"  v-if="success_get">
            <div class="title">{{ res.nama_profil }}</div>
        </div>
        <div class="row">
            <div class="col-md-12 background">
                <div class="w-100 ck-content ck" v-html="res.deskripsi"></div>
            </div>
        </div>
    </div>
</template>

<script>
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
                axios.get(`/detail-profil-desa/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.construct()
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
            edit() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/edit-profil-desa/${id}`;
            },
            hapus() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-profil-desa/delete/${id}`)
                    .then(e => {
                        alert('Data profil berhasil dihapus')
                        window.location.href = '/kelola-profil-desa'
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
</style>
