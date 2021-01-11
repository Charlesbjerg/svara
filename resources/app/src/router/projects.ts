export default [
    {
        path: '/projects',
        name: 'All Projects',
        component: () => import('../views/projects/index.vue')
    },
    {
        path: '/projects/:id',
        name: 'View Project',
        component: () => import('../views/projects/single.vue')
    },
    {
        path: '/projects/create',
        name: 'Create Project',
        component: () => import('../views/projects/create.vue')
    },
    {
        path: '/projects/edit/:id',
        name: 'Edit Project',
        component: () => import('../views/projects/edit.vue')
    }
]