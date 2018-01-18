<template>
    <div>
        <input type="hidden" :value="token" name="_token">
        <input type="hidden" :value="method" name="_method">
    </div>
</template>

<script>
    export default {
        name: "form-required",
        props:{
            token:{required:true},
            method:{required:true},
        }
    }
</script>

<style scoped>

</style>