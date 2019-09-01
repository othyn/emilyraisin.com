<template>
    <b-table
        id="file-table"
        responsive
        striped
        hover
        bordered
        show-empty
        head-variant="dark"
        :items="dataSource"
        :fields="fields"
        :busy.sync="isBusy"
        no-provider-paging
        no-provider-sorting
        no-provider-filtering>

        <div slot="table-busy" class="text-center my-2">
            <b-spinner class="align-middle"></b-spinner>
            <strong>Loading...</strong>
        </div>

        <template slot="empty" slot-scope="scope">
            <p class="text-center my-2">There doesn't appear to be anything here yet... please feel free upload some files!</p>
        </template>

        <template slot="[options]" slot-scope="data">
            <file-table-delete-button :file-id="data.item.id" :file-name="data.item.original_name"></file-table-delete-button>
        </template>
    </b-table>
</template>

<script>
    export default {
        data: () => ({
            isBusy: false,
            fields: [{
                key: 'original_name',
                label: 'Name',
                sortable: true
            }, {
                key: 'url',
                sortable: true
            }, {
                key: 'created_at',
                label: 'Created',
                sortable: true,
            }, {
                key: 'options'
            }]
        }),
        methods: {
            dataSource(context) {
                let promise = axios.get('/blog/files/list')

                return promise.then((response) => {
                    return (response.data || [])
                }).catch(error => {
                    swal('Uh-oh 😨', 'There was a problem loading the files, please try again later.', 'error');
                    return []
                })
            }
        }
    }
</script>
