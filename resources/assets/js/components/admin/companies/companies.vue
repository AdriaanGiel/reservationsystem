<template>

        <div class="row">
            <div class="col  s12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h2 class="header center-align">Alle bedrijven <a href="/admin/companies/create" data-position="right" data-delay="50" data-tooltip="Bedrijf toevoegen" class="tooltipped btn-floating btn-large waves-effect waves-light standard-background"><i class="material-icons">add</i></a></h2>
                        </div>


                        <table id="table_id" class="mdl-data-table responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Naam</th>
                                <th class="desktop">Status</th>
                                <th class="all">Bedrijf status</th>
                                <th class="all">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  v-for="company in companies">
                                <td>{{ company.name }}</td>
                                <td>{{ company.status.name }}</td>
                                <td>{{ company.company_status.name }}</td>
                                <td>
                                    <a :href="company.editRoute" class="btn orange darken-3 small-buttons">
                                        <i class="material-icons">create</i>
                                    </a>

                                    <a @click="deleteCompany(company.id)" class="btn red darken-1 small-buttons">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>




</template>

<script>
    export default {
        name: "companies",
        props: ["companiesObject"],
        data(){
            return {
                companies: this.companiesObject
            }
        },
        methods:{
            removeDeletedCompany(id){
                let $index;

                this.companies.forEach(function(company,index){
                    if(company.id == id) {
                        $index = index;
                    }
                });

                Vue.delete(this.companies,$index);


                console.log(this.companies);
                console.log(id);
            },
            deleteCompany(id){
                let $this = this;
                swal({
                    title: 'Weet je het zeker?',
                    text: "Bedrijf en alle afspraken die daarbij horen worden verwijderd!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Verwijderen'
                }).then((result) => {
                    if (result.value) {

                        axios.delete('/admin/companies/' + id,{
                            id: id
                        }).then(function (response) {
                            swal(
                                'Verwijderd!',
                                'Bedrijf is verwijderd.',
                                'success'
                            ).then(function(response2){
                                $this.removeDeletedCompany(response.data);
                            })
                        }).catch(function(error){
                            swal(
                                'Fout!',
                                'Er is iets fout gegaan.',
                                'error'
                            )
                        });


                    }
                });
            }
        },
        mounted(){
            $('#table_id').DataTable({
                responsive: true
            });
        },

    }
</script>

<style scoped>

</style>