<template lang="">
    <div class="flex flex-col pt-24">
        <div class="w-20 h-20 mx-auto text-center">
            <img
                :src="getImageUrl('../assets/images/logo.png')"
                alt="brand image"
                class="w-full h-auto object-cover"
            />
        </div>
        <div class="mx-auto text-center mt-12">
            <span class="font-bold text-xl">Best way to save your money</span>
        </div>
    </div>
</template>
<script setup>
const getImageUrl = (path) => {
    return new URL(path, import.meta.url).href;
};
</script>
<style lang=""></style>
