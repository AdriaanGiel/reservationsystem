<template>
    <div class="input-field col s12">
        <select :name="name">
            <option value="" disabled selected>{{ defaultText }}</option>
            <option :selected="item[value] == compareSelected"   v-for="item in items"
                    :value="item[value]">{{ item[option] }}
            </option>

        </select>
        <label>{{ label }}</label>

        <slot name="error"></slot>
    </div>
</template>

<script>
    export default {
        name: "material-select",
        props:{
            items:{
                required:true
            },
            name:{
                required:true
            },
            defaultText:{
                default:"Kies optie"
            },
            value:{
                default:"id"
            },
            option:{
                default:"name"
            },
            compareSelected:{
                default:0
            },
            label:{
                default:"Kies een optie"
            }
        },
        mounted(){
            this.setUpSelect();
        },
        methods:{
            setUpSelect() {
                $('select').material_select();
            },
        }
    }
</script>

<style scoped>

</style>