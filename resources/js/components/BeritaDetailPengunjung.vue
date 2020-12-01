<template>
    <div>
        <div class="row background">
            <div id="editor" class="w-100" v-html="res.isi_berita"
                      ></div>
        </div>
    </div>
</template>

<script>
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
            };
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            },
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
            getDetail() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-berita/${id}`)
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
            this.getDetail()
        }
    };
</script>

<style>
</style>
