<template>
    <div class="row">
        <div class="col  s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        Afspraak
                    </span>

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
                                <i class="inline-icon material-icons">access_time</i> <strong>Datum:</strong> {{ assignment.formatted_date }}
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
</template>

<script>
    export default {
        name: 'assignment',
        props:['assignmentObject'],
        data(){
            return{
                assignment:{
                    company:{

                    },
                    status:{

                    },
                    type:{

                    }
                }
            }
        },
        mounted(){
            this.assignment = this.assignmentObject;
        }

    }
</script>