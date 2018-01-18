<template>
    <div class="col s12 fadeInDownBig">
        <div class="card">
            <div class="card-content">
                    <span class="card-title">
                        Nieuw bedrijf toevoegen
                    </span>

                <div class="row">

                    <slot name="status-form"></slot>

                    <div class="input-field col s12">
                        <input v-model="company.name" placeholder="Naam bedrijf" name="name" id="company_form"
                               type="text">
                        <label for="company_form">Bedrijf*</label>
                        <error-message :errors="errors.name"></error-message>
                        <slot name="error-name"></slot>
                    </div>

                    <div class="input-field col s12">
                        <input v-model="company.street" placeholder="straat" name="street" id="street_form" type="text">
                        <label for="street_form">Straat*</label>
                        <error-message :errors="errors.street"></error-message>
                        <slot name="error-street"></slot>
                    </div>


                    <div class="input-field col s12 m8 l8">
                        <input v-model="company.number" placeholder="nummer" name="number" id="number"
                               type="text">
                        <label for="number">Nummer*</label>
                        <error-message :errors="errors.number"></error-message>
                        <slot name="error-number"></slot>
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <input v-model="company.insertion" placeholder="toevoeging" name="insertion" id="insertion"
                               type="text">
                        <label for="insertion">Toevoeging</label>
                        <error-message :errors="errors.insertion"></error-message>
                        <slot name="error-insertion"></slot>
                    </div>


                    <div class="input-field col s12">
                        <input v-model="company.zipcode" placeholder="postcode" name="zipcode" id="zip_form" type="text">
                        <label for="zip_form">Postcode*</label>
                        <error-message :errors="errors.zipcode"></error-message>
                        <slot name="error-zipcode"></slot>
                    </div>

                    <div class="input-field col s12">
                        <input v-model="company.city" placeholder="plaats" name="city" id="city" type="text">
                        <label for="city">Plaats*</label>
                        <error-message :errors="errors.city"></error-message>
                        <slot name="error-city"></slot>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="textarea1" name="description" class="materialize-textarea" data-length="500">{{ company.description }}</textarea>
                        <label for="textarea1">Bedrijf beschrijving</label>
                        <error-message :errors="errors.description"></error-message>
                        <slot name="error-description"></slot>
                    </div>

                    <div v-if="worker" class="input-field col s12">
                        <textarea id="argumentation" name="argumentation" class="materialize-textarea"
                                  data-length="500"></textarea>
                        <label for="argumentation">Waarom dit bedrijf?</label>
                        <error-message :errors="errors.argumentation"></error-message>
                        <slot name="error-argumentation"></slot>
                    </div>


                </div>
                <slot name="submit"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import ErrorMessage from '../../partials/messages/errorMessage.vue';

    export default {
        name: "form",
        props: {
            companyObject: {},
            edit: {default: false},
            worker: {default: false},
            errorsObject: {}
        },
        components: {
            'error-message': ErrorMessage
        },
        data(){
            return{
                errors: this.errorsObject,
                company:this.companyObject
            }
        }
    }
</script>

<style scoped>

</style>