<template>
  <section class="menu">
    <MainContainer>
      <TheHeader></TheHeader>
      <h2 class="menu__title">Меню кафе и доставки</h2>
      <!-- <p v-if="flash"> {{ flash }}</p> -->

      <div class="tabs">
		<div class="tabs-header">
			<button class="tabs-btn" @click="activeTab = 1" :class="{ active: activeTab === 1 }">Вкладка 1</button>
			<button class="tabs-btn" @click="activeTab = 2" :class="{ active: activeTab === 2 }">Вкладка 2</button>
			<button class="tabs-btn" @click="activeTab = 3" :class="{ active: activeTab === 3 }">Вкладка 3</button>
		</div>
		<div class="tabs-body">
			<div class="tabs-body-item" v-show="activeTab === 1">
				Содержимое вкладки 1
			</div>
			<div class="tabs-body-item" v-show="activeTab === 2">
				Содержимое вкладки 2
			</div>
			<div class="tabs-body-item" v-show="activeTab === 3">
				Содержимое вкладки 3
			</div>
		</div>
	</div>

      <!-- <div class="card__wrapper">
        <MenuItemCard
          v-for="menuItem in menuItems"
          :imageUrl="'storage/' + menuItem.image_path"
          :key="menuItem.id"
          :menuItem="menuItem"
        />
      </div> -->
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
import TheFooter from "../../Components/TheFooter.vue";
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

const activeTab = ref(1);
</script>




<style scoped lang="scss">
.tabs-header {
  border-bottom: 3px solid #eee;
}
.tabs-btn {
  font-size: 18px;
  border: none;
  display: inline-block;
  background: #fff;
  padding: 10px 25px;
  text-align: center;
  cursor: pointer;
  margin-bottom: -3px;
  border-bottom: 3px solid #eee;
}
.tabs-btn.active {
  color: #5fa03a;
  border-bottom: 3px solid #5fa03a;
}
.tabs-body-item {
  padding: 20px 0;
}

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
  gap: 20px;
  //   width: 1250px;
  flex-direction: row;
  flex-wrap: wrap;
  //   align-items: space-between;
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