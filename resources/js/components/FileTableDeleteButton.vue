<template>
    <b-button variant="outline-danger" size="sm" block @click="clicked">Delete</b-button>
</template>

<script>
    export default {
        props: {
            fileId: {
                type: Number,
                required: true
            },
            fileName: {
                type: String,
                required: true
            }
        },
        methods: {
            deleteFile() {
                swal({
                    title: `Delete ${this.fileName}?`,
                    text: 'This will permanently delete the file. This is action not recoverable. Continue?',
                    icon: 'warning',
                    buttons: ['Hell no!', 'Yes, shred the file'],
                    dangerMode: true,
                })
                .then((value) => {
                    if (value) {
                        axios
                            .delete(`/blog/files/${this.fileId}`)
                            .then((response) => {
                                this.$root.$emit('bv::refresh::table', 'file-table')
                            })
                            .catch((error) => {
                                swal('Uh-oh 😨', 'There was a problem fetching the file list, try again in a minute.', 'error');
                            });
                    }
                });
            },
            clicked() {
                this.deleteFile()
            }
        }
    }
</script>
