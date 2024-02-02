import { createRouter, createWebHistory } from "vue-router";
import store from "../store";
import admin from "./admin";

const routes = [
    {
        path: "/login",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/login.vue"),
        name: "login",
        meta: {
            layout: "auth",
            middleware: "guest",
        },
    },
    {
        path: "/register",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/register.vue"),
        name: "register",
        meta: {
            layout: "auth",
            middleware: "guest",
        },
    },
    {
        path: "/",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/home.vue"),
        name: "home",
        meta: {
            layout: "default",
        },
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/pages/not_found.vue"),
    },
];
routes.push(...admin);
const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => {
    if (to.meta.middleware === "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "home" });
        }
        next();
    } else {
        if (!store.state.auth.authenticated) {
            next({ name: "login" });
        }
        next();
    }
});
export default router;
