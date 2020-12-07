<template>
    <div class="container">
        <div class="row">
            <div class="title">Edit Menu</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 text-left card-caption-home">Nama Menu</div>
            <div class="col-md-8">
                <input type="text" v-model="data_res.nama_menu" required class="form-control" style="width: 100%">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 text-left card-caption-home">Judul Halaman</div>
            <div class="col-md-8">
                <input type="text" v-model="data_res.judul_halaman" required class="form-control" style="width: 100%">
            </div>
        </div>
        <br>
        <div class="row mt-2" v-if="!isget">
            <div class="col-md-12 text-left card-caption-home">Isi Halaman</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div :class="!isget?'border':''" id="editor" v-html="data_res.isi_halaman"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <button class="btn btn-new-form" @click="simpan" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</template>

<script>
    import UploadAdapter from "../../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    nama_menu: null,
                    judul_halaman: null,
                    isi_halaman: null
                },
                isget: true,
                ckeditor: null
            };
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            getMenu() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-menu/${id}`)
                    .then(e => {
                        const {data} = e
                        this.data_res.nama_menu = data.nama_menu
                        this.data_res.judul_halaman = data.judul_halaman
                        this.data_res.isi_halaman = data.isi_halaman
                        this.isget = data.mempunyai_sub_menu
                        if (!this.isget)
                            this.construct()
                    })
            },
            async simpan() {
                if (this.data_res.nama_menu === null || this.data_res.judul_halaman === null) {
                    alert('Lengkapi form yang ada.')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                this.data_res.isi_halaman = this.ckeditor.getData()
                axios.post(`/update-menu-baru/${id}`, this.data_res)
                    .then(e => {
                        alert('Menu berhasil diubah')
                        window.location.href = `/tambah-menu`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
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
            }
        },
        mounted() {
            this.getMenu()
        }
    };
</script>

<style>
</style>
