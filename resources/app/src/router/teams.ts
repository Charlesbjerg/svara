export default [
    {
        path: '/teams',
        name: 'All Teams',
        component: () => import('../views/teams/index.vue')
    },
    {
        path: '/teams/:id',
        name: 'View Team',
        component: () => import('../views/teams/single.vue')
    },
    {
        path: '/teams/create',
        name: 'Create Team',
        component: () => import('../views/teams/create.vue')
    },
    {
        path: '/teams/edit/:id',
        name: 'Edit Team',
        component: () => import('../views/teams/edit.vue')
    }
]