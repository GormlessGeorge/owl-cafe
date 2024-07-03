<template lang="">
    <section class="about-us">
        <MainContainer>
            <TheHeader></TheHeader>
            <h2 class="about-us__title">О нас</h2>
            <!-- тут нужен ключ :key="" -->
            
        </MainContainer>
        
    </section>
    <CartWidget></CartWidget>
    <TheFooter></TheFooter>
</template>

<script setup>
import MainContainer from '../../Layouts/MainContainer.vue';
import CartWidget from "../../Components/CartWidget.vue";
import TheFooter from '../../Components/TheFooter.vue';
</script>

<style scoped lang="scss">
.about-us {
    min-height: 1110px;

    &__title {
        margin-top: 50px;
        font-size: 36px;
        font-family: 'Gabriela';
        font-weight: 400;
        color: var(--text-color);
    }
}
</style>