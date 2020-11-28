<template>
    <div>
        <ckeditor :editor="editor" v-model="data" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
    import CKEditorClassic from '@ckeditor/ckeditor5-build-balloon-block'
    import UploadAdapter from "../UploadAdapter";

    export default {
        data() {
            return {
                editor: CKEditorClassic,
                data: null,
                editorConfig: {
                    extraPlugins: [this.uploader],
                },
            }
        },
        methods: {
            uploader(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new UploadAdapter(loader);
                };
            }
        }
    }
</script>

<style scoped>

</style>
