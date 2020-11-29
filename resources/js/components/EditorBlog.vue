<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success btn-sm float-right" type="submit">Bagikan</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Judul Pengalaman Kamu</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Gambar</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input required type="file" accept="image/*" @change="change_image">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Tulis Pengalaman Kamu</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ckeditor class="border" :editor="editor" v-model="data_res.story" :config="editorConfig"></ckeditor>
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
                axios.post('/save-blog', this.data_res)
                    .then(e => {
                        alert('Pengalaman anda berhasil disimpan')
                        window.location.href = '/pengalaman-saya'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            }
        },
    };
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>
