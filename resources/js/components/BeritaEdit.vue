<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Edit Berita Desa</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Judul</div>
                <div v-if="success_get" class="col-md-8">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left card-caption-home">Foto Sampul</div>
                <div class="col-md-8">
                    <img v-if="success_get" v-bind:src="data_res.sampul" style="width:200px; object-fit: cover;"/>
                    <p style="margin-top:10px">
                        <input type="file" accept="image/*" @change="change_image">
                        <!-- <label for="file-upload" class="custom-file-upload">Upload Foto</label> -->
                        <!-- <input id="file-upload" type="file" style="display:none;" accept="image/*" @change="change_image"> -->
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left card-caption-home">Isi Berita</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border" id="editor" v-html="data_res.story"></div>
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
                    sampul: '',
                },
                success_get: false,
            };
        },
        methods: {
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
            // onInitialized(editor) {
            // },
            async save() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                this.data_res.story = this.ckeditor.getData()
                axios.post(`/update-berita/${id}`, this.data_res)
                    .then(e => {
                        alert('Berita berhasil diedit')
                        window.location.href = '/kelola-berita'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-berita/${id}`)
                    .then(e => {
                        this.data_res.title = e.data.judul_berita
                        this.data_res.story = e.data.isi_berita
                        this.data_res.sampul = e.data.file_foto
                        this.construct()
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getData()
        }

    };
</script>

<style>
</style>
