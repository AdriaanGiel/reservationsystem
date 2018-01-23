<template>
    <div>
        <a v-if="assignments" v-for="assignment in assignments" :href="showRoute(assignment.id)">
            <div  class="card text-black">
                <div class="card-content">
                    <div class="card-title">
                        {{assignment.company.name}}
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p><i class="inline-icon material-icons">perm_contact_calendar</i><strong>Datum: </strong>{{assignment.date}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p><i class="inline-icon material-icons">access_time</i><strong>Tijd: </strong>{{assignment.start_time}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </a>

        <div v-if="assignments.length == 0" class="card">
            <div class="card-content">
                <span class="card-title">
                Geen afspraken gevonden
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "assignment-collection",
        props:{
            assignments:{required:true}
        },
        methods:{
            showRoute(id){
                return "/assignments/" + id;
            }
        }
    }
</script>

<style scoped>

</style>