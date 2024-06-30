<template lang="">
    <section>
        <MainContainer>
            <TheHeader></TheHeader>
            <h2 class="contacts__title">Контакты</h2>
            <!-- тут нужен ключ :key="" -->
            
        </MainContainer>
        
    </section>
    <CartWidget></CartWidget>
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
</script>

<style scoped lang="scss">
.contacts {


    &__title {
        margin-top: 80px;
        font-size: 48px;
        font-family: 'Gabriela';
        font-weight: 400;
        color: var(--text-color);
    }
}
</style>