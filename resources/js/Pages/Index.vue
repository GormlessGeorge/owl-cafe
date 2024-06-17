<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainContainer from '../Layouts/MainContainer.vue';
import HeroScreen from '../Components/Index/HeroScreen.vue';
import AboutScreen from '../Components/Index/AboutScreen.vue';
import RecommendedScreen from '../Components/Index/RecommendedScreen.vue';
import EventsScreen from '../Components/Index/EventsScreen.vue';


// defineOptions({ layout: MainContainer })

</script>

<template>

    <Head title="Добро пожаловать в кафе Сова"></Head>
    <HeroScreen></HeroScreen>
    <AboutScreen></AboutScreen>
    <RecommendedScreen></RecommendedScreen>
    <EventsScreen></EventsScreen>
</template>

<style lang="scss">

</style>