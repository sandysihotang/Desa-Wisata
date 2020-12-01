<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="input-group">
                    <input class="form-control py-2 border-right-0 border" v-model="search" @input="search_data"
                           type="text" placeholder="Cari...">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" @click="search_data"
                                type="button">
                            <i class="fa fa-search"></i>
                        </button>
                  </span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row mb-4" v-show="is_search">
            <div class="container">
                <div class="card w-100">
                    <div class="card-header">
                        <b>Wisata Desa</b>
                    </div>
                    <div class="card-body" v-if="artikel.length === 0">
                        <p class="card-text">Data tidak ditemukan</p>
                    </div>
                    <div class="card-body" v-else>
                        <div class="card mb-3 w-100" style="cursor: pointer;" v-for="val in artikel">
                            <div class="row no-gutters" @click="to_wisata(val.id_pengalaman)">
                                <div class="col-md-3">
                                    <img :src="val.gambar" class="card-img rounded">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-title text-bold" v-html="val.judul_pengalaman"></p>
                                        <p class="card-text" v-html="getDescription(val.isi_pengalaman)"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4" v-show="is_search">
            <div class="container">
                <div class="card w-100">
                    <div class="card-header">
                        <b>Artikel Wisata</b>
                    </div>
                    <div class="card-body" v-if="wisata_desa.length === 0">
                        <p class="card-text">Data tidak ditemukan</p>
                    </div>
                    <div class="card-body" v-else>
                        <div class="card mb-3 w-100" style="cursor: pointer;" v-for="val in wisata_desa">
                            <div class="row no-gutters" @click="to_wisata_desa(val.id_obj_wisata)">
                                <div class="col-md-3">
                                    <img :src="val.file_foto" class="card-img rounded">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-title text-bold" v-html="val.nama_wisata"></p>
                                        <p class="card-text" v-html="getDescription(val.deskripsi)"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="is_search">
            <div class="container">
                <div class="card w-100">
                    <div class="card-header">
                        <b>Galeri</b>
                    </div>
                    <div class="card-body" v-if="galery.length === 0">
                        <p class="card-text">Data tidak ditemukan</p>
                    </div>
                    <div class="card-body" v-else>
                        <div class="card mb-3 w-100" style="cursor: pointer;" v-for="val in galery">
                            <div class="row no-gutters" @click="to_galeri(val.id_kategori_galeri)">
                                <div class="col-md-3">
                                    <img :src="`${val.file_foto_sampul}`" class="card-img rounded">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-title text-bold">{{ val.nama_kategori }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                is_search: false,
                search: '',
                wisata_desa: [],
                artikel: [],
                galery: [],
            }
        },
        methods: {
            search_data() {
                axios.post('/getsearch', {input: this.search})
                    .then(e => {
                        const {data} = e
                        this.wisata_desa = data[0].wisataDesa
                        this.artikel = data[0].pengalamanWisata
                        this.galery = data[0].galeri
                        this.is_search = true;
                    })
            },
            getDescription(val) {
                var m, rex = /<p>(.*?)<\/p>/g;
                var s = ''
                while ((m = rex.exec(val)) != null) {
                    s = `${s} ${m[1]}`;
                }
                return s.substring(0, 200);
            },
            to_wisata(id) {
                window.location.href = `/lihat-artikel/${id}`
            },
            to_wisata_desa(id) {
                window.location.href = `/detail-wisata-admin/${id}`
            },
            to_galeri(id) {
                window.location.href = `/kelola-galeri/${id}`
            }
        },
        mounted() {
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('search');
            this.search = myParam
            this.search_data()
        }
    }
</script>

<style scoped>

</style>
