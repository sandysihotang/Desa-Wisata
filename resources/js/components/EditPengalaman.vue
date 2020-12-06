<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success btn-sm float-right" type="submit">Simpan</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Judul Pengalaman</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" v-if="success_get">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Gambar</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" v-if="success_get">
                    <img v-bind:src="data_res.sampul" style="width:200px; object-fit: cover;"/>
                    <p style="margin-top:10px"><input type="file" accept="image/*" @change="change_image"></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Artikel</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border" id="editor" v-html="data_res.story"></div>
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
                ckeditor: null,
                success_get: false,
            };
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            construct() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor'))
                    .then(editor => {
                        this.ckeditor = editor;
                        window.editor.extraPlugins = [this.uploader(editor)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
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
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                this.data_res.story = this.ckeditor.getData()
                axios.post(`/edit-pengalaman/${id}`, this.data_res)
                    .then(e => {
                        alert('Artikel berhasil diedit')
                        window.location.href = '/pengalaman-saya'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-artikel-edit/${id}`)
                    .then(e => {
                        this.data_res.story = e.data.isi_pengalaman
                        this.data_res.title = e.data.judul_pengalaman
                        this.data_res.sampul = e.data.gambar
                        this.construct()
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getData();
        }
    };
</script>

<style>
</style>
