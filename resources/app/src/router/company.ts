export default [
    {
        path: '/company',
        name: 'Company',
        component: () => import('../views/company/index.vue')
    },
    {
        path: '/projects/edit',
        name: 'Edit Company',
        component: () => import('../views/company/edit.vue')
    }
]