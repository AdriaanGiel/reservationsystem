import './bootstrap';
import Assignment from './components/admin/assignments/assignment.vue';
import AssignmentsHome from './components/admin/assignments/assignments.vue';
import AssignmentsForm from './components/admin/assignments/form.vue';

const app = new Vue({
    el: '#app',
    components:{
        'assignment': Assignment,
        'assignments-dashboard': AssignmentsHome,
        'assignments-form': AssignmentsForm
    }
});
