<template>

    <div>
        <div v-show="!newCompany" class="input-field col s12">
            <input name="company" v-model="autoValue" type="text" id="autocomplete-input"
                   @loading="isLoading()" :disabled="loading" autocomplete="false" class="autocomplete">
            <label for="autocomplete-input">Kies bedrijf</label>
            <slot name="error"></slot>
        </div>

        <div v-if="!option" class="col s12">
            <p>
                <input v-model="newCompany" @click="activateNewCompany" type="checkbox"
                       class="filled-in" id="filled-in-box"/>
                <label for="filled-in-box">Nieuw bedrijf invoeren</label>
            </p>
        </div>
    </div>

</template>

<script>
    export default {
        name: "company-auto-complete",
        props: {
            option: {default: false}
        },
        data() {
            return {
                newCompany: false,
                autoValue: "",
                companies: {},
                loading: false
            }
        },
        mounted() {
            let $this = this;
            if (!this.newCompany) {
                $(function () {
                    $this.getCompanies();
                });
            }
        },
        methods: {
            activateNewCompany() {
                this.autoValue = "";
                this.$emit('activateNewCompany', this.newCompany)
            },
            setUpAutoComplete(data) {
                this.$emit('loaded');
                let $this = this;
                $('input.autocomplete').autocomplete({
                    data: data,
                    onAutocomplete: function (val) {
                        console.log(val);
                        $this.autoValue = val;
                    },
                    limit: 5,
                    minLength: 1,
                });

            },
            getCompanies() {
                axios.post('/api/companies', {
                    value: this.autoValue
                }).then(res => this.setUpAutoComplete(res.data)).catch(function (error) {
                    // response(['Sorry niks gevonden']);
                });
            }
        }
    }
</script>

<style scoped>

</style>

