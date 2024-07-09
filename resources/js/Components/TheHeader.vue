<template>
  <div class="scroll-compensation" ref="scrollCompensation"></div>
  <header class="header" ref="headRef">
    <MainContainer>
      <div class="header__content">
        <Link href="/"
          ><img class="header__logo" src="/img/logo.png" alt="logo"
        /></Link>
        <a class="header__phone-mobile" href="tel:89999999">+7-918-85-45-45</a>
        <nav class="header__nav">
          <ul>
            <li>
              <Link
                href="/"
                :class="{ active: $page.url === '/' }"
                class="header__link"
                >ГЛАВНАЯ</Link
              >
            </li>

            <li>
              <Link
                href="/menu"
                class="header__link"
                :class="{ active: $page.url === '/menu' }"
                >МЕНЮ</Link
              >
            </li>

            <li>
              <Link
                href="/about-us"
                :class="{ active: $page.url === '/about-us' }"
                class="header__link"
              >
                О НАС</Link
              >
            </li>
            <li>
              <Link
                href="/contacts"
                :class="{ active: $page.url === '/contacts' }"
                class="header__link"
              >
                КОНТАКТЫ
              </Link>
            </li>

            <li class="header__cart-link">
              <Link
                href="/cart"
                :class="{ active: $page.url === '/cart' }"
                class="header__link"
                >КОРЗИНА</Link
              >
              <transition name="fade">
                <div v-if="cartSize" class="header__cart-amount">
                  <p>{{ cartSize }}</p>
                </div>
              </transition>
            </li>
          </ul>
        </nav>

        <BurgerMenu></BurgerMenu>
        <div class="header__info">
          <a class="header__phone" href="tel:89999999">+7 (8672) 94-92-82</a>
          <p class="header__hours">с 08:00 до 21:00</p>
        </div>
      </div>
    </MainContainer>
  </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import BurgerMenu from "../Components/BurgerMenu.vue";
import { defineComponent, ref } from "vue";
import { onMounted } from "@vue/runtime-core";
import MainContainer from "@/Layouts/MainContainer.vue";

const page = usePage();

const cartSize = computed(() => page.props.cart.cartSize);
defineProps({
  linkClass: String,
});
const scrollCompensation = ref(null);
const headRef = ref(null); 
onMounted(() => {
  if (window.innerWidth <= 575) {
    window.addEventListener("scroll", () => {
      console.log(window.innerWidth);
      var curr = window.scrollY;
      // You can style header-bg for style purpose

      if (curr >= 5) {
        headRef.value.classList.add("header-scroll");
        scrollCompensation.value.classList.add("scroll-compensation-active");
      } else {
        headRef.value.classList.remove("header-scroll");
        scrollCompensation.value.classList.remove("scroll-compensation-active");
      }
    });
  }
});
</script>


<style scoped lang="scss">
.header {
  transition: all 0.5s ease;

  &__content {
    height: 135px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  &__logo {
    width: 205px;
    height: 65px;
  }

  &__nav {
    width: 575px;

    ul {
      padding: 0;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      list-style: none;
    }
  }

  &__link {
    cursor: pointer;
    font-size: 18px;
    color: var(--text-color);
    font-weight: 500;
    transition: 0.5s all ease-in-out;

    &:hover {
      // font-weight: 700;
      color: var(--primary-color);
    }
  }

  &__cart-link {
    position: relative;
  }

  &__cart-amount {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 25px;
    height: 25px;
    border-radius: 100%;
    background-color: var(--primary-color);
    position: absolute;
    top: -10px;
    right: -25px;
    font-size: 14px;

    p {
      color: var(--background-color);
    }
  }

  &__info {
    display: flex;
    flex-direction: column;
  }
  &__hours {
    font-size: 14px;
    font-weight: 400;
    color: var(--text-color);
    text-align: end;
  }
  &__phone {
    text-decoration: none;
    font-size: 24px;
    color: var(--primary-color);
    font-weight: 600;
    transition: 0.3s all ease-in-out;

    &:hover {
      transform: scale(1.03);
    }
  }
  &__phone-mobile {
    display: none;
  }
}

.active {
  transition: 0.5s all ease;
  color: var(--primary-color);
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

@media (max-width: 575px) {
  .scroll-compensation {
    display: none;
    height: 80px;
    &-active {
      display: block;
    }
  }
  .header.header-scroll {
    z-index: 500;
    top: 0;
    background-color: rgba(255, 255, 255, 0.966);
    position: fixed;
    width: 100%;
  }
  .header {
    // height: 80px;
    &__content {
      height: 80px;
    }
    &__logo {
      width: 105px;
      height: 35px;
    }
    &__nav {
      display: none;
    }
    &__info {
      display: none;
    }
    &__phone-mobile {
      display: block;
      font-size: 14px;
      color: var(--primary-color);
      font-weight: 600;
    }
  }
}
</style>