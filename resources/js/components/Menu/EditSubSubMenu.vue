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
                <div id="editor" v-html="data_res.isi_halaman" class="border"></div>
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
    import UploadAdapter from "../../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    nama_menu: null,
                    judul_halaman: null,
                    isi_halaman: ''
                },
                isget: false,
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
                axios.get(`/get-subsubmenu/${id}`)
                    .then(e => {
                        const {data} = e
                        this.data_res.nama_menu = data.nama_sub_submenu
                        this.data_res.judul_halaman = data.judul_halaman
                        this.data_res.isi_halaman = data.isi_halaman
                        this.construct()
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
                this.data_res.isi_halaman = $('#editor').html()
                axios.post(`/update-subsubmenu-baru/${id}`, this.data_res)
                    .then(e => {
                        alert('Sub Sub Menu berhasil diubah')
                        window.location.href = `/tambah-subsubmenu/${e.data.id}`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            construct() {
                BalloonEditor.create(document.querySelector('#editor'))
                    .then(editor => {
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
