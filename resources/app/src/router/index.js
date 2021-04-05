import { createRouter, createWebHistory } from "vue-router";
import store from '@/store/index';
import Home from "../views/Home.vue";

// Import separate route files
import ProjectRoutes from './projects';
import TeamsRoutes from './teams';
import ClientsRoutes from './clients';
import CompanyRoutes from './company';

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: () => import("../views/Dashboard.vue")
  },
  {
    path: "/login",
    name: "Login",
    component: () => import("../views/Login.vue")
  },
  {
    path: "/register",
    name: "Register",
    component: () => import("../views/Register.vue")
  },
  ...ProjectRoutes,
  ...ClientsRoutes,
  ...TeamsRoutes,
  ...CompanyRoutes,
];

const router = createRouter({
  history: createWebHistory('/'),
  routes
});

// Check auth on route change
router.beforeRouteUpdate = (to, from, next) => {
  !store.getters['auth/isUserAuthenticated'] && to.name !== 'Login' ? next({ name: 'Login' }) : next();
};

export default router;
