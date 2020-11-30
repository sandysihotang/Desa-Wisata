<template>
    <div class="container">
        <div class="row">
            <div class="title">Tambah Sub Menu: {{nama_menu}}</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 text-left card-caption-home">Nama Sub Menu</div>
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
                <ckeditor :editor="editor" v-model="data_res.isi_halaman" :config="editorConfig"
                          class="border"></ckeditor>
            </div>
        </div>
        <div class="row" style="padding-top:15px">
            <div class="col-md-12">
                <button class="btn btn-new-form" @click="simpan" type="submit">Tambah</button>
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
                    nama_menu: '',
                    judul_halaman: '',
                    isi_halaman: '',
                },
                nama_menu: '',
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
            change_image(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.data_res.img = e.target.result;
                };
                reader.readAsDataURL(files[0]);
            },
            onInitialized(editor) {
            },
            async simpan() {
                if (this.data_res.nama_menu === null || this.data_res.judul_halaman === null) {
                    alert('Lengkapi form yang ada.')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);

                axios.post(`/simpan-submenu-baru/${id}`, this.data_res)
                    .then(e => {
                        alert('Menu berhasil ditambah')
                        window.location.href = `/tambah-submenu/${id}`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getNamaMenu() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/nama-menu/${id}`)
                    .then(e => {
                        var {data} = e
                        this.nama_menu = data.nama_menu
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            }
        },
        mounted() {
            this.getNamaMenu()
        }
    };
</script>

<style>
</style>
