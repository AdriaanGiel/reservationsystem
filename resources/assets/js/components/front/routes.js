// import VueRouter from 'vue-router';

let routes = [
    {
        path: '/password',
        component: require('./profile/passwordForm')
    },
    {
        path: '/dashboard',
        component: require('./profile/dashboard')
    },
    {
        path: '/approved',
        component: require('./assignments/approved_assignments')
    },
    {
        path: '/rejected',
        component: require('./assignments/rejected_assignments')
    },
    {
        path: '/pending',
        component: require('./assignments/pending_assignments')
    }
];

export default new VueRouter({
    routes
});