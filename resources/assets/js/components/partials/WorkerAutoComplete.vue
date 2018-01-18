<template>
    <div>
        <div class="input-field col s12">
            <input name="user" v-model="autoValue" type="text" id="autocomplete-input"
                   @loading="isLoading()" :disabled="loading" class="autocomplete">
            <label for="autocomplete-input">Kies bedrijf</label>
            <slot name="error"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "worker-auto-complete",
        data(){
            return{
                autoValue:"",
                loading:false,
                users:{}
            }
        },
        methods:{
            isLoading(){
                this.loading = !this.loading;
            },
            setUpAutoComplete() {
                let $this = this;
                $('input.autocomplete').autocomplete({
                    source: function(request,response){
                        axios.post('/api/admin/users', {
                            value: $this.autoValue
                        }).then(res => response(res.data)).catch(function (error) {
                            console.log(error)
                        })},
                    select:function(val,b){
                        $this.autoValue = b.item.value;
                    },
                    limit: 5,
                    minLength: 1,
                });

            }
        }
    }
</script>

<style scoped>

</style>