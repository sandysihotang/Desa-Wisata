<template>
    <div>
        <div v-if="success_get" class="title-center">{{ res.judul_pengalaman}}</div>
        <div class="row background">
            <div  v-if="success_get" class="detail-body">ditulis oleh <a href="#" class="link_galeri">{{ res.penulis.nama_lengkap }}</a> |
                {{ getDate(res.tanggal) }}
            </div>
            <div class="w-100 ck-content ck" v-html="res.isi_pengalaman"></div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                res: [],
                success_get: false,
                isEdit: false,
            }
        },
        methods: {
            construct() {
                CKEDITOR.BalloonEditor.create(document.querySelector('#editor'))
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
                        this.construct()
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
