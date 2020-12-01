<template>
    <div class="container">
        <div class="row">
            <div class="title">Edit Sub Menu</div>
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
        <div class="row mt-2">
            <div class="col-md-12 text-left card-caption-home">Isi Halaman</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ckeditor :editor="editor" v-model="data_res.isi_halaman" :config="editorConfig" class="border"></ckeditor>
            </div>
        </div>
        <div class="row" style="padding-top:15px">
            <div class="col-md-12">
                <button class="btn btn-new-form" @click="simpan" type="submit">Simpan</button>
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
                data_res: {
                    nama_menu: null,
                    judul_halaman: null,
                    isi_halaman: []
                },
                isget: false,
                objectWisata: [],
                
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
            getMenu() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-submenu/${id}`)
                    .then(e => {
                        const {data} = e
                        this.data_res.nama_menu = data.nama_submenu
                        this.data_res.judul_halaman = data.judul_halaman
                        this.data_res.isi_halaman = data.isi_halaman
                        this.isget = true
                    })
            },
            async simpan() {
                if (this.data_res.nama_menu === null || this.data_res.judul_halaman === null) {
                    alert('Lengkapi form yang ada.')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                
                axios.post(`/update-submenu-baru/${id}`, this.data_res)
                    .then(e => {
                        alert('Sub Menu berhasil diubah')
                        window.location.href = `/tambah-submenu/${e.data.id}`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            }
        },
        mounted() {
            this.getMenu()
        }
    };
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
