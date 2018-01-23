<template>
    <div class="loader flex flex-center">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
    </div>
</template>

<script>
    export default {
        name: "loader"
    }
</script>

<style scoped>
    .loader{
        position: absolute;
        height: 100%;
        width: 100%;
        opacity: .8;
        background-color: white;
        z-index: 1001;
    }
</style>