<template lang="html">
    <div class="container-fluid">
        <div class="row align-items-center p-4 bg-success text-white">
            <div
                class="col-1 d-flex d-sm-none align-items-center justify-center"
            >
                <span @click="showDrawer">X</span>
            </div>
            <div
                class="col-10 col-sm-9 d-flex align-items-center justify-center justify-content-sm-start"
            >
                <img
                    src="../assets/images/logo.png"
                    alt=""
                    style="height: 32px !important"
                />
                <span class="d-none d-sm-flex mx-2">Admin</span>
            </div>
            <div class="col-sm-3 d-none d-sm-flex justify-content-sm-end">
                Username
            </div>
            <div
                class="col-1 d-flex d-sm-none align-items-center justify-center"
            >
                <span @click="showUserDrawer">X</span>
            </div>
        </div>
    </div>

    <a-drawer
        v-model:open="open"
        class="custom-class"
        root-class-name="root-class-name"
        :root-style="{ color: 'blue' }"
        title="Categories"
        placement="left"
        @after-open-change="afterOpenChange"
    >
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>

    <a-drawer
        v-model:open="openUser"
        class="custom-class"
        root-class-name="root-class-name"
        :root-style="{ color: 'blue' }"
        title="User"
        placement="right"
        @after-open-change="afterOpenChange"
    >
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>
<script setup>
    import { ref } from "vue";
    const open = ref(false);
    const openUser = ref(false);
    const afterOpenChange = (bool) => {
        console.log("open", bool);
    };
    const showDrawer = () => {
        open.value = true;
    };
    const showUserDrawer = () => {
        openUser.value = true;
    };
</script>
<style lang=""></style>
