<template>
  <div>
    <div class="title" v-if="success_get">{{ res.nama_wisata }}</div>
    <div class="row background">
      <br />
      <div
        class="w-100 ck-content ck mt-3 mb-3 ml-3 mr-3"
        v-html="res.deskripsi"
      ></div>
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
    };
  },
  methods: {
    uploader(editor) {
      editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
        return new UploadAdapter(loader);
      };
    },
    getDetailObjek() {
      var url = window.location.pathname;
      var id = url.substring(url.lastIndexOf("/") + 1);
      axios
        .get(`/detail-wisata/${id}`)
        .then((e) => {
          this.res = e.data;
          this.construct();
          this.success_get = true;
        })
        .catch((e) => {
          alert("Koneksi kurang stabil, silahkan refresh halaman");
        });
    },
    construct() {
      CKEDITOR.BalloonEditor.create(document.querySelector("#editor"))
        .then((editor) => {
          window.editor = editor;
          window.editor.isReadOnly = true;
          window.editor.placeholder = "Tulis Cerita anda....";
          window.editor.extraPlugins = [this.uploader(editor)];
        })
        .catch((error) => {
          console.error("There was a problem initializing the editor.", error);
        });
    },
  },
  mounted() {
    this.getDetailObjek();
  },
};
</script>

<style>
</style>
