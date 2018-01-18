<template>
    <div class="col l8 m10 s12 offset-l3 offset-m1">
        <form :action="editUrl" method="post">
            <div class="card">

                <div class="card-content">
                    <span class="card-title">Wachtwoord veranderen</span>

                    <div class="row">
                        <div class="input-field col s12">
                            <input value="" name="new_password" id="password" type="password" class="">
                            <label for="password">Nieuw wachtwoord</label>
                        </div>

                        <div class="input-field col s12">
                            <input value="" name="password_repeat" id="password_repeat" type="password" class="">
                            <label for="password_repeat">Nieuw wachtwoord herhalen</label>
                        </div>
                    </div>

                </div>


                <div class="card-action">
                    <button type="submit" class="waves-effect waves-light btn">Verzenden</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "password-form",
        props: ['editUrl', 'csrfToken']
    }
</script>

<style scoped>

</style>