<template>
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="pull-right">
          <pagination
            :data="articles"
            @pagination-change-page="getResult"
          ></pagination>
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="table-header" style="width: 100%">Daftar Artikel</div>
      <div class="container">
        <table class="table-style" style="width: 100%">
          <tr class="table-title">
            <th>Tanggal</th>
            <th width="40%">Judul</th>
            <th>Penulis</th>
            <th width="25%">Aksi</th>
          </tr>
          <tr class="table-content" v-for="val in articles.data">
            <td>{{ getDate(val.tanggal) }}</td>
            <td>{{ val.judul_pengalaman }}</td>
            <td>{{ val.penulis.nama_lengkap }}</td>
            <td>
              <a
                :href="`/detail-artikel/${val.id_pengalaman}`"
                class="btn btn-new-lihat"
                ><i class="fa fa-eye"></i> Lihat</a
              >
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  data() {
    return {
      articles: [],
    };
  },
  created() {
    this.getResult();
  },
  methods: {
    getResult(page) {
      axios
        .get("/all-articles?page=" + page)
        .then((response) => {
          return response.data;
        })
        .then((data) => {
          this.articles = data;
        });
    },
    //     let uri = 'api/all-articles?page=' + page;
    //     this.axios.get(uri)
    //     .then(response => {
    //         return response.data;
    //     }).then(data => {
    //         this.articles = data;
    //     });
    // },
    getDate(value) {
      moment.lang("id");
      return moment(value).format("Do MMMM YYYY");
    },
    getAllArticle() {
      axios
        .get("/all-articles")
        .then((e) => {
          this.articles = e.data;
        })
        .catch((e) => {
          alert("Koneksi kurang stabil, silahkan refresh halaman");
        });
    },
  },
  mounted() {
    this.getAllArticle();
  },
};
</script>

<style scoped>
</style>
