import './bootstrap';
import Assignment from './components/assignments/assignment.vue';
import AssignmentsHome from './components/assignments/dashboard.vue';
import AssignmentsForm from './components/assignments/form.vue';

const app = new Vue({
    el: '#app',
    components:{
        'assignment': Assignment,
        'assignments-dashboard': AssignmentsHome,
        'assignments-form': AssignmentsForm
    }
});
