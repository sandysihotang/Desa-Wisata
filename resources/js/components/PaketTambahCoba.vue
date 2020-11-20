<template>
    <div class="container">
        <form @submit.prevent="save">
            <div class="row">
                <div class="title">Tambah Paket Wisata coba</div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left">Nama Paket</div>
                <div class="col-md-8">
                    <input class="form-control" type="text" v-model="data_res.judul" required/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 text-left">Foto Sampul</div>
                <div class="col-md-8">
                    <input required type="file" accept="image/*" @change="change_image">
                </div>
            </div>
            <hargatermasuk></hargatermasuk>
            <div class="row mt-2">
                <div class="col-md-4 text-left">Harga Paket</div>
                <div class="col-md-8">
                    <input class="form-control" type="text" v-model="data_res.harga_paket" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">Harga Tidak Termasuk</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <editor
                        class="border"
                        ref="harga2"
                        :config="config"
                        :init-data="initData"
                        autofocus
                        :initialized="onInitialized" style="width:100%"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">Jadwal</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <editor
                        class="border"
                        ref="jadwal"
                        :config="config"
                        :init-data="initData"
                        autofocus
                        :initialized="onInitialized" style="width:100%"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">Itinerary</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <editor
                        class="border"
                        ref="itinerary"
                        :config="config"
                        :init-data="initData"
                        autofocus
                        :initialized="onInitialized" style="width:100%"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">Tambahan</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <editor
                        class="border"
                        ref="tambahan"
                        :config="config"
                        :init-data="initData"
                        autofocus
                        :initialized="onInitialized" style="width:100%"/>
                </div>
            </div>
            <div class="row" style="padding-top:15px">
                <div class="col-md-12">
                    <button class="btn btn-new" type="submit">Tambah</button>
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
                    judul: '',
                    img: '',
                    harga: '',

                    harga1: '',
                    harga2: '',
                    jadwal: '',
                    itinerary: '',
                    tambahan: '',

                },
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
            change_image(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.data_res.img = e.target.result;
                };
                reader.readAsDataURL(files[0]);
            },
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
            async save() {
                const response1 = await this.$refs.harga1.state.editor.save().then((res)=>res);
                this.data_res.harga1 = JSON.stringify(response1);

                const response2 = await this.$refs.harga2.state.editor.save().then((res)=>res);
                this.data_res.harga2 = JSON.stringify(response2);

                const response3 = await this.$refs.jadwal.state.editor.save().then((res)=>res);
                this.data_res.jadwal = JSON.stringify(response3);

                const response4 = await this.$refs.itinerary.state.editor.save().then((res)=>res);
                this.data_res.itinerary = JSON.stringify(response4);

                const response5 = await this.$refs.tambahan.state.editor.save().then((res)=>res);
                this.data_res.tambahan = JSON.stringify(response5);

                axios.post('/save-new-paket', this.data_res)
                    .then(e => {
                        alert('Objek wisata berhasil ditambahkan')
                        window.location.href = '/kelola-wisata'
                    })
                    .catch(e => {
                        alert('Kelasahan pada sistem, Coba beberapa waktu lagi.')
                    })
            },
            getObjectWisata() {
                axios.get('/list-kat-wisata')
                    .then(e => {
                        this.objectWisata = e.data
                    })
                    .catch(e => {
                        alert('Terjadi kesalahan pada sistem, Coba lagi!');
                    })
            }
        },
        mounted() {
            this.getObjectWisata();
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
