<template>
    <div class="container">
        <form v-if="success_get" @submit.prevent="save">
            <div class="row">
                <div class="title">Edit Objek Wisata</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Nama Objek</div>
                <div class="col-md-8">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home"></div>
                <div class="col-md-8">
                    <input type="checkbox" id="checkbox" v-model="data_res.unggulan"> <label for="checkbox" class="card-caption-home">Wisata Unggulan</label>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Kategori Objek Wisata</div>
                <div class="col-md-8">
                    <select class="form-control" v-model="data_res.kategori" required>
                        <option v-for="val in objectWisata" :value="val.id_kategori">{{val.nama_kategori}}</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Foto Sampul</div>
                <div class="col-md-8">
                    <img v-bind:src="data_res.sampul" style="width:200px; object-fit: cover;"/>
                    <p style="margin-top:10px"><input type="file" accept="image/*" @change="change_image"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left card-caption-home">Deskripsi</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ckeditor :editor="editor" v-model="data_res.story" :config="editorConfig" class="border"></ckeditor>
                </div>
            </div>
            <div class="row" style="padding-top:15px">
                <div class="col-md-12">
                    <button class="btn btn-new-form" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    title: '',
                    story: '',
                    sampul: '',
                    unggulan: '',
                    kategori: null
                },
                success_get: false,
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
            async save() {
                if (this.data_res.kategori === null) {
                    alert('Silahkan isi kategori Objek Wisata')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.post(`/save-wisata/${id}`, this.data_res)
                    .then(e => {
                        alert('Objek wisata berhasil diedit')
                        window.location.href = '/kelola-wisata'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getObjectWisata() {
                axios.get('/list-kat-wisata')
                    .then(e => {
                        this.objectWisata = e.data
                        this.getData();
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman');
                    })
            },
            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-objek/${id}`)
                    .then(e => {
                        this.data_res.story = e.data.deskripsi
                        this.data_res.title = e.data.nama_wisata
                        this.data_res.unggulan = e.data.isUnggulan
                        this.data_res.sampul = e.data.file_foto
                        this.data_res.kategori = e.data.kategori_id
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getObjectWisata();
        }
    };
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>
