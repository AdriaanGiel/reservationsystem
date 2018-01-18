<template>
    <div class="sidebar-content flex flex-center flex-column">
        <a @click="clickStorage" >
            <img :src="profilePic" alt="" class="circle responsive-img">
        </a>
        <input @change="changePic" style="display: none" ref="storageBtn" type="file">
    </div>
</template>

<script>
    export default {
        name: "profile-picture",
        props:['profilePic'],
        methods:{
            clickStorage(){
                let btn = this.$refs.storageBtn;
                btn.click();
            },
            changePic(){
                axios.post('/user/profile/picture')
                    .then()
                    .catch();
            }
        }
    }
</script>

<style scoped>

</style>