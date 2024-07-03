<template lang="">
    <section class="contacts">
        <MainContainer>
            <TheHeader></TheHeader>
            <h2 class="contacts__title">Контакты</h2>
            <!-- тут нужен ключ :key="" -->
            
        </MainContainer>
        
    </section>
    <CartWidget></CartWidget>
    <TheFooter></TheFooter>
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
import TheFooter from '../../Components/TheFooter.vue';
import CartWidget from '@/Components/CartWidget.vue';

</script>

<style scoped lang="scss">
.contacts {
    min-height: 700px;

    &__title {
        margin-top: 50px;
        font-size: 36px;
        font-family: 'Gabriela';
        font-weight: 400;
        color: var(--text-color);
    }
}
</style>