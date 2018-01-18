import './bootstrap';
import Assignment from './components/admin/assignments/assignment.vue';
import AssignmentsHome from './components/admin/assignments/assignments.vue';
import AssignmentsForm from './components/admin/assignments/form.vue';

import WorkersHome from './components/admin/workers/workers.vue';
import WorkerForm from './components/admin/workers/form.vue';

import CompanyHome from './components/admin/companies/companies.vue';
import CompanyForm from './components/admin/companies/form.vue';

const app = new Vue({
    el: '#app',
    components:{
        'assignment-detail': Assignment,
        'assignments-dashboard': AssignmentsHome,
        'assignments-form': AssignmentsForm,

        'workers-dashboard': WorkersHome,
        'worker-form': WorkerForm,

        'companies-dashboard': CompanyHome,
        'company-form': CompanyForm
    }
});
