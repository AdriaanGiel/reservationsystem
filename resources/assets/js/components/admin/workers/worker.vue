<template>
    <div>
        <a href="">
            <div class="col m12">

                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s10">
              <span class="black-text">
                This is a square image. Add the "circle" class to it to make it appear circular.
              </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "worker",
        props:['workerObject'],
        data(){
            return {
                worker: this.worker
            }
        }
    }
</script>

<style scoped>

</style>