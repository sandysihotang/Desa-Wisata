<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Tambah Berita</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Judul</div>
                <div class="col-md-8">
                    <input class="form-control" type="text" v-model="data_res.title" required/>
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
                <div class="col-md-4 text-left card-caption-home">Isi Berita</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ckeditor class="border" :editor="editor" v-model="data_res.story"
                              :config="editorConfig"></ckeditor>
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
                },
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
                axios.post('/simpan-berita', this.data_res)
                    .then(e => {
                        alert('Berita berhasil ditambahkan')
                        window.location.href = '/kelola-berita'
                    })
                    .catch(e => {
                        alert('Kesalahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
        },
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
