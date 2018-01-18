<template>
    <div class="row">
        <div class="col  s12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <h2 class="header center-align">Alle afspraken <a href="/admin/assignments/create" data-position="right" data-delay="50" data-tooltip="Afspraak toevoegen" class="tooltipped btn-floating btn-large waves-effect waves-light standard-background"><i class="material-icons">add</i></a>
                        </h2>
                    </div>
                    <table id="table_id" class="mdl-data-table responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="all">Medewerker</th>
                            <th class="all">Bedrijf</th>
                            <th class="tablet-l desktop">Uren</th>
                            <th class="tablet-l desktop">Datum</th>
                            <th class="desktop">type</th>
                            <th class="all">Keuren</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="assignment in assignments">
                            <td>{{ assignment.user.name }}</td>
                            <td>{{ assignment.company.name }}</td>
                            <td>{{ assignment.hours }}</td>
                            <td>{{ assignment.date }}</td>
                            <td>{{ assignment.type.name }}</td>
                            <td>
                                <a :href="getShowUrl(assignment)" data-position="top" data-delay="50" data-tooltip="Afspraak bekijken"  class="btn blue tooltipped darken-1 small-buttons">
                                    <i class="material-icons">remove_red_eye</i>
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
        name: "assignments",
        props:['assignments'],
        methods:{
            getEditUrl(assignment){
                return "/admin/assignments/" + assignment.id + "/edit";
            },
            getShowUrl(assignment){
                return "/admin/assignments/" + assignment.id;
            },
            deleteAssignment()
            {
                swal({
                    title: 'Weet je het zeker?',
                    text: "Afspraak wordt verwijderd!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Verwijderen'
                }).then((result) => {
                    if (result.value) {

                        axios.delete('/admin/assignments/' + id,{
                            id: id
                        }).then(function (response) {
                            swal(
                                'Verwijderd!',
                                'Afspraak is verwijderd.',
                                'success'
                            )
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
        computed:{

        }
    }
</script>

<style scoped>

</style>