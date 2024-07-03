<template lang="">
    <section class="recommended-screen">
        <MainContainer>
            <h2 class="recommended-screen__title">Рекоммендуем попробовать</h2>
            <img class="owl-icon" src="/icons/owl_icon.png" alt="owl icon">
               <carousel :breakpoints="breakpoints" :pauseAutoplayOnHover="true" :wrapAround="true" :transition="500" snapAlign="start" :autoplay="3000" :items-to-show="4">
                 <slide v-for="recommendedItem in recommendedMenuItems" :key="recommendedItem.id">
                    <MenuItemCard  :menuItem="recommendedItem" :imageUrl="'storage/' + recommendedItem.image_path"/>
                 </slide>
             
                  <template #addons>
                   <!-- <navigation /> -->
                   <pagination />
                 </template>


</carousel>

<Button class="btn__rec">
    <Link class="header__link" href="/menu">Всё меню</Link>
</Button>

</MainContainer>
<img class="recommended-screen__dumplings recommended-screen__dumplings-left" src="/img/dumplings1.png" alt="dumplings image">
<img class="recommended-screen__dumplings recommended-screen__dumplings-right" src="/img/dumplings2.png" alt="dumplings image">

</section>
</template>

<script>
import MainContainer from "@/Layouts/MainContainer.vue";
import MenuItemCard from "@/Components/MenuItemCard.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import { Link } from "@inertiajs/vue3";
// import Button from '../Button.vue';

export default {
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
    MainContainer,
    MenuItemCard,
    Link,
  },
  props: {
    recommendedMenuItems: Array,
  },
  data: () => ({
    breakpoints: {
      // 700px and up
      320: {
        itemsToShow: 1,
        // snapAlign: 'center',
      },
      1200: {
        itemsToShow: 4,
      },
    },
  }),
};
</script>

<style lang="scss">
.recommended-screen {
  position: relative;
  min-height: 768px;
  margin-top: 200px;

  &__title {
    text-align: center;
    font-size: 36px;
    font-family: "Gabriela";
    font-weight: 400;
    color: var(--text-color);
  }
  &__dumplings {
    display: block;
    position: absolute;
    z-index: -10;

    &-left {
      top: 60%;
      left: 0;
    }
    &-right {
      top: 60%;
      right: 0;
    }
  }
}

.carousel__viewport {
  height: 550px !important;
}

.carousel__pagination-button {
  padding: 0 9px;
}

.carousel__pagination-button::after {
  width: 12px;
  height: 12px;
  border-radius: 100%;
  background-color: #b8b8b8;
}

// .carousel__pagination-button--active2 {

// }
.carousel__pagination-button--active::after {
  background-color: var(--primary-color);
}

@media (max-width: 575px) {
  .recommended-screen {
    &__title {
      font-size: 20px;
    }

    &__dumplings {
      width: 200px;

      &-left {
        top: 90%;
        left: 0;
      }
      &-right {
        top: 90%;
        right: 0;
      }
    }
  }

  .carousel__pagination-button::after {
    width: 8px;
    height: 8px;
  }
}
</style>