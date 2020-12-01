<template>
    <div v-if="success_get">
        <div class="row form-group">
            <div class="col-md-4">
                <div class="detail-title">Jadwal Open Trip</div>
                <div class="detail-body">
                    <div id="editor" class="w-100" v-html="res.jadwal"></div>
                </div>

                <div class="detail-title">Harga</div>
                <div class="detail-body">@currency($paket->harga_paket) / orang</div>

                <div class="detail-title">Harga Termasuk</div>
                <div class="detail-body">
                    <div id="editor" class="w-100" v-html="res.harga_termasuk"></div>
                </div>

                <div class="detail-title">Harga Tidak Termasuk</div>
                <div class="detail-body">
                    <div id="editor" class="w-100" v-html="res.harga_tidak_termasuk"></div>
                </div>

                <div class="detail-title">Keterangan Tambahan</div>
                <div class="detail-body">
                    <div id="editor" class="w-100" v-html="res.keterangan"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="detail-title">Itinerary</div>
                <div class="detail-body">
                        <div id="editor" class="w-100" v-html="res.itinerary"></div>
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
            construct() {
                BalloonEditor.create(document.querySelector('#editor'))
                    .then(editor => {
                        window.editor = editor;
                        window.editor.isReadOnly  = true
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
            viaWeb() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/booking-wisata/${id}`;
            },
            viaWA() {
                window.location.href = `https://wa.link/fxlvr7`;
            },
            getDetailObjek() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-paket/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.construct();
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
