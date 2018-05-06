import './bootstrap';
import Assignment from './components/front/assignments/assignment.vue';
import AssignmentsHome from './components/front/assignments/dashboard.vue';
import AssignmentForm from './components/front/assignments/form.vue';

import CompanyForm from './components/front/companies/form.vue';
import CompaniesDashboard from './components/front/companies/companies.vue';

import ProfileForm from './components/front/profile/form.vue';
import ProfilePicture from './components/front/profile/profilePicture.vue';
import ProfileDashboard from './components/front/profile/dashboard.vue';

import router from './components/front/routes.js'


const app = new Vue({
    el: '#app',
    components:{
        'assignment': Assignment,
        'assignments-dashboard': AssignmentsHome,
        'assignments-form': AssignmentForm,

        'company-dashboard': CompaniesDashboard,
        'company-form': CompanyForm,

        'profile-form': ProfileForm,
        'profile-picture': ProfilePicture,
        'profile-dashboard': ProfileDashboard
    },
    router:router,
    methods:{
        // Method to remove sidebar
        removeSideBar() {
            $("#sidenav-overlay").trigger("click")
        }
    }
});
