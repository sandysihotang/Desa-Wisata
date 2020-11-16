<template>
    <div>{{ getDate() }}</div>
</template>

<script>
    import moment from 'moment'

    export default {
        props: ['date'],
        methods: {
            getDate() {
                moment.lang('id');
                return moment(this.date).format('Do MMMM YYYY');
            }
        }
    }
</script>

<style scoped>

</style>
