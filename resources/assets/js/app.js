import './bootstrap';
import Appointments from './components/appointments/appointments.vue';
import AppointmentsHome from './components/appointments/dashboard.vue';
import AppointmentsForm from './components/appointments/form.vue';

const app = new Vue({
    el: '#app',
    components:{
        'appointments': Appointments,
        'appointments-dashboard': AppointmentsHome,
        'appointments-form': AppointmentsForm
    }
});
