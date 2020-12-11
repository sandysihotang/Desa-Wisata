<template>
    <div class="row" style="width: 100%;">
        <div class="container">
            <div class="col-md-12">
                <form @submit.prevent="save">
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Nama Paket</div>
                        <div class="col-md-8">
                            <input type="text" v-model="data_res.nama" required class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Paket</div>
                        <div class="col-md-8">
                            <input type="text" v-model="data_res.paket" required class="form-control" style="width: 100%">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Foto Sampul</div>
                        <div class="col-md-8">
                            <p>
                                <img v-bind:src="data_res.sampul" style="width:200px; object-fit: cover;"/>
                            </p>
                            <input type="file" accept="image/*" @change="change_image">
                            <!-- <label for="file-upload" class="custom-file-upload">Upload Foto</label> -->
                            <!-- <input id="file-upload" type="file" style="display:none;" accept="image/*" @change="change_image"> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Paket</div>
                        <div class="col-md-8">
                            <input type="text" v-model="data_res.harga" required class="form-control" style="width: 100%">
                            <span v-if="errors.harga" style="color:#D8000C">Harga Paket harus diisi dengan angka</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Termasuk</div>
                        <div class="col-md-8">
                            <div class="border" id="editor1" v-html="data_res.harga1"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Harga Tidak Termasuk</div>
                        <div class="col-md-8">
                            <div class="border" id="editor2" v-html="data_res.harga2"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Jadwal</div>
                        <div class="col-md-8">
                            <div class="border" id="editor3" v-html="data_res.jadwal"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Itinerary</div>
                        <div class="col-md-8">
                            <div class="border" id="editor4" v-html="data_res.itinerary"></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 card-caption-home">Keterangan Tambahan</div>
                        <div class="col-md-8">
                            <div class="border" id="editor5" v-html="data_res.tambahan"></div>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-8" align="left">
                            <button class="btn btn-new-form" type="submit">Simpan</button>
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
                    sampul : '',
                },
                success_get: false,
                errors: []
            };
        },
        methods: {
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
            },
            uploader(editor1) {
                editor1.plugins.get('FileRepository').createUploadAdapter = (loader) => {
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
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                this.data_res.harga1 = window.editor1.getData()
                this.data_res.harga2 = window.editor2.getData()
                this.data_res.jadwal = window.editor3.getData()
                this.data_res.itinerary = window.editor4.getData()
                this.data_res.tambahan = window.editor5.getData()
                axios.post(`/save-paket/${id}`, this.data_res)
                    .then(e => {
                        alert('Paket wisata berhasil diedit')
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

            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-paket/${id}`)
                    .then(e => {
                        this.data_res.nama = e.data.nama_paket
                        this.data_res.paket = e.data.paket
                        this.data_res.sampul = e.data.file_foto
                        this.data_res.harga = e.data.harga_paket
                        this.data_res.harga1 = e.data.harga_termasuk
                        this.data_res.harga2 = e.data.harga_tidak_termasuk
                        this.data_res.jadwal = e.data.jadwal
                        this.data_res.itinerary = e.data.itinerary
                        this.data_res.tambahan = e.data.keterangan
                        this.construct1()
                        this.construct2()
                        this.construct3()
                        this.construct4()
                        this.construct5()
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
