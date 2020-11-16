<template>
    <div v-if="success_get">
        <div class="title-center">{{ res.nama_wisata}}</div>
        <div class="row background">
            <div class="container">
                <div class="pull-right" v-if="!isEdit">
                    <button class="btn btn-new" @click="approve">Approve</button>
                    <button class="btn btn-new" @click="isEdit = true">Edit</button>
                </div>
                <div class="pull-right" v-else>
                    <button class="btn btn-new" @click="isEdit = false">Simpan</button>
                </div>
            </div>
            <br/>
            <div class="detail-body">ditulis oleh <a href="#" class="link_galeri">{{ res.penulis.nama_lengkap }}</a> |
                {{ getDate(res.tanggal) }}
            </div>
            <editor
                ref="editor"
                :config="config"
                autofocus
                :initialized="onInitialized" style="width:100%"/>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    import Header from '@editorjs/header';
    import List from '@editorjs/list';
    import CodeTool from '@editorjs/code'
    import Paragraph from '@editorjs/paragraph'
    import Embed from '@editorjs/embed'
    import Table from '@editorjs/table'
    import Checklist from '@editorjs/checklist'
    import Marker from '@editorjs/marker'
    import Warning from '@editorjs/warning'
    import RawTool from '@editorjs/raw'
    import Quote from '@editorjs/quote'
    import InlineCode from '@editorjs/inline-code'
    import Delimiter from '@editorjs/delimiter'
    import SimpleImage from '@editorjs/image'

    export default {
        data() {
            return {
                res: [],
                success_get: false,
                isEdit: false,
                config: {
                    tools: {
                        image: SimpleImage,
                        header: {
                            class: Header,
                            config: {
                                placeholder: 'Enter a header',
                                levels: [2, 3, 4, 5, 6],
                                defaultLevel: 4,
                            }
                        },
                        list: {
                            class: List,
                            inlineToolbar: true,
                        },
                        code: {
                            class: CodeTool,
                            inlineToolbar: true,
                        },
                        paragraph: {
                            class: Paragraph,
                            inlineToolbar: true,
                        },
                        embed: {
                            class: Embed,
                            inlineToolbar: true,
                            config: {
                                services: {
                                    youtube: true,
                                    coub: true,
                                    imgur: true
                                }
                            },
                        },
                        table: {
                            class: Table,
                            inlineToolbar: true,
                            config: {
                                rows: 2,
                                cols: 3,
                            },
                        },
                        checklist: {
                            class: Checklist,
                            inlineToolbar: true,
                        },
                        Marker: {
                            class: Marker,
                            shortcut: 'CMD+SHIFT+M',
                            inlineToolbar: true,
                        },
                        warning: {
                            class: Warning,
                            inlineToolbar: true,
                            shortcut: 'CMD+SHIFT+W',
                            config: {
                                titlePlaceholder: 'Title',
                                messagePlaceholder: 'Message',
                            },
                        },
                        raw: RawTool,
                        quote: {
                            class: Quote,
                            inlineToolbar: true,
                            shortcut: 'CMD+SHIFT+O',
                            config: {
                                quotePlaceholder: 'Enter a quote',
                                captionPlaceholder: 'Quote\'s author',
                            },
                        },
                        inlineCode: {
                            class: InlineCode,
                            shortcut: 'CMD+SHIFT+M',
                        },
                        delimiter: Delimiter,
                    },
                    onReady: () => {
                        var elements = document.querySelectorAll('[contenteditable=true]')
                        elements.forEach(element => {
                            element.setAttribute('contenteditable', false)
                        });
                        document.getElementsByClassName('ce-toolbar')[0].style.visibility = "hidden"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
            }
        },
        methods: {
            getDate(value) {
                moment.lang('id');
                return moment(value).format('Do MMMM YYYY');
            },
            onInitialized(editor) {
            },
            getDetails() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-artikel-view/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.config.data = JSON.parse(e.data.isi_pengalaman)
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            },
            approve() {
                axios.post('/approve-artikel', {id: this.res.id_pengalaman})
                    .then(e => {
                        alert('Berhasil mengapprove artikel')
                        window.location.href = '/konfirmasi-artikel'
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            }
        },
        mounted() {
            this.getDetails()
        }
    }
</script>

<style scoped>

</style>
