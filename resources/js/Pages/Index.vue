<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainContainer from '../Layouts/MainContainer.vue'
import HeroScreen from '../Components/Index/HeroScreen.vue'

defineProps({
    message: {
        type: String
    }
});

// defineOptions({ layout: MainContainer })

</script>

<template>

    <Head title="Добро пожаловать в кафе Сова"></Head>
    <HeroScreen></HeroScreen>
</template>

<style lang="scss">

</style>