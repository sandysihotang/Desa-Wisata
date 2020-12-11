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
                    <div class="border" id="editor"></div>
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
                ckeditor: null
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
                this.data_res.story = this.ckeditor.getData()
                axios.post('/save-blog', this.data_res)
                    .then(e => {
                        alert('Terimakasih, Pengalaman Anda Sudah Tersimpan. Selanjutnya pengalaman akan di setujui oleh Admin')
                        window.location.href = '/pengalaman-saya'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            construct() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor'))
                    .then(editor => {
                        this.ckeditor = editor;
                        window.editor.placeholder = 'Tulis Cerita anda....'
                        window.editor.extraPlugins = [this.uploader(editor), {
                            name: 'googleMaps',
                            url: /^(http(s?):\/\/)goo\.gl\/maps\/([a-z|A-Z|0-9])*/,
                            html: match =>
                                `<div class="ck ck-reset_all ck-media__placeholder">
                                  <a class="ck-media__placeholder__url" target="_blank" href="${match[0]}">
                                    <span class="ck-media__placeholder__url__text">${match[0]}</span>
                                    <span class="ck ck-tooltip ck-tooltip_s">
                                      <span class="ck ck-tooltip__text">Open media in new tab</span>
                                    </span>
                                  </a>
                                </div>`
                        }]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            }
        },
        mounted() {
            this.construct()
        }
    };
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>
