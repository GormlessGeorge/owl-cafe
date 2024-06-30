<template>
    <MainContainer>

        <div>
        <h1>Категории</h1>
        <h2>{{ menuItem.name }}</h2>


    </div>
    </MainContainer>
    
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
defineProps({
    menuItem: Object
})

</script>

<style scoped lang="scss">
h1 {
    font-size: 20px;
}
h2 {
    font-size: 30px;
}
</style>