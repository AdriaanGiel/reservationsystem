<template>
    <div>
        <div class="collection">
            <company v-for="company in companies"></company>
        </div>
    </div>
</template>

<script>
    export default {
        name: "companies",
        data(){
            return{
                companies:[]
            }
        },
        methods:{

        },
        mounted(){

        },
        created(){

        }
    }
</script>

<style scoped>

</style>