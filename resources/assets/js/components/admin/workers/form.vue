<template>
    <div class="row">
        <div class="col  s12 m10 offset-m1">
            <form :action="route" method="post">
                <form-required :method="method" :token="token"></form-required>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <h4>Medewerker {{ title }}</h4>
                    </div>

                    <div class="row">

                        <material-select :items="roles" :compare-selected="user.role_id" name="role_id">
                            <error-message slot="error" :errors="errors.role_id"></error-message>
                        </material-select>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.profile.firstname" type="text" id="firstname" name="firstname">
                            <label for="firstname">Voornaam</label>
                            <error-message :errors="errors.firstname"></error-message>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.profile.lastname" type="text" id="lastname" name="lastname">
                            <label for="lastname">Achternaam</label>
                            <error-message :errors="errors.lastname"></error-message>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.profile.hours" type="number" id="hours" name="hours">
                            <label for="Hours">Uren</label>
                            <error-message :errors="errors.hours"></error-message>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.profile.phonenumber" type="tel" id="phonenumber" name="phonenumber">
                            <label for="phonenumber">Telefoonnummer</label>
                            <error-message :errors="errors.phonenumber"></error-message>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <input v-model="user.email" type="email" id="email" name="email">
                            <label for="email">Email</label>
                            <error-message :errors="errors.email"></error-message>
                        </div>
                    </div>


                    <div v-show="edit">
                        <br>
                        <div class="h4">Wachtwoord veranderen</div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="password" class="validate" name="new_password">
                                <label for="password">Nieuw wachtwoord</label>
                                <error-message :errors="errors.password"></error-message>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" id="password2" class="validate" name="password2">
                                <label for="password2">Nieuw wachtwoord herhalen</label>
                                <error-message :errors="errors.password"></error-message>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-action flex flex-center">
                    <button class="btn waves-effect waves-light" type="submit" name="action">{{ title }}
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</template>

<script>
    import MaterialSelect from '../../partials/MaterialSelect.vue';
    import FormRequired from '../../partials/form-required.vue';
    import ErrorMessage from '../../partials/messages/errorMessage.vue';

    export default {
        name: "form",
        props:{
            title:'',
            userObject:{
                default(){
                    return{
                        email:null,
                        profile:{
                            firstname: null,
                            lastname: null,
                            hours: null,
                            phonenumber:null
                        }
                    }
                }
            },
            edit:{
                default:false
            },
            method:{
                default:'post'
            },
            token:{},
            route:{},
            roles:{}
        },
        components:{
            'material-select': MaterialSelect,
            'form-required': FormRequired,
            'error-message': ErrorMessage
        },
        data(){
            return {
                user: this.userObject,
                errors:{}
            }
        }

    }
</script>

<style scoped>

</style>