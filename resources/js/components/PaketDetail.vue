<template>
    <div v-if="success_get">
        <div class="container">
            <div class="pull-right">
                <button class="btn btn-new" @click="edit">Edit</button>
                <button class="btn btn-new" @click="hapus">Hapus</button>
            </div>
        </div>
        <div class="title">{{ res.nama_paket}}</div>
        <div class="container background">
            <div class="card-caption-home">Harga Termasuk</div>
            <br/>
            <editor
                ref="harga1"
                :config="configHarga1"
                autofocus
                :initialized="onInitialized" style="width:100%"/>
        </div>
        <div class="row background">
            <div class="col-md-4">
                <div class="card-caption-home">Harga Termasuk</div>
            </div>
            <div class="col-md-8">
                <editor
                    ref="harga2"
                    :config="configHarga2"
                    autofocus
                    :initialized="onInitialized" style="width:100%"/>
            </div>
        </div>
        <div class="row background">
            <div class="card-caption-home">Harga Termasuk</div>
            <br/>
            <editor
                ref="jadwal"
                :config="configJadwal"
                autofocus
                :initialized="onInitialized" style="width:100%"/>
        </div>
        <div class="row background">
            <div class="card-caption-home">Harga Termasuk</div>
            <br/>
            <editor
                ref="itinerary"
                :config="configItinerary"
                autofocus
                :initialized="onInitialized" style="width:100%"/>
        </div>
        <div class="row background">
            <div class="card-caption-home">Harga Termasuk</div>
            <br/>
            <editor
                ref="tambahan"
                :config="configTambahan"
                autofocus
                :initialized="onInitialized" style="width:100%"/>
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
    import moment from "moment";

    export default {
        data() {
            return {
                success_get: false,
                res: [],
                configHarga1: {
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
                configHarga2: {
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
                configJadwal: {
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
                configItinerary: {
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
                configTambahan: {
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {}
                },
            };
        },
        methods: {
            onInitialized(harga1) {
            },
            onInitialized(harga2) {
            },
            onInitialized(jadwal) {
            },
            onInitialized(itinerary) {
            },
            onInitialized(tambahan) {
            },
            getDetail() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                axios.get(`/get-paket/${id}`)
                    .then(e => {
                        this.res = e.data
                        this.configHarga1.data = JSON.parse(e.data.harga_termasuk)
                        this.configHarga2.data = JSON.parse(e.data.harga_tidak_termasuk)
                        this.configJadwal.data = JSON.parse(e.data.jadwal)
                        this.configItinerary.data = JSON.parse(e.data.itinerary)
                        this.configTambahan.data = JSON.parse(e.data.keterangan)
                        this.success_get = true
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            },
            edit() {
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                window.location.href = `/edit-paket/${id}`;
            },
            hapus() {
                axios.get('/detail-paket/delete', {id: this.res.id_pkt_wisata})
                    .then(e => {
                        alert('Paket wisata berhasil dihapus')
                        window.location.href = '/kelola-wisata'
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi')
                    })
            }
        },
        mounted() {
            this.getDetail()
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
