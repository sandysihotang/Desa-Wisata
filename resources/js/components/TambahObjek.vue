<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Tambah Objek Wisata</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Nama Objek</div>
                <div class="col-md-8">
                    <input class="form-control" type="text" v-model="data_res.title" required/>
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
                    <label for="file-upload" class="custom-file-upload">Upload Foto</label>
                    <input required id="file-upload" type="file" style="display:none;" accept="image/*" @change="change_image">
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
                    <button class="btn btn-new-form" type="submit">Tambah</button>
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
                    img: '',
                    story: '',
                    kategori: null
                },
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
            onInitialized(editor) {
            },
            async save() {
                if(this.data_res.kategori === null) {
                    alert('Silahkan isi kategori Objek Wisata')
                    return
                }
                axios.post('/simpan-objek', this.data_res)
                    .then(e => {
                        alert('Objek wisata berhasil ditambahkan')
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
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman');
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