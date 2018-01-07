<template>
    <div>
        <table id="table_id" class="mdl-data-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
            <tr>
                <td>test1</td>
                <td>test2</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "assignments",
        data(){
            return {
                assignments:[]
            }
        },
        methods:{

        },
        mounted(){
            $('#table_id').DataTable();
        }
    }
</script>

<style scoped>

</style>