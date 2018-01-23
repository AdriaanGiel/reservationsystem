<template>
    <div>
        <div class="input-field col s12">
            <input  name="user" v-model="autoValue" type="text" id="autocomplete-input"
                   @loading="isLoading()" :disabled="loading" autocomplete="false" class=" workers">
            <label for="autocomplete-input">Kies medewerker</label>
            <slot name="error"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "worker-auto-complete",
        props:{
            option:{default:false}
        },
        data(){
            return{
                autoValue:"",
                loading:false,
                users:{}
            }
        },
        mounted(){
            let $this = this;
            $(function(){
                $this.getWorkers();
            });
        },
        methods:{
            isLoading(){
                this.loading = !this.loading;
            },
            setUpAutoComplete(data) {
                this.$emit('loaded');
                console.log(data);
                let $this = this;
                $('input.workers').autocomplete({
                    data: data,
                    onAutocomplete: function (val) {
                        console.log(val);
                        $this.autoValue = val;
                    },
                    limit: 5,
                    minLength: 1,
                });
            },
            getWorkers(){
                axios.post('/api/admin/users',{
                    value: this.autoValue
                }).then(res => this.setUpAutoComplete(res.data)).catch(function (error) {
                    console.log(error);
                })
            }
        }
    }
</script>

<style scoped>

</style>