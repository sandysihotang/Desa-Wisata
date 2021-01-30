<template>
  <div class="container-fluid">
    <div class="row background">
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="row mt-2">
              <div class="col-md-2 text-left">Facebook</div>
              <div class="col-md-7">
                <input
                  class="form-control"
                  type="text"
                  required
                  v-model="data_res.facebook"
                />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-2 text-left">Instagram</div>
              <div class="col-md-7">
                <input
                  class="form-control"
                  type="text"
                  required
                  v-model="data_res.instagram"
                />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-2 text-left">Twitter</div>
              <div class="col-md-7">
                <input
                  class="form-control"
                  type="text"
                  required
                  v-model="data_res.twitter"
                />
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-2 text-left">Youtube</div>
              <div class="col-md-7">
                <input
                  class="form-control"
                  type="text"
                  required
                  v-model="data_res.youtube"
                />
              </div>
            </div>
            <div class="row mt-2 mb-2">
              <div class="col-md-2"></div>
              <div class="col-md-7" align="left">
                <button class="btn btn-submit" @click="simpan" type="submit">
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data_res: {
        facebook: null,
        twitter: null,
        youtube: null,
        instagram: null,
      },
    };
  },
  methods: {
    simpan() {
      axios
        .post("/simpan-link", this.data_res)
        .then((e) => {
          alert("Berhasil menyimpan link Social Media.");
          window.location.href = "/link-social-media";
        })
        .catch((e) => {
          alert("Gagal menyimpan link Social Media. Silahkan coba lagi!");
        });
    },
    getAllLink() {
      axios
        .get("/get-all-link")
        .then((e) => {
          const { data } = e;
          for (var i = 0; i < data.length; i++) {
            if (data[i].provider == "Facebook")
              this.data_res.facebook = data[i].link;
            if (data[i].provider == "Instagram")
              this.data_res.instagram = data[i].link;
            if (data[i].provider == "Twitter")
              this.data_res.twitter = data[i].link;
            if (data[i].provider == "Youtube")
              this.data_res.youtube = data[i].link;
          }
        })
        .catch((e) => {
          alert("Kelasahan pada sistem, Coba beberapa waktu lagi.");
        });
    },
  },
  mounted() {
    this.getAllLink();
  },
};
</script>

<style>
</style>
