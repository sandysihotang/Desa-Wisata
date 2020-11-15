<template>
    <div class="container">
        <form v-if="success_get" @submit.prevent="save">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success btn-sm float-right" type="submit">Simpan</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Judul Pengalaman</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" v-model="data_res.title" required class="form-control" style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Kategori Object Wisata</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <select class="form-control" v-model="data_res.kategori" required>
                        <option v-for="val in objectWisata" :value="val.id_obj_wisata">{{val.nama_wisata}}</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="font-weight-bold text-left">Artikel</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <editor
                        class="border"
                        ref="editor"
                        :config="config"
                        :init-data="initData"
                        autofocus
                        :initialized="onInitialized" style="width:100%"/>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
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
                data_res: {
                    title: '',
                    story: '',
                    kategori: null
                },
                success_get: false,
                objectWisata: [],
                initData: null,
                config: {
                    tools: {
                        image: {
                            class: SimpleImage,
                            config: {
                                uploader: {
                                    uploadByFile(file) {
                                        var form = new FormData
                                        form.append('image', file);
                                        return axios.post('/tambah-artikel', form)
                                            .then(e => {
                                                return e.data
                                            })
                                    },
                                    uploadByUrl(url) {
                                        var form = new FormData
                                        form.append('image', url);
                                        return axios.post('/tambah-artikel/url', form)
                                            .then(e => {
                                                return e.data
                                            })
                                    }
                                }
                            }
                        },
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
                    },
                    onChange: (args) => {
                        // console.log(args.blocks)
                    },
                    data: {}
                },
            };
        },
        methods: {
            onInitialized(editor) {
            },
            async save() {
                const response = await this.$refs.editor.state.editor.save().then((res) => res);
                this.data_res.story = JSON.stringify(response);
                if (this.data_res.kategori === null) {
                    alert('Silahkan isi kategori Objek Wisata')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.post(`/edit-artikel/${id}`, this.data_res)
                    .then(e => {
                        alert('Artikel berhasil diedit')
                        window.location.href = `/detail-artikel/${id}`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getObjectWisata() {
                axios.get('/kategori-pengalaman')
                    .then(e => {
                        this.objectWisata = e.data
                        this.getData();
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi!');
                    })
            },
            getData() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/detail-artikel-view/${id}`)
                    .then(e => {
                        this.config.data = JSON.parse(e.data.isi_pengalaman)
                        this.data_res.title = e.data.judul_pengalaman
                        this.data_res.kategori = e.data.obj_wisata_id
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            }
        },
        mounted() {
            this.getObjectWisata();
        }
    };
</script>

<style>

</style>
