<template lang="">
    <section class="about-us">
        <MainContainer>
            <TheHeader></TheHeader>
            <h2 class="about-us__title">О нас</h2>
            <!-- тут нужен ключ :key="" -->
            
        </MainContainer>
        
    </section>
    <CartWidget></CartWidget>
</template>

<script setup>
import MainContainer from '../../Layouts/MainContainer.vue';
import CartWidget from "../../Components/CartWidget.vue"
</script>

<style scoped lang="scss">
.about-us {
    

    &__title {
        margin-top: 80px;
        font-size: 48px;
        font-family: 'Gabriela';
        font-weight: 400;
        color: var(--text-color);
    }
}
</style>