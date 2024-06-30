<template>
    <MainContainer>

        <div>
        <h1>Панель администратора</h1>
        <Link href="admin/categories"> Категории</Link>
        <Link href="admin/menu-items"> Позиции меню</Link>
    </div>
    </MainContainer>
    
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
import {Link} from '@inertiajs/vue3';
defineProps({
    categories: Array
})

</script>