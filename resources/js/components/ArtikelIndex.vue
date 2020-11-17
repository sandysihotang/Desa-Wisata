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
                            <td>{{ val.nama_lengkap }}</td>
                            <td>{{ val.email }}</td>
                            <td>{{ val.username }}</td>
                            <td>{{ val.role.nama_role }}</td>
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
            getData() {
                axios.get('/user-data')
                    .then(e => {
                        this.data = e.data
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            }
        },
        mounted() {
            this.getUserData()
        }
    }
</script>

<style scoped>

</style>
