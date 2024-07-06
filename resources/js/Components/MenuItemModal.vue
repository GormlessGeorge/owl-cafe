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
          <button class="modal-content__close" @click.stop="closeModal">
            <svg
              width="18"
              height="18"
              viewBox="0 0 18 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g clip-path="url(#clip0_445_646)">
                <path
                  d="M18.557 -0.541839C18.4167 -0.682469 18.25 -0.79404 18.0665 -0.870164C17.8829 -0.946289 17.6862 -0.985473 17.4875 -0.985473C17.2889 -0.985473 17.0921 -0.946289 16.9086 -0.870164C16.7251 -0.79404 16.5584 -0.682469 16.4181 -0.541839L9 6.86105L1.58194 -0.557009C1.4415 -0.697455 1.27476 -0.808862 1.09126 -0.884871C0.907761 -0.960879 0.711086 -1 0.512466 -1C0.313846 -1 0.117171 -0.960879 -0.0663301 -0.884871C-0.249831 -0.808862 -0.416564 -0.697455 -0.557009 -0.557009C-0.697455 -0.416564 -0.808862 -0.249831 -0.884871 -0.0663301C-0.960879 0.117171 -1 0.313846 -1 0.512466C-1 0.711086 -0.960879 0.907761 -0.884871 1.09126C-0.808862 1.27476 -0.697455 1.4415 -0.557009 1.58194L6.86105 9L-0.557009 16.4181C-0.697455 16.5585 -0.808862 16.7252 -0.884871 16.9087C-0.960879 17.0922 -1 17.2889 -1 17.4875C-1 17.6862 -0.960879 17.8828 -0.884871 18.0663C-0.808862 18.2498 -0.697455 18.4166 -0.557009 18.557C-0.416564 18.6975 -0.249831 18.8089 -0.0663301 18.8849C0.117171 18.9609 0.313846 19 0.512466 19C0.711086 19 0.907761 18.9609 1.09126 18.8849C1.27476 18.8089 1.4415 18.6975 1.58194 18.557L9 11.1389L16.4181 18.557C16.5585 18.6975 16.7252 18.8089 16.9087 18.8849C17.0922 18.9609 17.2889 19 17.4875 19C17.6862 19 17.8828 18.9609 18.0663 18.8849C18.2498 18.8089 18.4166 18.6975 18.557 18.557C18.6975 18.4166 18.8089 18.2498 18.8849 18.0663C18.9609 17.8828 19 17.6862 19 17.4875C19 17.2889 18.9609 17.0922 18.8849 16.9087C18.8089 16.7252 18.6975 16.5585 18.557 16.4181L11.1389 9L18.557 1.58194C19.1335 1.00549 19.1335 0.0346154 18.557 -0.541839Z"
                  fill="#C1C1C1"
                />
              </g>
              <defs>
                <clipPath id="clip0_445_646">
                  <rect width="18" height="18" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </button>
        </div>
      </div>
    </transition>
  </teleport>
</template>
  
  <script setup>
import { ref, defineProps, defineEmits, computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
const props = defineProps({
  show: Boolean,
  menuItem: Object,
  imageUrl: String,
});
const page = usePage();

const flash = computed(() => page.props.flash.success);
const emit = defineEmits(["close"]);

const closeModal = () => {
  emit("close");
};
</script>
  
  <style scoped lang="scss">
.modal {
  position: fixed;
  z-index: 999;
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
  position: relative;
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

@media (max-width: 575px) {
  .modal-content {
    height: 500px;
    width: 285px;
    grid-template-columns: 1fr;
    padding: 30px 30px;

    &__name {
      font-size: 20px;
      grid-column: 1 / 3;
      font-size: 18px;
    }
    &__info {
      grid-template-columns: 100px 1fr;
      grid-template-rows: 70px 95px 30px 75px;
    }
    &__ingredients {
      grid-column: 1 / 3;
      font-size: 14px;
      margin-top: 5px;
    }

    &__weight {
      grid-column: 1 / 3;
      font-size: 14px;
    }

    &__price {
      font-size: 18px;
      grid-column: 1 / 2;
      grid-row: 4 / 5;
    }
    &__button {
      grid-column: 2 / 3;
      grid-row: 4 / 5;
      height: 40px;
      width: 100%;
    }

    &__image {
      height: 170px;
      width: 170px;
      margin: 0 auto;
      img {
        border-radius: 10px;
        height: 100%;
        width: 100%;
        object-fit: cover;
      }
    }

    &__close {
      position: absolute;
      width: 50px;
      height: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      top: -3px;
      right: -5px;
    }
  }
}
</style>
  