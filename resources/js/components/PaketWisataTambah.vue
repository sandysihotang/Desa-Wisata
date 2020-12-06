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
                            <input required type="file" accept="image/*" @change="change_image">
                            <!-- <label for="file-upload" class="custom-file-upload">Upload Foto</label> -->
                            <!-- <input required id="file-upload" type="file" style="display:none;" accept="image/*" @change="change_image"> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Paket</div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="data_res.harga" required/>
                            <span v-if="errors.harga" style="color:#D8000C">Harga Paket harus diisi dengan angka</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Termasuk</div>
                        <div class="col-md-8">
                            <div class="border" id="editor1"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Tidak Termasuk</div>
                        <div class="col-md-8">
                            <div class="border" id="editor2"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Jadwal</div>
                        <div class="col-md-8">
                            <div class="border" id="editor3"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Itinerary</div>
                        <div class="col-md-8">
                            <div class="border" id="editor4"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Keterangan Tambahan</div>
                        <div class="col-md-8">
                            <div class="border" id="editor5"></div>
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
                errors: []
            };
        },
        methods: {
            uploader(editor5) {
                editor5.plugins.get('FileRepository').createUploadAdapter = (loader) => {
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
                this.data_res.harga1 = $('#editor1').html()
                this.data_res.harga2 = $('#editor2').html()
                this.data_res.jadwal = $('#editor3').html()
                this.data_res.itinerary = $('#editor4').html()
                this.data_res.tambahan = $('#editor5').html()
                axios.post('/save-new-paket', this.data_res)
                    .then(e => {
                        alert('Paket wisata berhasil ditambahkan')
                        window.location.href = '/kelola-paket-wisata'
                    })
                    .catch(e => {
                        if(e.response.status === 422){
                            this.errors = e.response.data.errors
                            alert('Data tidak berhasil ditambahkan. Harap memeriksa isi form')
                        }
                        else{
                            alert('Kesalahan pada sistem, Coba beberapa waktu lagi.')
                        }
                    })
            },
            construct1() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor1'))
                    .then(editor1 => {
                        window.editor1 = editor1;
                        window.editor1.placeholder = 'Tulis Cerita anda....'
                        window.editor1.extraPlugins = [this.uploader(editor1)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct2() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor2'))
                    .then(editor2 => {
                        window.editor2 = editor2;
                        window.editor2.placeholder = 'Tulis Cerita anda....'
                        window.editor2.extraPlugins = [this.uploader(editor2)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct3() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor3'))
                    .then(editor3 => {
                        window.editor3 = editor3;
                        window.editor3.placeholder = 'Tulis Cerita anda....'
                        window.editor3.extraPlugins = [this.uploader(editor3)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct4() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor4'))
                    .then(editor4 => {
                        window.editor4 = editor4;
                        window.editor4.placeholder = 'Tulis Cerita anda....'
                        window.editor4.extraPlugins = [this.uploader(editor4)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct5() {
                CKEDITOR.ClassicEditor.create(document.querySelector('#editor5'))
                    .then(editor5 => {
                        window.editor5 = editor5;
                        window.editor5.placeholder = 'Tulis Cerita anda....'
                        window.editor5.extraPlugins = [this.uploader(editor5)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            }
        },
        mounted() {
            this.construct1();
            this.construct2();
            this.construct3();
            this.construct4();
            this.construct5();
        }
    };
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 100px;
    }

</style>
