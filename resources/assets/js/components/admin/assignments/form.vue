<template>
    <div class="row">
        <form @submit.prevent="validateForm" id="assignment-edit" :action="route" method="POST">


            <form-required method="method" token="token"></form-required>

            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h4>Afspraak {{ title }}</h4>
                        </div>

                        <div class="row">

                        </div>

                        <div class="row">
                            <company-auto-complete option="true" v-if="!editForm"
                                                   v-on:activateNewCompany="showCompanyForm"></company-auto-complete>
                        </div>


                        <div v-if="editForm" class="row">
                            <div class="input-field col s12">
                                <input v-model="company" disabled name="company" id="company" type="text"
                                       class="datepicker">
                                <label for="company">Bedrijf</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input v-model="date" type="text" id="date" name="date" class="datepicker">
                                <label for="date">Datum</label>
                            </div>

                            <div class="input-field col s12">
                                <input v-model="time" type="text" id="time" name="time" class="timepicker">
                                <label for="time">Tijd</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input v-model="hours" type="number" id="hours" name="hours">
                                <label for="Hours">Uren</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea :disabled="validateLoad" id="textarea1" class="materialize-textarea">{{ description }}</textarea>
                                <label for="textarea1">Beschrijving</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-action flex flex-center">
                        <a :disabled="validateLoad" class="waves-effect waves-light btn red-background">Versturen <i v-if="validateLoad"
                                                                                            class="fa fa-refresh fa-spin"
                                                                                            aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import CompanyAutoComplete from "../../partials/CompanyAutoComplete.vue";
    import CompanyForm from "../../front/companies/form.vue";
    import MaterialSelect from '../../partials/MaterialSelect.vue';
    import FormRequired from '../../partials/form-required.vue';
    import UserAutoComplete from '../../partials/WorkerAutoComplete';

    export default {
        name: "form",
        props: {
            title: {},
            assignmentObject:{},
            companyObject: {},
            token: {},
            method: {},
            route:{},
        },
        data() {
            return {
                companyForm: false,
                validateLoad:false,
                assignment:this.assignmentObject,
                company:this.companyObject
            }
        },
        components: {
            "company-auto-complete": CompanyAutoComplete,
            "company-form": CompanyForm,
            'material-select': MaterialSelect,
            'form-required': FormRequired,
            'worker-auto-complete': UserAutoComplete
        },
        methods: {
            showCompanyForm() {
                console.log('saasdasd');
                this.companyForm = !this.companyForm;
            },
            validateForm() {
                let formData = $('#assignment-edit').serializeArray();
                let data  = {};

                formData.forEach(function(input){
                    if(String(input.name) != '_method' && String(input.name) != '_token'){
                        data[input.name] = input.value;
                    }
                });
                this.validateLoad = true;

                axios.post('/api/admin/validate/assignment',data)
                    .then(response => this.validatedForm(response))
                    .catch(errors => this.handleValidationErrors(errors));
                this.$emit('loading');
            },
            validatedForm(response){
                if(response.data){
                    $('#assignment-edit').submit();
                }
            },
            handleValidationErrors(errors){
                this.errors = errors.response.data.errors;
                this.validateLoad = false;
                this.$emit('loading');
            }

        },
        mounted() {
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
                aftershow: function () {
                } //Function for after opening timepicker
            });
        }
    }
</script>

<style scoped>

</style>