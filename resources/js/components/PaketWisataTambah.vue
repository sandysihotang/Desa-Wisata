<template>
    <div class="row" style="width: 100%;">
        <div class="container">
            <div class="col-md-12">
                <form @submit.prevent="save">
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Nama Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="data_res.nama" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="data_res.paket" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Foto Sampul</div>
                        <div class="col-md-8">
                            <label for="file-upload" class="custom-file-upload">Upload Foto</label>
                            <input required id="file-upload" type="file" style="display:none;" accept="image/*" @change="change_image">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="number" v-model="data_res.harga" required/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Termasuk</div>
                        <div class="col-md-8">
                            <ckeditor :editor="editor" v-model="data_res.harga1" :config="editorConfig" class="border"></ckeditor>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Tidak Termasuk</div>
                        <div class="col-md-8">
                            <ckeditor :editor="editor" v-model="data_res.harga2" :config="editorConfig" class="border"></ckeditor>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Jadwal</div>
                        <div class="col-md-8">
                            <ckeditor :editor="editor" v-model="data_res.jadwal" :config="editorConfig" class="border"></ckeditor>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Itinerary</div>
                        <div class="col-md-8">
                            <ckeditor :editor="editor" v-model="data_res.itinerary" :config="editorConfig" class="border"></ckeditor>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Keterangan Tambahan</div>
                        <div class="col-md-8">
                            <ckeditor :editor="editor" v-model="data_res.tambahan" :config="editorConfig" class="border"></ckeditor>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-8" align="left">
                            <button class="btn btn-new-form" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                data_res: {
                    nama : '',
                    paket : '',
                    harga : '',
                    harga1 : '',
                    harga2 : '',
                    jadwal : '',
                    itinerary : '',
                    tambahan : '',
                    img : '',
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
                axios.post('/save-new-paket', this.data_res)
                    .then(e => {
                        alert('Paket wisata berhasil ditambahkan')
                        window.location.href = '/kelola-paket-wisata'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
        },
    };
</script>

<style>

</style>
