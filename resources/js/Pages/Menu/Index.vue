<template>
  <section class="menu">
    <TheHeader></TheHeader>
    <MainContainer>

      <h2 class="menu__title">Меню кафе и доставки</h2>
      <!-- <p v-if="flash"> {{ flash }}</p> -->

      <div class="tabs">
        <div class="tabs-header">
          <button
            class="tabs-btn"
            v-for="category in categories"
            :key="category.id"
            @click="activeTab = category.id"
            :class="{ active: activeTab === category.id }"
          >
            {{ category.name }}
          </button>
        </div>
        <div class="tabs-body">
          <div class="card__wrapper">
            <!-- <transition-group name="fade"> -->
            <MenuItemCardMobile
              v-for="menuItem in menuItems"
              :imageUrl="'storage/' + menuItem.image_path"
              :key="menuItem.id"
              v-show="activeTab === menuItem.category.id"
              :menuItem="menuItem"
            />
            <MenuItemCard
              v-for="menuItem in menuItems"
              :imageUrl="'storage/' + menuItem.image_path"
              :key="menuItem.id"
              v-show="activeTab === menuItem.category.id"
              :menuItem="menuItem"
            />
            <!-- </transition-group> -->
          </div>
        </div>
      </div>
    </MainContainer>
  </section>

  <CartWidget></CartWidget>

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
  <TheFooter></TheFooter>
</template>




<script setup>
import CartWidget from "../../Components/CartWidget.vue";
import MenuItemCard from "@/Components/MenuItemCard.vue";
import MainContainer from "@/Layouts/MainContainer.vue";
import TheFooter from "../../Components/TheFooter.vue";
import MenuItemCardVue from "../../Components/MenuItemCard.vue";
import MenuItemCardMobile from "../../Components/MenuItemCardMobile.vue";
import { ref, computed } from "vue";
import { router, Link, useRemember, usePage } from "@inertiajs/vue3";

const page = usePage();

const flash = computed(() => page.props.flash.success);
defineProps({
  menuItems: Array,
  categories: Array, // Здесь вы можете определить свои props
});

const activeTab = ref(1);



</script>




<style scoped lang="scss">
.tabs-header {
  //   border-bottom: 3px solid #eee;
  margin-top: 25px;
  display: grid;
  grid-template-rows: 1fr 1fr;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  //   flex-direction: row;
  //   flex-wrap: wrap;
}
.tabs-btn {
  font-size: 18px;
  border: none;
  // width: 14%;
  //   background: #fff;
  cursor: pointer;
  margin-top: 25px;
  padding-bottom: 10px;
  /* margin-bottom: -3px; */
  color: var(--text-color);
  transition: all 0.2s ease;
  border-bottom: 2px solid rgb(248, 248, 248);
}
.tabs-btn.active {
  font-weight: 600;

  color: var(--primary-color);
  border-bottom: 2px solid var(--primary-color);
}
.tabs-body-item {
  padding: 20px 0;
  min-height: 300px;
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
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.1s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
// button {
//   display: block;
//   margin: 0 auto;
//   margin-top: 20px;
//   background-color: var(--primary-color);
//   height: 54px;
//   color: white;
//   width: 150px;
// }

@media (max-width: 575px) {
  .menu {
    &__title {
      font-size: 30px;
    }
  }

  .tabs-header {
    overflow-x: auto;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr;
  }
  .tabs-btn {
    font-size: 14px;
    width: 140px;
  }

  .card__wrapper {
  display: flex;
  gap: 10px;
  //   width: 1250px;
  flex-direction: row;
  flex-wrap: wrap;
  //   align-items: space-between;
}
}
</style>