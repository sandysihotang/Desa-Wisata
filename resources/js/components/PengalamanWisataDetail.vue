<template>
  <div>
    <div v-if="success_get" class="title">
      {{ res.judul_pengalaman }}
    </div>
    <div class="row">
      <div class="container background">
        <br />
        <div class="detail-body" v-if="success_get">
          ditulis oleh
          <a
            :href="`/pengalaman-wisata?sort_penulis=${res.penulis_id}`"
            class="link_galeri"
            >{{ res.penulis.nama_lengkap }}</a
          >
          | {{ getDate(res.tanggal) }}
        </div>
        <div
          class="w-100 ck-content ck mt-3 mb-3 ml-3 mr-3"
          v-html="res.isi_pengalaman"
        ></div>
      </div>
    </div>
  </div>
</template>

<script >
import moment from "moment";
import UploadAdapter from "../UploadAdapter";

export default {
  data() {
    return {
      success_get: false,
      res: [],
      ckeditor: null,
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
    getDate(value) {
      moment.lang("id");
      return moment(value).format("Do MMMM YYYY");
    },
    onInitialized(editor) {},
    getDetailPengalaman() {
      var url = window.location.pathname;
      var id = url.substring(url.lastIndexOf("/") + 1);
      axios
        .get(`/detail-artikel-member/${id}`)
        .then((e) => {
          this.res = e.data;
          this.construct();
          this.success_get = true;
        })
        .catch((e) => {
          alert("Koneksi kurang stabil, silahkan refresh halaman");
        });
    },
  },
  mounted() {
    this.getDetailPengalaman();
  },
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
