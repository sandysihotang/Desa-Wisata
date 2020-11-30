<template>
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <a class="btn btn-new" href="/tambah-user"><i class="fa fa-plus"></i> Tambah User</a>
        </div>
        <div class="row form-group">    
            <div class="table-header" style="width: 100%;">Daftar User</div>
            <div class="container">
                <table class="table-style" style="width: 100%;">
                    <tr class="table-title">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    <tr class="table-content" v-for="val in articles.data">
                        <td>{{ val.nama_lengkap }}</td>
                        <td>{{ val.email }}</td>
                        <td>{{ val.username }}</td>
                        <td>{{ val.role.nama_role }}</td>
                        <td>
                            <button @click="edituser(val.id_user)" class="btn btn-new"><i class="fa fa-edit"></i> Edit</button>
                            <button data-toggle="modal" :data-target="`#Modal${val.id_user}`" class="btn btn-new-hapus"><i class="fa fa-trash"></i> Hapus</button>
                            <div class="modal fade" :id="`Modal${val.id_user}`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="sub-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus pengguna ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-new-secondary" data-dismiss="modal">Tidak</button>
                                            <button type="button" class="btn btn-new-hapus" @click="hapusUser(val.id_user)">Ya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="pagination justify-content-center">
                    <pagination :data="articles" @pagination-change-page="getResult"></pagination>               
                </div>
            </div> 
        </div>   
    </div>
</template>

<script>
    export default {
        data() {
            return {
                articles: []
            }
        },
        created() {
            this.getResult();
        },
        methods: {
            getResult(page){
                axios.get('/user-data?page=' + page)
                    .then(response => {
                        return response.data;
                    })
                    .then(data => {
                        this.articles = data;
                    })
            },
            getUserData() {
                axios.get('/user-data')
                    .then(e => {
                        this.articles = e.data
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
