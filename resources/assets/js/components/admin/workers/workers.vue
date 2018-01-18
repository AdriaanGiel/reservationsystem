<template>
    <div class="row">
        <div class="col  s12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <h2 class="header center-align ">Alle medewerkers <a href="/admin/users/create" data-position="right" data-delay="50" data-tooltip="Medewerker toevoegen" class="tooltipped btn-floating btn-large waves-effect waves-light standard-background"><i class="material-icons">add</i></a></h2>
                    </div>
                    <table id="table_id" class="mdl-data-table responsive" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="all">Naam</th>
                            <th class="desktop">Email</th>
                            <th class="all">Uren</th>
                            <th class="all">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="worker in workers">
                            <td>{{ worker.profile.firstname }} {{ worker.profile.lastname }}</td>
                            <td>{{ worker.email }}</td>
                            <td>{{ worker.profile.hours }}</td>
                            <td>
                                <a :href="worker.showRoute" class="btn blue darken-1 small-buttons">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>

                                <a :href="worker.editRoute" class="btn orange darken-3 small-buttons">
                                    <i class="material-icons">create</i>
                                </a>

                                <a @click="deleteWorker(worker.id)" class="btn red darken-1 small-buttons">
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
        name: "workers",
        props: ["workers","profile"],
        methods:{
          deleteWorker(id){
              swal({
                  title: 'Weet je het zeker?',
                  text: "Medewerker wordt verwijderd!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Verwijderen'
              }).then((result) => {
                  if (result.value) {

                      axios.delete('/admin/users/' + id,{
                          id: id
                      }).then(function (response) {
                          console.log(response);
                          swal(
                              'Verwijderd!',
                              'Medewerker is verwijderd.',
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
        }
    }
</script>

<style scoped>

</style>