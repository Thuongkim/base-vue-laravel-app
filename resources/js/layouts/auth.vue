<template lang="">
    <NavigationBrand></NavigationBrand>
    <slot></slot>
</template>
<script>
import NavigationBrand from "../components/NavigationBrand.vue";
export default {
    components: { NavigationBrand },
};
</script>
<style lang=""></style>
