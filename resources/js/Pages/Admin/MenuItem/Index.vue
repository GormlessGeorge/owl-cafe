<template>
    <MainContainer>
        <Link class="button" href="menu-items/create">Создать позицию меню</Link>
        <h1>Меню</h1>

        <div class="menu-items__flex">
        <div v-for="menuItem in menuItems" :key="menuItem.id">
            <MenuItemCard  :imageUrl="'/storage/' + menuItem.image_path"
            :menuItem="menuItem" />
            {{ menuItem.category.name }}
            {{ menuItem.is_favourite }}
            <div>
                <Link class="button" :href="`menu-items/${menuItem.id}/edit`" as="button">Edit</Link>
            </div>
            <div>
                <Link class="button" :href="`menu-items/${menuItem.id}`" as="button" method="DELETE">Delete</Link>
            </div>
        </div>
    </div>
    </MainContainer>
    
</template>

<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';
import {Link} from '@inertiajs/vue3';
import MenuItemCard from '@/Components/MenuItemCard.vue';
defineProps({
    menuItems: Array
})

</script>

<style scoped lang="scss">
.menu-items__flex {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
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