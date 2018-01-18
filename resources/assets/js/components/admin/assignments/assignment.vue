<template>
    <div>
        <div class="row">
            <div class="col  s12">
                <div class="card">
                    <div class="card-content">
                    <div class="card-title" style="width: 100%">
                        <p><span class="left-align">Medewerker</span></p>
                    </div>

                        <br>
                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">account_circle</i> {{ assignment.user.profile.firstname }} {{ assignment.user.profile.lastname }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">access_time</i> {{ assignment.user.profile.hours }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">email</i> {{ assignment.user.email }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">call</i> {{ assignment.user.profile.phonenumber }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col  s12">
                <div class="card">
                    <div class="card-content">
                    <div class="card-title">
                        <p>Afspraak</p>
                        <div class="switch">
                            <label>
                                Afkeuren
                                <input @change="judgeAssignment()" v-model="judgement" :value="judgement" type="checkbox">
                                <span class="lever"></span>
                                Goedkeuren
                            </label>
                        </div>
                    </div>

                        <br>
                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">business</i> <strong>Bedrijf:</strong> {{ assignment.company.name }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">perm_contact_calendar</i> <strong>Datum:</strong> {{ assignment.formatted_date }}
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">access_time</i> <strong>Tijd:</strong> {{ assignment.start_time }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">timer</i> <strong>Uren:</strong> {{ assignment.hours }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">info</i> <strong>Status:</strong>
                                </p>
                                <span :class="statusClass">{{ assignment.status.name }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">settings_applications</i> <strong>Type:</strong> {{ assignment.type.name }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p class="">
                                    <i class="inline-icon material-icons">build</i> <strong>Wat ga je doen?:</strong>
                                </p>

                                <p class="flow-text" style="font-size: 16px">
                                    {{ assignment.description }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "assignment",
        props:['assignmentObject'],
        data(){
            return {
                assignment: {
                    user:{
                        profile: {}
                    },
                    company:{

                    },
                    type:{

                    },
                    status:{

                    }
                },
                judgement:false,
                statusClass:'chip red'
            }
        },
        mounted(){
            this.assignment = this.assignmentObject;
            this.judgement = this.setCheckBoxDefault();
            this.statusClass = this.getStatusClass()
        },
        methods:{
            setStatusClass(){
                this.statusClass = this.getStatusClass();
            },
            getStatusClass(){
                console.log(this.assignment.status.id);
                if(this.assignment.status.id == 1){
                    return "chip orange";
                }

                if(this.assignment.status.id == 2){
                    return "chip green";
                }

                return "chip red";
            },
            setCheckBoxDefault()
            {
                if(this.assignment.status.id == 2){
                    return true;
                }
                return false;
            },
            judgeAssignment(){
                axios.post('/admin/assignments/' + this.assignment.id + '/judge',{
                    judgement: this.judgement
                }).then(response => this.judgedAssignmentHandler(response.data)).catch();

            },
            judgedAssignmentHandler(data){
                this.assignment.status.id = data.status_id;
                this.assignment.status.name = data.status.name;
                this.setStatusClass();
            }
        }
    }
</script>

<style scoped>

</style>