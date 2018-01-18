<template>
    <div>
        <p v-for="error in errors" style="font-size: 12px" class="red-text text-darken-1">{{ error }}</p>
    </div>
</template>

<script>
    export default {
        name: "error-message",
        props:{
            errors:{
                required:true
            }
        }
    }
</script>

<style scoped>

</style>