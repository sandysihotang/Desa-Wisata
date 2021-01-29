<template>
  <div>
    <div v-if="success_get" class="title">{{ res.nama_profil }}</div>
    <div class="row">
      <div class="container background">
        <div v-if="res.nama_profil === 'Lokasi'">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15946.0343004496!2d98.80435472673621!3d2.3339329727841225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e223ff4358fe1%3A0xcf40602c8b490108!2sMarbun%20Toruan%2C%20Bakti%20Raja%2C%20Kabupaten%20Humbang%20Hasundutan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1611886355329!5m2!1sid!2sid"
            class="w-100"
            height="450"
            frameborder="0"
            style="border: 0"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
          ></iframe>
          <br />
        </div>
        <div class="w-100 ck-content ck" v-html="res.deskripsi"></div>
      </div>
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
        .get(`/detail-profil-desa/${id}`)
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
    this.getDetail();
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
