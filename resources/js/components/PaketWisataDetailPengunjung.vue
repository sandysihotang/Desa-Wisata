<template>
    <div v-if="success_get">
        <div class="row form-group">
            <div class="col-md-4">
                <div class="detail-title">Jadwal Open Trip</div>
                <div class="detail-body"><ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.jadwal" :config="editorConfig"></ckeditor></div>

                <div class="detail-title">Harga</div>
                <div class="detail-body">@currency($paket->harga_paket) / orang</div>

                <div class="detail-title">Harga Termasuk</div>
                <div class="detail-body"><ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.harga_termasuk" :config="editorConfig"></ckeditor></div>

                <div class="detail-title">Harga Tidak Termasuk</div>
                <div class="detail-body"><ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.harga_tidak_termasuk" :config="editorConfig"></ckeditor></div>

                <div class="detail-title">Keterangan Tambahan</div>   
                <div class="detail-body"><ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.keterangan" :config="editorConfig"></ckeditor></div>
            </div>

            <div class="col-md-4">
                <div class="detail-title">Itinerary</div>
                <div class="detail-body"><ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.itinerary" :config="editorConfig"></ckeditor></div>
            </div>

            <div class="col-md-4">
                <div class="row mt-4 mb-4 justify-content-center">
                    <button class="btn btn-new" @click="viaWeb" style="width:60%">BOOKING DI WEBSITE</button>
                </div>
                <div class="row mt-4 mb-4 justify-content-center">
                    <button class="btn btn-new" @click="viaWA" style="width:60%">BOOKING DI WEBSITE</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
                isEdit: false,
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
            viaWeb() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/booking-wisata/${id}`;
            },
            viaWA() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/booking-wisata/${id}`;
            },
            getDetailObjek() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-paket/${id}`)
                    .then(e => {
                        this.res = e.data
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
