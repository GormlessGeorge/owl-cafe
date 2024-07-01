<template>
    <MainContainer>
        <Link class="button" href="categories/create">Создать категорию</Link>
        <div>
        <h1>Категории</h1>
        <div class="category__flex" v-for="category in categories" :key="category.id">
            <div>
                <Link :href="route('categories.show', category.id)">{{ category.name }}</Link>
            </div>
            <div>
                <Link class="button" :href="`categories/${category.id}/edit`" as="button">Edit</Link>
            </div>
            <div>
                <Link class="button" :href="`categories/${category.id}`" as="button" method="DELETE">Delete</Link>
            </div>
        </div>
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

<style scoped lang="scss">
.category__flex {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}

h1 {
    font-size: 36px;
}

.button {
    width: 100px;
    height: 100px;
    background-color: lightcoral;
}
</style>