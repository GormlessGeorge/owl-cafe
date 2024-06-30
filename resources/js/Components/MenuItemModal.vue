<template>
  <teleport to="body">
    <transition name="modal">
      <div v-if="show" class="modal" @click.self="closeModal">
        <div class="modal-content">
          <div class="modal-content__image">
            <img :src="imageUrl" alt="modal image" />
          </div>
          
          <div class="modal-content__info">
            <p class="modal-content__name">{{ menuItem.name }}</p>
            <p class="modal-content__ingredients">
              {{ menuItem.ingredients }}
            </p>
            <p class="modal-content__weight">{{ menuItem.weight + " гр." }}</p>
            <p class="modal-content__price">{{ menuItem.price + " руб." }}</p>
            <Link
              class="modal-content__button"
              :href="`/add-to-cart/${menuItem.id}`"
              as="button"
              method="get"
              preserve-state
              preserve-scroll
              >Добавить
            </Link>
          </div>
          <!-- <button @click.stop="closeModal">Закрыть</button> -->
          <!-- {{ truncate(menuItem.ingredients, 55) }} -->
        </div>
      </div>
    </transition>
  </teleport>
</template>
  
  <script setup>
import { ref, defineProps, defineEmits, computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { usePage } from '@inertiajs/vue3';
const props = defineProps({
  show: Boolean,
  menuItem: Object,
  imageUrl: String,
});
const page = usePage()

const flash = computed(() => page.props.flash.success)
const emit = defineEmits(["close"]);

const closeModal = () => {
  emit("close");
};
</script>
  
  <style scoped lang="scss">
.modal {
  position: fixed;
  z-index: 100;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  display: grid;
  grid-template-columns: 400px 1fr;
  column-gap: 50px;
  position: relative;
  height: 500px;
  width: 1000px;
  background: white;
  padding: 50px;
  border-radius: 10px;

  &__image {
    height: 400px;
    width: 400px;
    img {
      border-radius: 10px;
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }
  &__info {
    display: grid;
    grid-template-columns: 1fr 185px;
    grid-template-rows: 80px 150px 50px 1fr;
  }

  &__name {
    font-size: 26px;
    font-weight: 600;
    height: 80px;
    color: var(--text-color);
    grid-column: 1 / 3;
    
  }
  &__ingredients {
    margin-top: 30px;
    font-size: 18px;
    grid-column: 1 / 3;
    grid-row: 2 / 3;
    color: var(--text-color);
  }
  &__weight {
    font-size: 16px;
    grid-row: 3 / 4;
  }
  &__price {
    font-size: 28px;
    font-weight: 600;
    color: var(--text-color);
    grid-row: 4 / 5;
    align-self: end;
    justify-self: start;
    margin-bottom: 8px;
  }
  &__button {
    display: block;
    grid-column: 2 / 3;
    grid-row: 4 / 5;
    align-self: end;
    border-radius: 6px;
    background-color: #51a068;
    height: 54px;
    width: 185px;
    color: var(--background-color);
    transition: 0.3s all ease-in-out;
    &:hover {
        color: #51a068;
        background-color: var(--background-color);
        border: 2px solid #51a068;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
    }
  }
}

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.5s;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
  