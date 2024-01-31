import "./bootstrap";
import "../css/app.css";
import "../css/global.css";
import Router from "@/router";
import store from "./store";
import { registerGlobalComponents } from "@/utils/import";
import { createApp } from "vue";
import App from "./App.vue";

const app = createApp(App);
registerGlobalComponents(app);
app.use(Router);
app.use(store);
app.mount("#app");
