<template>
    <div>
        <div class="row form-group">
            <div class="title">Mengelola User</div>
            <div class="container">
                <a class="btn btn-new" href="/tambah-user">Tambah Baru</a>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="table-header">Daftar User</div>
                <div class="container background">
                    <table class="table-style background">
                        <tr class="table-title">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                        <tr class="table-content" v-for="(val, idx) in data">
                            <td>{{ val.nama_lengkap }}</td>
                            <td>{{ val.email }}</td>
                            <td>{{ val.username }}</td>
                            <td>{{ val.role.nama_role }}</td>
                            <td>
                                <button @click="edituser(val.id_user)" class="btn btn-new">Edit</button>
                                <button data-toggle="modal" :data-target="`#Modal${idx}`" class="btn btn-new">Hapus</button>
                                <div class="modal fade" :id="`Modal${idx}`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Anda yakin ingin menghapus pengguna ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="button" class="btn btn-new" @click="hapusUser(val.id_user)">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            getUserData() {
                axios.get('/user-data')
                    .then(e => {
                        this.data = e.data
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            },
            edituser(id) {
                window.location.href = `/edit-user/${id}`
            },
            hapusUser(id) {
                axios.get(`/hapus-user/${id}`)
                    .then(e => {
                        window.location.href = '/kelola-user'
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
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
