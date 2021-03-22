export default [
    {
        path: '/projects',
        name: 'projects',
        component: () => import('../views/projects/index.vue')
    },
    {
        path: '/projects/:id',
        name: 'projects.single',
        component: () => import('../views/projects/single.vue')
    },
    {
        path: '/projects/create',
        name: 'projects.create',
        component: () => import('../views/projects/create.vue')
    },
    {
        path: '/projects/edit/:id',
        name: 'projects.edit',
        component: () => import('../views/projects/edit.vue')
    },
    {
        path: '/projects/entity/:id',
        name: 'projects.entity',
        component: () => import('../views/projects/entity.vue')
    }
]
