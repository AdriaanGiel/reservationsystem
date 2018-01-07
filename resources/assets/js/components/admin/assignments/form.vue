<template>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <h4>Afspraak {{ title }}</h4>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Kies een bedrijf</option>
                                <option value="false">Nieuw bedrijf</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Bedrijven</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s6">
                            <input :value="date" type="text" id="date" name="date" class="datepicker">
                            <label for="date">Datum</label>
                        </div>

                        <div class="input-field col s6">
                            <input :value="time" type="text" id="time" name="time" class="timepicker">
                            <label for="time">Tijd</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input :value="hours" type="number" id="hours" name="hours">
                            <label for="Hours">Uren</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea">{{ description }}</textarea>
                            <label for="textarea1">Beschrijving</label>
                        </div>
                    </div>


                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn red-background">Versturen</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "form",
        props:['title','date','time','description','hours']
        ,
        mounted(){
            $('select').material_select();

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });

            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Clear', // text for clear-button
                canceltext: 'Cancel', // Text for cancel-button
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });
        }
    }
</script>

<style scoped>

</style>