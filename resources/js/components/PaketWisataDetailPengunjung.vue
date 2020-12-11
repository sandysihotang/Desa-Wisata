<template>
    <div v-if="success_get">
        <div class="row form-group">
            <div class="col-md-4">
                <div class="detail-title">Jadwal Open Trip</div>
                <div class="detail-body">
                    <div class="w-100 ck-content ck" v-html="res.jadwal"></div>
                </div>
                <div class="detail-title">Harga</div>
                <div class="detail-body">Rp. {{ formatPrice(res.harga_paket) }} / orang</div>

                <div class="detail-title">Harga Termasuk</div>
                <div class="detail-body">
                    <div class="w-100 ck-content ck" v-html="res.harga_termasuk"></div>
                </div>

                <div class="detail-title">Harga Tidak Termasuk</div>
                <div class="detail-body">
                    <div class="w-100 ck-content ck" v-html="res.harga_tidak_termasuk"></div>
                </div>
                <div class="detail-title">Keterangan Tambahan</div>
                <div class="detail-body">
                    <div class="w-100 ck-content ck" v-html="res.keterangan"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="detail-title">Itinerary</div>
                <div class="detail-body">
                    <div class="w-100 ck-content ck" v-html="res.itinerary"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mt-4 mb-4 justify-content-center">
                    <button class="btn btn-new" @click="viaWeb" style="width:60%">BOOKING DI WEBSITE</button>
                </div>
                <div class="row mt-4 mb-4 justify-content-center">
                    <button class="btn btn-new" @click="viaWA" style="width:60%">BOOKING DI WHATSAPP</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
            };
        },
        methods: {
            formatPrice(value) {
                var val = (value/1).toFixed(0).replace('.')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            construct1() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor1'))
                    .then(editor1 => {
                        window.editor1 = editor1;
                        window.editor1.isReadOnly  = true
                        window.editor1.placeholder = 'Tulis Cerita anda....'
                        window.editor1.extraPlugins = [this.uploader(editor1)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct2() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor2'))
                    .then(editor2 => {
                        window.editor2 = editor2;
                        window.editor2.isReadOnly  = true
                        window.editor2.placeholder = 'Tulis Cerita anda....'
                        window.editor2.extraPlugins = [this.uploader(editor2)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct3() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor3'))
                    .then(editor3 => {
                        window.editor3 = editor3;
                        window.editor3.isReadOnly  = true
                        window.editor3.placeholder = 'Tulis Cerita anda....'
                        window.editor3.extraPlugins = [this.uploader(editor3)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct4() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor4'))
                    .then(editor4 => {
                        window.editor4 = editor4;
                        window.editor4.isReadOnly  = true
                        window.editor4.placeholder = 'Tulis Cerita anda....'
                        window.editor4.extraPlugins = [this.uploader(editor4)]
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            },
            construct5() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor5'))
                    .then(editor5 => {
                        window.editor5 = editor5;
                        window.editor5.isReadOnly  = true
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
            uploader(editor2) {
                editor2.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            uploader(editor3) {
                editor3.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            uploader(editor4) {
                editor4.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            uploader(editor5) {
                editor5.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
            viaWeb() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/booking-wisata/${id}`;
            },
            isEmpty(obj) {
                for (var prop in obj) {
                    if (obj.hasOwnProperty(prop)) {
                        return false;
                    }
                }

                return JSON.stringify(obj) === JSON.stringify({});
            },
            viaWA() {
                axios.get('/kontak-pengelola')
                    .then(e => {
                        const {data} = e
                        if (this.isEmpty(data)) {
                            alert("Pemesanan melalui Whatsapp tidak dapat digunakan, karena Pengelola tidak sedang tidak dapat dihubungi")
                        } else {
                            window.location.href = `https://wa.me/62${data.no_hp.substring(1,data.no_hp.length)}?text=Pemesanan Paket Wisata`;
                        }
                    })
                    .catch(e => {
                        alert("Pemesanan melalui Whatsapp tidak dapat digunakan, karena Pengelola tidak sedang tidak dapat dihubungu")
                    })
            },
            getDetailObjek() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-paket/${id}`)
                    .then(e => {
                        this.res = e.data
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
            this.getDetailObjek()
        }
    };
</script>

<style>
</style>
