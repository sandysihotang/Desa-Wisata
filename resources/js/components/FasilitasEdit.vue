<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Edit Fasilitas Desa</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Nama Fasilitas</div>
                <div class="col-md-8" v-if="success_get">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left card-caption-home">Deskripsi</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="editor" v-html="data_res.story" class="border"></div>
                </div>
            </div>
            <div class="row" style="padding-top:15px">
                <div class="col-md-12">
                    <button class="btn btn-new-form" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    title: '',
                    story: '',
                },
                success_get: false,
                ckeditor: null
            };
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            construct() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor'))
                    .then(editor => {
                        this.ckeditor = editor
                        window.editor = editor;
                        window.editor.placeholder = 'Tulis Cerita anda....'
                        window.editor.extraPlugins = [this.uploader(editor)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            async save() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                this.data_res.story = this.ckeditor.getData()
                axios.post(`/update-artikel/${id}`, this.data_res)
                    .then(e => {
                        alert('Fasilitas berhasil diedit')
                        window.location.href = '/kelola-fasilitas'
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, coba beberapa waktu lagi.')
                    })
            },

            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-fasilitas/${id}`)
                    .then(e => {
                        this.data_res.story = e.data.deskripsi
                        this.data_res.title = e.data.nama_fasilitas
                        this.construct()
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        }
        ,
        mounted() {
            this.getData()
        }

    }
    ;
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
