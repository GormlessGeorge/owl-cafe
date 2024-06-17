<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainContainer from '../Layouts/MainContainer.vue';
import HeroScreen from '../Components/Index/HeroScreen.vue';
import AboutScreen from '../Components/Index/AboutScreen.vue';
import RecomendedScreen from '../Components/Index/RecomendedScreen.vue';
({
    message: {
        type: String
    }
});

// defineOptions({ layout: MainContainer })

</script>

<template>

    <Head title="Добро пожаловать в кафе Сова"></Head>
    <HeroScreen></HeroScreen>
    <AboutScreen></AboutScreen>
    <RecomendedScreen></RecomendedScreen>
</template>

<style lang="scss">

</style>