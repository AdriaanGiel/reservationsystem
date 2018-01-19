<template>
    <div class="col l8 m10 s12 offset-l3 offset-m1">
        <div class="card">
            <form v-if="user" action="/user/profile" method="post">
                <div class="card-content">
                    <span class="card-title">Persoonlijke gegevens</span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.email" name="email" id="email" type="email"
                                   class="">
                            <label :class="classActive" for="email">Email</label>
                        </div>

                        <div class="input-field col s12">
                            <input v-model="user.profile.firstname"  name="firstname"
                                   id="firstname" type="text" class="">
                            <label :class="classActive" for="firstname">Voornaam</label>
                        </div>

                        <div class="input-field col s12">
                            <input v-model="user.profile.lastname"name="lastname"
                                   id="lastname" type="text" class="">
                            <label :class="classActive" for="lastname">Achternaam</label>
                        </div>

                        <div class="input-field col s12">
                            <input v-model="user.profile.phonenumber"
                                   name="phonenumber" id="phonenumber" type="tel"
                                   class="">
                            <label for="phonenumber" :class="classActive">Telefoonnummer</label>
                        </div>

                        <div class="input-field col s12">
                            <input disabled v-model="user.profile.hours" name="hours" id="hours" type="number" class="">
                            <label for="hours">Uren</label>
                        </div>

                    </div>


                </div>
                <div class="card-action">
                    <button @click.prevent="submitForm" class="waves-effect waves-light btn">Verzenden</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "dashboard",
        data() {
            return {
                user: {
                    profile: {}
                },
                classActive: 'active',
                token: ''
            }
        },
        mounted() {
            let $this = this;
            axios.post('/api/userdata', {
                data: "getUserData"
            }).then(response => this.user = response.data).catch(function (err) {

            });

            setTimeout(function () {
                $this.fillClassesWithActive();
            }, 100)
        },
        methods: {
            fillClassesWithActive() {
                let $labels = document.getElementsByTagName('LABEL');

                for (let i = 0; i < $labels.length; i++) {
                    $labels[i].className = 'active';
                }
            },
            submitForm() {
                axios.post('/user/profile', {
                    _method: 'PATCH',
                    firstname: this.user.profile.firstname,
                    lastname: this.user.profile.lastname,
                    email: this.user.email,
                    phonenumber: this.user.profile.phonenumber
                }).then(function (response) {
                    if(response.data == 1){
                        swal('Success','Informatie is gewijzigd', 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>