<template>
    <div>
        <div class="col m12">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="images/yuna.jpg" alt="" class="circle responsive-img">
                        <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <h3>
                            {{ name }}
                        </h3>
                      <span class="black-text">
                        {{ description }}
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "company",
        props: ['name','description']
    }
</script>

<style scoped>

</style>