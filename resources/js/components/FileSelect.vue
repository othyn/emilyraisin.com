<template>
    <b-input-group class="mb-3">
        <b-form-select v-model="selected" :options="options" :disabled="disabled">
            <template slot="first">
                <option :value="null" disabled>Select an image to quick insert...</option>
            </template>
        </b-form-select>
        <b-input-group-append>
            <b-button variant="outline-info" @click="clicked">Insert</b-button>
        </b-input-group-append>
    </b-input-group>
</template>

<script>
    export default {
        props: {
            insertIntoId: {
                type: String,
                required: true
            },
        },
        data: () => ({
            selected: null,
            disabled: true,
            options: []
        }),
        computed: {
            imageLink() {
                if (this.selected === null || !this.selected.includes('|')) {
                    return ''
                }

                let chunks = this.selected.split('|')
                // Extract the url|alt_text from the selection

                return `![${chunks[1]}](${chunks[0]})`
            }
        },
        methods: {
            getOptions() {
                axios
                    .get('/blog/files/list/select')
                    .then((response) => {
                        this.disabled = false
                        this.options = response.data
                    }).catch(error => {
                        swal('Uh-oh 😨', 'There was a problem loading the files, please try again later.', 'error');
                        this.options = []
                    })
            },
            clicked() {
                let simpleMde = document.getElementById(this.insertIntoId).simpleMde
                let simpleMdeCursorPosition = simpleMde.codemirror.getCursor();
                simpleMde.codemirror.replaceRange(this.imageLink, simpleMdeCursorPosition);
                // 'paste' the text into simpleMDE
            }
        },
        created() {
            this.getOptions()
        }
    }
</script>
