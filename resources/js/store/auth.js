import router from "../router";
export default {
    namespaced: true,
    state: {
        authenticated: false,
        user: {},
    },
    getter: {
        authenticated(state) {
            return state.authenticated;
        },
        user(state) {
            return state.user;
        },
    },
    mutations: {
        setAuthenticated(state, value) {
            state.authenticated = value;
        },
        setUser(state, value) {
            state.user = value;
        },
    },
    actions: {
        async login({ commit }) {
            try {
                let user = await axios.get("/api/user");
                commit("setUser", user.data);
                commit("setAuthenticated", true);
                router.push({ name: "home" });
            } catch (error) {
                commit("setUser", {});
                commit("setAuthenticated", false);
            }
        },
        logout({ commit }) {
            commit("setUser", {});
            commit("setAuthenticated", false);
        },
    },
};
