<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-sm" @click="kembali">Kembali</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm" @click="simpan" type="submit">Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold text-left">Nama Menu</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" v-model="data_res.nama_menu" required class="form-control" style="width: 100%">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold text-left">Judul Halaman</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" v-model="data_res.judul_halaman" required class="form-control" style="width: 100%">
            </div>
        </div>
        <br>
        <div class="row mt-2" v-if="!isget">
            <div class="col-md-12">
                <p class="font-weight-bold text-left">Isi Halaman</p>
            </div>
        </div>
        <div class="row" v-if="!isget">
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
                    nama_menu: null,
                    judul_halaman: null,
                    isi_halaman: []
                },
                isget: true,
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
            getMenu() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-menu/${id}`)
                    .then(e => {
                        const {data} = e
                        this.data_res.nama_menu = data.nama_menu
                        this.data_res.judul_halaman = data.judul_halaman
                        this.config.data = JSON.parse(data.isi_halaman)
                        this.isget = data.mempunyai_sub_menu
                    })
            },
            kembali() {
                window.history.back()
            },
            async simpan() {
                if (this.data_res.nama_menu === null || this.data_res.judul_halaman === null) {
                    alert('Lengkapi form yang ada.')
                    return
                }
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                if (!this.isget) {
                    const response = await this.$refs.editor.state.editor.save().then((res) => res);
                    this.data_res.isi_halaman = JSON.stringify(response)
                }
                axios.post(`/update-menu-baru/${id}`, this.data_res)
                    .then(e => {
                        alert('Menu berhasil diubah')
                        window.location.href = `/tambah-menu`
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            }
        },
        mounted() {
            this.getMenu()
        }
    };
</script>

<style>
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 90%;
        width: 100%;
    }

    .too img {
        width: 100%;
        max-width: 100%;
        height: 450px;
        max-height: 450px;
        object-fit: cover;
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
