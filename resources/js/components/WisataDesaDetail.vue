<template>
    <div class="container">
        <div class="col-md-12">
            <editor ref="editor" :config="config" :initialized="onInitialized"/>
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
                        document.getElementsByClassName('ce-toolbar')[0].style.display = "none"
                    },
                    onChange: (args) => {
                    },
                    data: {
                        "time": 1604224033907,
                        "blocks": [
                            {
                                "type": "header",
                                "data": {
                                    "text": "Editor.js",
                                    "level": 2
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "Hey. Meet the new Editor. On this page you can see it in action — try to edit this text."
                                }
                            },
                            {
                                "type": "header",
                                "data": {
                                    "text": "Key features",
                                    "level": 3
                                }
                            },
                            {
                                "type": "list",
                                "data": {
                                    "style": "unordered",
                                    "items": [
                                        "It is a block-styled editor",
                                        "It returns clean data output in JSON",
                                        "Designed to be extendable and pluggable with a simple API"
                                    ]
                                }
                            },
                            {
                                "type": "header",
                                "data": {
                                    "text": "What does it mean «block-styled editor»",
                                    "level": 3
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor's Core."
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "There are dozens of <a href=\"https://github.com/editor-js\">ready-to-use Blocks</a> and the <a href=\"https://editorjs.io/creating-a-block-tool\">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games."
                                }
                            },
                            {
                                "type": "header",
                                "data": {
                                    "text": "What does it mean clean data output",
                                    "level": 3
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below"
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "Given data can be used as you want: render with HTML for <code class=\"inline-code\">Web clients</code>, render natively for <code class=\"inline-code\">mobile apps</code>, create markup for <code class=\"inline-code\">Facebook Instant Articles</code> or <code class=\"inline-code\">Google AMP</code>, generate an <code class=\"inline-code\">audio version</code> and so on."
                                }
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "Clean data is useful to sanitize, validate and process on the backend."
                                }
                            },
                            {
                                "type": "delimiter",
                                "data": {}
                            },
                            {
                                "type": "paragraph",
                                "data": {
                                    "text": "We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make it's core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. 😏"
                                }
                            },
                            {
                                "type": "image",
                                "data": {
                                    "file": {
                                        "url": "https://codex.so/public/app/img/external/codex2x.png"
                                    },
                                    "caption": "",
                                    "withBorder": false,
                                    "stretched": false,
                                    "withBackground": false
                                }
                            }
                        ],
                        "version": "2.19.0"
                    }
                },
            };
        },
        methods: {
            onInitialized(editor) {
            },
            saveBlog() {

            }
        }
    };
</script>

<style>

</style>
