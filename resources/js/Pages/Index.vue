<script setup>
import { Head, Link } from "@inertiajs/vue3";
import MainContainer from "../Layouts/MainContainer.vue";
import HeroScreen from "../Components/Index/HeroScreen.vue";
import AboutScreen from "../Components/Index/AboutScreen.vue";
import RecommendedScreen from "../Components/Index/RecommendedScreen.vue";
import EventsScreen from "../Components/Index/EventsScreen.vue";
import SpecialsScreen from "../Components/Index/SpecialsScreen.vue";
import MenuItemCard from "@/Components/MenuItemCard.vue";
import CartWidget from "../Components/CartWidget.vue";
import TheFooter from "../Components/TheFooter.vue";
import GalleryScreen from "../Components/Index/GalleryScreen.vue";
defineProps({
  recommendedMenuItems: Array,
});
</script>

<template>
  <Head title="Добро пожаловать в кафе Сова"></Head>
  <HeroScreen></HeroScreen>
  <AboutScreen></AboutScreen>
   <RecommendedScreen :recommended-menu-items="recommendedMenuItems"></RecommendedScreen>
    <EventsScreen></EventsScreen>
    <SpecialsScreen></SpecialsScreen>
    <GalleryScreen></GalleryScreen>
    <CartWidget></CartWidget>  

  <TheFooter></TheFooter>
</template>

<style lang="scss">
</style>