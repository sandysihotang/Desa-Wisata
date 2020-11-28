<template>
    <div v-if="success_get">
        <div
            style="font-family: 'BentonSans Bold';font-size: 30pt;text-transform: uppercase;width: 100%;text-align: center;padding: 20px;">
            {{ res.judul_pengalaman}}
        </div>
        <div class="row">
            <div class="container background">
                <br/>
                <div class="detail-body">
                    ditulis oleh <a :href="`/pengalaman-wisata?sort_penulis=${res.penulis_id}`" class="link_galeri">{{
                    res.penulis.nama_lengkap }}</a> | {{ getDate(res.tanggal) }}
                </div>
                <ckeditor class="w-100" :editor="editor" :disabled="true" v-model="res.isi_pengalaman"
                          :config="editorConfig"></ckeditor>
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
            getDate(value) {
                moment.lang('id');
                return moment(value).format('Do MMMM YYYY');
            },
            onInitialized(editor) {
            },
            saveBlog() {
            },
            getDetailPengalaman() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-artikel-member/${id}`)
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
            this.getDetailPengalaman()
        }
    };
</script>

<style>
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 90%;
        width: 100%;
    }

    .ce-header {
        font-family: "BentonSans Medium";
    }

    .too img {
        width: 100%;
        max-width: 100%;
        height: 450px;
        max-height: 450px;
        object-fit: cover;
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
