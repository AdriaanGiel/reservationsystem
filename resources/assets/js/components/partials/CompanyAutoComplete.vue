<template>

    <div>
        <div v-show="!newCompany" class="input-field col s12">
            <input name="company" v-model="autoValue" type="text" id="autocomplete-input"
               @loading="isLoading()" :disabled="loading" class="autocomplete">
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
                companies:{},
                loading:false
            }
        },
        mounted() {
            if (!this.newCompany) {
                this.setUpAutoComplete();
            }
        },
        methods: {
            isLoading(){
              this.loading = !this.loading;
            },
            activateNewCompany() {
                this.autoValue = "";
                this.$emit('activateNewCompany', this.newCompany)
            },
            setUpAutoComplete() {
                    let $this = this;
                    $('input.autocomplete').autocomplete({
                        source: function(request,response){
                            axios.post('/api/companies', {
                            value: $this.autoValue
                        }).then(res => response(res.data)).catch(function (error) {
                            console.log(error)
                        })},
                        select:function(val,b){
                            console.log(b);
                            $this.autoValue = b.item.value;
                        },
                        limit: 5,
                        minLength: 1,
                    });

            },
            getCompanies(){
                axios.post('/api/companies', {
                    value: this.autoValue
                }).then(res => this.companies = res.data).catch(function (error) {
                    console.log(error)
                });
            }
        }
    }
</script>

<style scoped>

</style>

