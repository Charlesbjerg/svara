export default [
    {
        path: "/clients",
        name: "All Clients",
        component: () => import("../views/clients/index.vue")
    },
    {
        path: '/clients/:id',
        name: 'View Project',
        component: () => import('../views/clients/single.vue')
    },
    {
        path: '/clients/create',
        name: 'Create Project',
        component: () => import('../views/clients/create.vue')
    },
    {
        path: '/clients/edit/:id',
        name: 'Edit Project',
        component: () => import('../views/clients/edit.vue')
    }
]