<template>
    <div class="row">
        <form id="assignment-create" @submit.prevent="validateForm" method="post" :action="createUrl">
            <input type="hidden" name="_token" :value="csrfToken">
            <input v-if="editAssignement" type="hidden" name="_method" value="PATCH">
            <div class="col s12">


                <div class="card">
                    <loader v-show="loading"></loader>
                    <div class="card-content">

                    <span class="card-title">
                        Afspraak {{ title }}
                    </span>
                        <div class="row">

                            <company-auto-complete @loaded="loadLoader" option="true" v-if="!editAssignement">
                                <error-message v-if="errors" slot="error" :errors="errors.company"></error-message>
                            </company-auto-complete>


                            <div v-if="editAssignement" class="input-field col s12">
                                <input v-model="company" disabled name="company" id="company" type="text"
                                       class="datepicker">
                                <label for="company">Bedrijf</label>
                            </div>


                            <div class="input-field col s12">
                                <input v-model="date" name="date" id="date_form" type="text" class="datepicker">
                                <label for="date_form">Datum</label>
                            </div>
                            <error-message v-if="errors" :errors="errors.date"></error-message>

                            <div class="input-field col s12">
                                <input v-model="time" name="start_time" id="time_form" type="text" class="timepicker">
                                <label for="time_form">Start tijd</label>
                                <error-message v-if="errors" :errors="errors.start_time"></error-message>
                            </div>

                            <div class="input-field col s12">
                                <input name="hours" id="hours" type="number" class="">
                                <label for="hours">Uren</label>
                                <error-message v-if="errors" :errors="errors.hours"></error-message>
                            </div>

                            <material-select
                                    label="Kies reden van bezoek"
                                    name="assignment_type_id"
                                    :items="assignmentTypes"
                                    :compare-selected="reason"
                            >
                                <error-message v-if="errors" slot="error" :errors="errors.assignment_type_id"></error-message>
                            </material-select>


                            <div class="input-field col s12">
                                <textarea id="textarea1" name="description" class="materialize-textarea"
                                          data-length="500"></textarea>
                                <label for="textarea1">Wat ga je doen?</label>
                                <error-message v-if="errors" :errors="errors.description"></error-message>
                            </div>


                        </div>


                    </div>
                    <div class="card-action flex flex-center">
                        <button type="submit" class="waves-effect waves-light btn">Verzenden <i v-if="validateLoad"
                                                                                                class="fa fa-refresh fa-spin"
                                                                                                aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    import CompanyForm from '../companies/form.vue';
    import CompanyAutoComplete from '../../partials/CompanyAutoComplete.vue';
    import MaterialSelect from '../../partials/MaterialSelect.vue';
    import ErrorMessage from '../../partials/messages/errorMessage.vue';
    import Loader from '../../partials/loader.vue';

    export default {
        props: {
            title: {
                default: 'toevoegen'
            },
            createUrl: {
                required: true
            },
            assignmentTypes: {
                required: true
            },
            csrfToken: {
                required: true
            },
            editAssignement: {
                default: false
            },
            dateObject: {}, timeObject: {}, reason: {}, hours: {}, description: {}, company: {}
        },
        components: {
            'company-form': CompanyForm,
            'company-auto-complete': CompanyAutoComplete,
            'material-select': MaterialSelect,
            'error-message': ErrorMessage,
            'loader': Loader,
        },
        data() {
            return {
                companyForm: false,
                errors: {
                    company: {},
                    date: {},
                    time: {},
                    hours: {},
                    assignment_type_id: {},
                    description: {}
                },
                validateLoad: false,
                originalErrors: {
                    company: {},
                    date: {},
                    time: {},
                    hours: {},
                    assignment_type_id: {},
                    description: {}
                },
                loading:true,
                time: this.timeObject,
                date: this.dateObject
            }
        },
        mounted() {
            this.setUpDatePicker();
            this.setUpTimePicker();
            this.setUpSelect();
        },
        methods: {
            loadLoader(){
                console.log('asdsa');
                this.loading = !this.loading;
            },
            showCompanyForm() {
                this.companyForm = !this.companyForm;
            },
            validateForm() {
                console.log(this.time);
                let formData = $('#assignment-create').serializeArray();
                let data = {};
                this.loadLoader();
                formData.forEach(function (input) {
                    if (String(input.name) != '_method' && String(input.name) != '_token') {
                        data[input.name] = input.value;
                    }
                });
                this.validateLoad = true;

                axios.post('/api/validate/assignment', data)
                    .then(response => this.validatedForm(response))
                    .catch(errors => this.handleValidationErrors(errors))
            },
            validatedForm(response) {
                this.errors = this.originalErrors;
                if (response.data) {

                    $('#assignment-create').submit();
                }
            },
            handleValidationErrors(errors) {
                this.errors = errors.response.data.errors;
                this.validateLoad = false;
                this.loadLoader();
            },
            setUpSelect() {
                $('select').material_select();
            },
            setUpDatePicker() {
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    today: 'Today',
                    clear: 'Clear',
                    close: 'Ok',
                    closeOnSelect: false // Close upon selecting a date,
                });
            },
            setUpTimePicker() {
                $('.timepicker').pickatime({
                    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                    twelvehour: false, // Use AM/PM or 24-hour format
                    donetext: 'OK', // text for done-button
                    cleartext: 'Clear', // text for clear-button
                    canceltext: 'Cancel', // Text for cancel-button
                    autoclose: false, // automatic close timepicker
                    ampmclickable: true, // make AM PM clickable
                    aftershow: function () {
                    } //Function for after opening timepicker
                });
            }


        }
    }
</script>