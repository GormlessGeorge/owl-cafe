<template>
  <div class="card" ref="card">
    <div class="card__image">
      <img @click="showModal = true" :src="imageUrl" />
    </div>
    <p class="card__item-name">{{ menuItem.name }}</p>
    <p class="card__item-ingredients">
      {{ truncate(menuItem.ingredients, 25) }}
    </p>
    <div class="card__item-lower">
      <p class="card__item-price">{{ menuItem.price + " руб." }}</p>
      <p class="card__item-weight">{{ menuItem.weight + " гр." }}</p>
      <Link
        class="card__item-add"
        :href="`/add-to-cart/${menuItem.id}`"
        as="button"
        method="get"
        preserve-state
        preserve-scroll
        >Добавить
      </Link>
    </div>

    <MenuItemModal
      :imageUrl="imageUrl"
      :menuItem="menuItem"
      :show="showModal"
      @close="showModal = false"
    />
  </div>
</template>
  
  <script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import MenuItemModal from "../Components/MenuItemModal.vue";
const props = defineProps({
  menuItem: Object,
  imageUrl: String,
});

const card = ref(null);

const showModal = ref(false);

function truncate(value, length) {
  if (value.length > length) {
    return value.substring(0, length) + "...";
  } else {
    return value;
  }
}
</script>
  <style scoped lang="scss">
.card {
  display: none;
  padding: 17px;
  width: 285px;
  height: 495px;
  background-color: var(--background-color);
  margin-top: 20px;
  border-radius: 10px;
  box-shadow: 2px 2px 4px 0 rgba(0, 0, 0, 0.3);
  transition: all 0.2s ease-in-out;
  &:hover {
    box-shadow: 4px 4px 4px 0 rgba(0, 0, 0, 0.3);
  }

  &__image {
    width: 250px;
    height: 250px;
    cursor: pointer;

    img {
      border-radius: 10px;
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }

  &__item-name {
    text-align: start;
    width: 100%;
    height: 60px;
    margin-top: 25px;
    font-size: 20px;
    font-weight: 600;
    color: var(--text-color);
  }

  &__item-ingredients {
    text-align: start;
    width: 100%;
    height: 42px;
    margin-top: 15px;
    font-size: 14px;
    font-weight: 300;
    color: var(--text-color);
  }

  &__item-lower {
    display: grid;
    margin-top: 25px;
    grid-template-columns: 1fr 120px;
    grid-template-rows: 27px 18px;
  }

  &__item-price {
    text-align: start;
    // justify-self: flex-start;
    font-size: 20px;
    font-weight: 700;
    color: var(--text-color);
  }

  &__item-weight {
    text-align: start;
    // justify-self: flex-start;
    grid-row: 2 / 3;
    font-size: 13px;
    font-weight: 300;
    color: var(--text-color);
  }

  &__item-add {
    align-self: center;
    grid-row: 1/3;
    width: 120px;
    height: 40px;
    border-radius: 6px;
    color: var(--background-color);
    background-color: #51a068;
    transition: 0.3s all ease-in-out;
    &:hover {
      color: #51a068;
      background-color: var(--background-color);
      border: 2px solid #51a068;
      box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
    }
  }
}

@media (max-width: 575px) {
  .card {
    display: block;
    padding: 15px;
    width: 155px;
    height: 350px;
    // background-color: lightblue;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 4px 0 rgba(0, 0, 0, 0.3);
    transition: all 0.2s ease-in-out;
    &:hover {
      box-shadow: 4px 4px 4px 0 rgba(0, 0, 0, 0.3);
    }
    &__item-name {
      font-size: 14px;
      margin-top: 14px;
    }

    &__item-ingredients {
      display: none;
    }

    &__item-price {
      font-size: 16px;
      grid-row: 2 / 3;
      grid-column: 1 / 3;
    }

    &__item-weight {
      grid-row: 1 / 2;
      grid-column: 1 / 3;
    }
    &__item-add {
      grid-row: 3/ 4;
      grid-column: 1 / 3;
      width: 100%;
      margin-top: 6px;
    }

    &__item-lower {
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 25px 26px 1fr;
    }
    &__image {
      width: 125px;
      height: 125px;
    }
  }
}
</style>