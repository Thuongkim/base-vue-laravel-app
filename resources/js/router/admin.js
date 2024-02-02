const admin = [
    {
        path: "/admin",
        children: [
            {
                path: "users",
                component: () =>
                    import(
                        /* webpackChunkName: "admin" */ "@/pages/admin/users/index.vue"
                    ),
                name: "admin.users",
            },
            {
                path: "roles",
                component: () =>
                    import(
                        /* webpackChunkName: "admin" */ "@/pages/admin/roles/index.vue"
                    ),
                name: "admin.roles",
            },
            {
                path: "settings",
                component: () =>
                    import(
                        /* webpackChunkName: "admin" */ "@/pages/admin/settings/index.vue"
                    ),
                name: "admin.settings",
            },
        ],
    },
];
export default admin;
