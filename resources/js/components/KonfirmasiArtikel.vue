<template>
    <div class="col-md-12 justify-content-center">
        <div class="table-header" style="width: 100%;"></div>
        <table class="table-style background" style="width: 100%;">
            <tr class="table-title">
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
            <tr class="table-content" v-for="val in articels">
                <td>{{ getDate(val.tanggal) }}</td>
                <td>{{ val.judul_pengalaman }}</td>
                <td>{{ val.penulis.nama_lengkap }}</td>
                <td>
                    <a :href="`/detail-artikel/${val.id_pengalaman}`" class="btn btn-new">Lihat</a>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        data() {
            return {
                articels: []
            }
        },
        methods: {
            getDate(value) {
                moment.lang('id');
                return moment(value).format('Do MMMM YYYY');
            },
            getAllArticle() {
                axios.get('/all-articles')
                    .then(e => {
                        this.articels = e.data
                    })
                    .catch(e => {
                        alert('Koneksi kurang stabil, silahkan refresh halaman')
                    })
            }
        },
        mounted() {
            this.getAllArticle()
        }
    }
</script>

<style scoped>

</style>
