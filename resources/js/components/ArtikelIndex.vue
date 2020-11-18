<template>
    <div>
        <div class="row form-group">
            <div class="title">Mengelola Artikel</div>
            <div class="container">
                <a class="btn btn-new" href="/add-artikel">Tambah Baru</a>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Daftar User</div>
                <div class="container background">
                    <table class="table-style background">
                        <tr class="table-title">
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                        <tr class="table-content" v-for="val in data">
                            <td></td>
                            <td>{{ val.nama_fasilitas || val.nama_profil || val.nama_kategori || val.nama_wisata }}</td>
                            <td>{{ val.nama_fasilitas || val.nama_profil || val.nama_kategori || val.nama_wisata }}</td>
                            <td>
                                <a href="" class="btn btn-new">Lihat</a>
                                <a href="" class="btn btn-new">Edit</a>
                                <a href="" class="btn btn-new">Hapus</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: []
            }
        },
        methods: {
            getArtikel() {
                axios.get('/list-artikel')
                    .then(e => {
                        this.data = e.data
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            },
            getEditLink() {
                
            }
        },
        mounted() {
            this.getArtikel()
        }
    }
</script>

<style scoped>

</style>
