<template>
    <div>
        <div class="title" v-if="success_get">{{ res.nama_fasilitas }}</div>
        <div class="row background" style="padding-right: 40px">
            <div v-if="exist">
                <div
                    class="w-100 ck-content ck mt-3 mb-3 ml-3 mr-3"
                    v-html="res.deskripsi"
                ></div>
            </div>
            <div v-else class="col-md-12">
                <div class="mt-lg-5 mb-lg-5 w-100">
                    <br>
                    <div class="jumbotron jumbotron-fluid w-100">
                        <div class="container">
                            <h5 class="display-5 d-flex justify-content-center">Informasi {{ res.nama_fasilitas }} belum
                                tersedia</h5>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import UploadAdapter from "../UploadAdapter";

export default {
    data() {
        return {
            success_get: false,
            res: [],
            isEdit: false,
            exist: true
        };
    },
    methods: {
        construct() {
            CKEDITOR.BalloonEditor.create(document.querySelector("#editor"))
                .then((editor) => {
                    window.editor = editor;
                    window.editor.isReadOnly = true;
                    window.editor.extraPlugins = [this.uploader(editor)];
                })
                .catch((error) => {
                    console.error("There was a problem initializing the editor.", error);
                });
        },
        uploader(editor) {
            editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                return new UploadAdapter(loader);
            };
        },
        getDetail() {
            var url = window.location.pathname;
            var id = url.substring(url.lastIndexOf("/") + 1);
            axios
                .get(`/detail-fasilitas/${id}`)
                .then((e) => {
                    this.res = e.data;
                    var temp = this.res.deskripsi
                    this.exist = (temp != null && temp.replace(/(<([^>]+)>)/gi, "").replace(' ', "").length > 0);
                    this.construct();
                    this.success_get = true;

                })
                .catch((e) => {
                    console.log(e)
                    alert("Koneksi kurang stabil, silahkan refresh halaman");
                });
        },
    },
    mounted() {
        this.getDetail();
    },
};
</script>

<style>
</style>
