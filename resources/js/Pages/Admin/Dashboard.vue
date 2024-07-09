<template>
    <MainContainer>

        <div>
        <h1>Панель администратора</h1>
        <Link href="admin/categories"> Категории</Link>
        <Link href="admin/menu-items"> Позиции меню</Link>

        <div v-for="order in orders" :key="order.id">
            <p>{{ order.name }}</p>
        </div>
    </div>
    </MainContainer>
    
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
import {Link} from '@inertiajs/vue3';
defineProps({
    orders: Array
})

</script>