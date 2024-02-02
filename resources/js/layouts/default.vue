<template lang="html">
    <Header></Header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 d-none d-sm-flex mt-3">
                <a-list bordered style="width: 100%">
                    <Navigation></Navigation>
                    <template #header>
                        <div>Menu</div>
                    </template>
                </a-list>
            </div>
            <div class="col-12 col-sm-9">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
import Header from "../components/Header.vue";
import Navigation from "../components/Navigation.vue";
export default {
    components: { Header, Navigation },
};
</script>
<style lang=""></style>
