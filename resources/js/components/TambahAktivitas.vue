<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Tambah Aktivitas Wisata</div>
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
                    <input required type="file" accept="image/*" @change="change_image">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left card-caption-home">Deskripsi</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border" id="editor"></div>
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
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    title: '',
                    img: '',
                    story: '',
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
                this.data_res.story = window.editor.getData()
                axios.post('/simpan-aktivitas', this.data_res)
                    .then(e => {
                        alert('Aktivitas wisata berhasil ditambahkan')
                        window.location.href = '/kelola-aktivitas'
                    })
                    .catch(e => {
                        alert('Kesalahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            construct() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor'))
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
            this.construct();
        }
    };
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>
