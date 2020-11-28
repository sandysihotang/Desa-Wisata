<template>
    <div v-if="success_get">
        <div class="title-center">{{ res.judul_pengalaman}}</div>
        <div class="row background">
            <div class="detail-body">ditulis oleh <a href="#" class="link_galeri">{{ res.penulis.nama_lengkap }}</a> |
                {{ getDate(res.tanggal) }}
            </div>
            <ckeditor id="editor" class="w-100" :editor="editor" :disabled="true" v-model="res.isi_pengalaman"
                      :config="editorConfig"></ckeditor>
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
                res: [],
                success_get: false,
                isEdit: false,
                editor: CKEditorClassic,
                editorConfig: {
                    extraPlugins: [this.uploader],
                },
            }
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
            getDetails() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-artikel-view/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
        },
        mounted() {
            this.getDetails()
        }
    }
</script>

<style>
</style>
