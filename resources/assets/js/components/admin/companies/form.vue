<template>
    <div>
        <form @submit.prevent="validateForm" id="company-edit" :action="route" method="post">
            <form-required :token="token" :method="method">
            </form-required>
            <company-form :company-object="company" :edit="edit" :errors-object="errors">
                <material-select slot="status-form" label="Kies bedrijf status" default-text="Kies status"
                                 name="company_status_id" :items="statuses"
                                 :compare-selected="company.company_status_id">
                    <error-message slot="error" :errors="errors.company_status_id"></error-message>
                </material-select>

                <error-message slot="error-name" :errors="errors.name"></error-message>
                <error-message slot="error-street" :errors="errors.street"></error-message>
                <error-message slot="error-number" :errors="errors.number"></error-message>
                <error-message slot="error-insertion" :errors="errors.insertion"></error-message>
                <error-message slot="error-zipcode" :errors="errors.zipcode"></error-message>
                <error-message slot="error-city" :errors="errors.city"></error-message>
                <error-message slot="error-description" :errors="errors.description"></error-message>
                <error-message slot="error-argumentation" :errors="errors.argumentation"></error-message>

                <div slot="submit" class="card-action flex flex-center">
                    <button :disabled="validateLoad"  type="submit" class="waves-effect waves-light btn">Verzenden <i v-if="validateLoad" class="fa fa-refresh fa-spin" aria-hidden="true"></i></button>
                </div>
            </company-form>
        </form>
    </div>

</template>

<script>
    import CompanyForm from "../../front/companies/form.vue";
    import MaterialSelect from '../../partials/MaterialSelect.vue';
    import FormRequired from '../../partials/form-required.vue';
    import ErrorMessage from '../../partials/messages/errorMessage.vue';

    export default {
        name: "form",
        props: {
            statuses: {required: true},
            company: {
                default: function () {
                    return {company_status_id:{ }}
                }
            },
            edit: {default: false},
            token:{required:true},
            route:{required:true},
            method:{required:true, default:'POST'}
        },
        data() {
            return {
                autoValue: "",
                errors:{
                    company_status_id:{ }
                },
                validateLoad:false
            }
        },
        components: {
            'company-form': CompanyForm,
            'material-select': MaterialSelect,
            'form-required': FormRequired,
            'error-message': ErrorMessage,
        },
        methods:{
            validateForm() {
                let formData = $('#company-edit').serializeArray();
                let data  = {};

                formData.forEach(function(input){
                    if(String(input.name) != '_method' && String(input.name) != '_token'){
                        data[input.name] = input.value;
                    }
                });
                this.validateLoad = true;

                axios.post('/api/admin/validate/company',data)
                    .then(response => this.validatedForm(response))
                    .catch(errors => this.handleValidationErrors(errors))
            },
            validatedForm(response){
                if(response.data){
                    $('#company-edit').submit();
                }
            },
            handleValidationErrors(errors){
                this.errors = errors.response.data.errors;
                this.validateLoad = false;
            }
        }
    }
</script>

<style scoped>

</style>