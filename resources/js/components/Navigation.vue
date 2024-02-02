<template lang="">
    <a-menu
        v-model:openKeys="state.openKeys"
        v-model:selectedKeys="state.selectedKeys"
        mode="inline"
    >
        <a-menu-item
            v-for="item in items"
            :key="item.key"
            :icon="item.icon"
            @click="$router.push({ name: item.route })"
        >
            {{ item.label }}
        </a-menu-item>
    </a-menu>
</template>
<script setup>
import { reactive, watch, h } from "vue";
import {
    PieChartOutlined,
    MailOutlined,
    DesktopOutlined,
    InboxOutlined,
    AppstoreOutlined,
} from "@ant-design/icons-vue";
import { useRouter } from "vue-router";

const router = useRouter();
const state = reactive({
    selectedKeys: ["1"],
    openKeys: ["sub1"],
    preOpenKeys: ["sub1"],
});
const items = reactive([
    {
        key: "1",
        icon: () => h(PieChartOutlined),
        label: "User",
        route: "admin.users",
    },
    {
        key: "2",
        icon: () => h(DesktopOutlined),
        label: "Roles",
        route: "admin.roles",
    },
    {
        key: "3",
        icon: () => h(InboxOutlined),
        label: "Settings",
        route: "admin.settings",
    },
]);
watch(
    () => state.openKeys,
    (_val, oldVal) => {
        state.preOpenKeys = oldVal;
    }
);
</script>
<style lang=""></style>
