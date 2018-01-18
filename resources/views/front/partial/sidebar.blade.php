<aside>
    <div class="side-navbar-kyc col s2 show-on-large z-depth-3">

        <profile-picture
            profile-pic="{{ asset("img/{$user->profile->profile_picture}") }}"
        ></profile-picture>


        <div class="sidebar-links" style="width: 100%">
            <div class="collection" style="width: 100%">
                <router-link to="/dashboard" class="collection-item">Persoonlijke gegevens</router-link>
                {{--<router-link to="/password" class="collection-item disabled">Wachtwoord veranderen</router-link>--}}
            </div>
        </div>
    </div>
</aside>