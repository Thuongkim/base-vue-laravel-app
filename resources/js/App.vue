<template>
  <component :is="layout"><router-view></router-view></component>
</template>
<script>
import { computed } from "vue";
import { useRoute } from "vue-router";
import { DEFAULT_LAYOUT } from "@/constants";
export default {
  setup() {
    const route = useRoute();
    return {
      layout: computed(() => (route.meta.layout || DEFAULT_LAYOUT) + "-layout"),
    };
  },
};
</script>