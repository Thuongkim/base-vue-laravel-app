import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/login",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/login.vue"),
        name: "login",
        meta: {
            layout: "auth",
        },
    },
    {
        path: "/register",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/register.vue"),
        name: "register",
        meta: {
            layout: "auth",
        },
    },
    {
        path: "/home",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/home.vue"),
        name: "home",
        meta: {
            layout: "default",
        },
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
