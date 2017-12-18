<template>
    <div class="row">
        <div class="col s12 m5 ">
            <div class="card">

                <div class="card-content">
                                <span class="card-title">
                                    Filters
                                </span>

                    <ul>
                        <li>TEst</li>
                        <li>TEst</li>
                        <li>TEst</li>
                    </ul>


                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid culpa cupiditate enim facilis illo, itaque iure non nostrum officia optio placeat qui rem ullam voluptate voluptatem? Eum eveniet optio tenetur?
                </div>
            </div>
        </div>


        <div class="col m7 flex flex-align-left">
            <div style="width: 100%;" id="calendar"></div>
        </div>
    </div>
</template>
<script>

    export default {
        mounted(){
            $(document).ready(function(){
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    navLinks: true,
                    contentHeight: 600
                })
            });
        }
    }

</script>