<template>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        Afspraak toevoegen
                    </span>

                    <div class="row">
                        <form action="">
                            <div class="input-field col s12">
                                <input placeholder="Naam bedrijf" name="company" id="company_form" type="text" class="validate">
                                <label for="company_form">Bedrijf</label>
                            </div>

                            <div class="input-field col s12">
                                <input name="date" id="date_form" type="text" class="datepicker">
                                <label for="date_form">Datum</label>
                            </div>

                            <div class="input-field col s12">
                                <input name="tijd" id="time_form" type="text" class="timepicker">
                                <label for="time_form">Datum</label>
                            </div>


                            <div class="input-field col s12">
                                <input placeholder="straat" name="street" id="street_form" type="text" class="validate">
                                <label for="street_form">Straat</label>
                            </div>

                            <div class="input-field col s12">
                                <input placeholder="postcode" name="zipcode" id="zip_form" type="text" class="validate">
                                <label for="zip_form">Postcode</label>
                            </div>

                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Kies reden</option>
                                    <option value="1">Werving</option>
                                    <option value="2">Promo</option>
                                </select>
                                <label>Reden afspraak</label>
                            </div>


                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" data-length="500"></textarea>
                                <label for="textarea1">Textarea</label>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>

    // let Appointment = require('../../models/appointment');

    import Appointment from '../../models/appointment';

    export default {
        mounted(){

            // Appointment.all();

            this.setUpDatePicker();
            this.setUpTimePicker();
        },
        methods:{
            setUpDatePicker(){
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    today: 'Today',
                    clear: 'Clear',
                    close: 'Ok',
                    closeOnSelect: false // Close upon selecting a date,
                });
            },
            setUpTimePicker(){
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
    }
</script>