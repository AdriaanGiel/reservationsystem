<template>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div style="width: 100%;" id="calendar"></div>
                </div>
            </div>
        </div>

        <div v-if="event" id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>{{ event.title}}</h4>

                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">business</i> <strong>Bedrijf:</strong> {{ event.company.name }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">perm_contact_calendar</i> <strong>Datum:</strong> {{ event.formatted_date }}
                        </p>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">access_time</i> <strong>Tijd:</strong> {{ event.start_time }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">timer</i> <strong>Uren:</strong> {{ event.hours }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">settings_applications</i> <strong>Type:</strong> {{ event.type.name }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <p class="">
                            <i class="inline-icon material-icons">build</i> <strong>Wat ga je doen?:</strong>
                        </p>

                        <p class="flow-text" style="font-size: 16px">
                            {{ event.description }}
                        </p>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
            </div>
        </div>
    </div>
</template>
<script>
    import CompanyAutoComplete from '../../partials/CompanyAutoComplete.vue';
    import MaterialSelect from '../../partials/MaterialSelect.vue';

    export default {
        data(){
          return {
              events:{},
              event:{
                  company:{name:''},
                  type:{name:''}
              }
          }
        },
        components: {
            'company-auto-complete': CompanyAutoComplete,
            'material-select': MaterialSelect
        },
        mounted(){
            $('.modal').modal();
            this.setUpCalendar(this.events)

        },
        methods:{
            setUpCalendar(events) {
                let $this = this;
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    editable: true,
                    selectable:true,
                    eventLimit: true, // allow "more" link when too many events
                    navLinks: true,
                    contentHeight: 600,
                    events: "/api/assignments/calendardata/",
                    timeFormat: 'H(:mm)',
                    eventClick(event,jsEvent,view){
                        $this.showEvent(event);
                    },
                    select(start,end,jsEvent){
                        let time = new Date().getTime();
                        if(start._i < time){
                            Materialize.toast('Deze datum is al geweest, kies een ander datum.', 4000);
                        }else{
                            Materialize.toast('Even wachten...', 4000);
                            window.location.href = '/assignments/create?start='+start.format('X')+"&time="+start.format("HH:mm");
                        }
                    }
                })
            },
            showEvent(event) {
                this.event = event;
                $('#modal2').modal('open');
            },
            refreshCalendar(){
                $('#calendar').fullCalendar('refetchEvents');
            }
        }
    }

</script>