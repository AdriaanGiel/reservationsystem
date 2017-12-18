import VueRouter from 'vue-router';

let routes = [
    {
        path:'/',
        component: require('./views/home')
    },
    {
        path:'/appointments',
        component: require('./views/appointments/appointments')
    },
    {
        path:'/appointments/add',
        component: require('./views/appointments/add')
    }
];

export default new VueRouter({
    routes
});