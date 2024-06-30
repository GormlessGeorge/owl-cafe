<template>
  <section class="menu">
    <MainContainer>
      <TheHeader></TheHeader>
      <h2 class="menu__title">Меню кафе и доставки</h2>
      <!-- <p v-if="flash"> {{ flash }}</p> -->

      <div class="card__wrapper">
        <MenuItemCard
          v-for="menuItem in menuItems"
          :imageUrl="'storage/' + menuItem.image_path"
          :key="menuItem.id"
          :menuItem="menuItem"
        />
      </div>
    </MainContainer>
  </section>

  <CartWidget></CartWidget>
  <TheFooter></TheFooter>
  <img
    class="menu__soup menu__soup-left"
    src="/img/soup1.png"
    alt="soup image"
  />
  <img
    class="menu__soup menu__soup-right"
    src="/img/soup2.png"
    alt="soup image"
  />
</template>




<script setup>
import CartWidget from "../../Components/CartWidget.vue";
import MenuItemCard from "@/Components/MenuItemCard.vue";
import MainContainer from "@/Layouts/MainContainer.vue";
import TheFooter from '../../Components/TheFooter.vue';
import { ref } from "vue";
import { router, Link, useRemember } from "@inertiajs/vue3";
import { computed } from "vue";

import { usePage } from "@inertiajs/vue3";
import MenuItemCardVue from "../../Components/MenuItemCard.vue";

const page = usePage();

const flash = computed(() => page.props.flash.success);
defineProps({
  menuItems: Array, // Здесь вы можете определить свои props
});
</script>




<style scoped lang="scss">
.menu {
  padding-bottom: 250px;
  &__title {
    margin-top: 50px;
    font-size: 36px;
    font-family: "Gabriela";
    font-weight: 400;
    color: var(--text-color);
  }

  &__soup {
    display: block;
    position: absolute;
    z-index: -10;

    &-left {
      top: 30%;
      left: 0;
    }
    &-right {
      top: 30%;
      right: 0;
    }
  }
}

.card__wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: space-between;
}

.menu-item {
  margin-top: 50px;
  width: 250px;
  height: 250px;
  border-radius: 10px;
  background-color: lightgray;
}

button {
  display: block;
  margin: 0 auto;
  margin-top: 20px;
  background-color: var(--primary-color);
  height: 54px;
  color: white;
  width: 150px;
}
</style>