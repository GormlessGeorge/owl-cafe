<template>
  <div id="sidemenu">
    <button
      class="sidemenu__btn"
      v-on:click="navOpen = !navOpen"
      v-bind:class="{ active: navOpen }"
    >
      <span class="top"></span>
      <span class="mid"></span>
      <span class="bottom"></span>
    </button>
    <transition name="translateX">
      <nav v-show="navOpen">
        <div class="sidemenu__wrapper">
          <ul class="sidemenu__list">
            <li class="sidemenu__item">
              <Link
                href="/"
                :class="{ active: $page.url === '/' }"
                class="header__link"
                >ГЛАВНАЯ</Link
              >
            </li>
            <li class="sidemenu__item">
              <Link
                href="/menu"
                :class="{ active: $page.url === 'menu' }"
                class="header__link"
                >МЕНЮ</Link
              >
            </li>
            <li class="sidemenu__item">
              <Link
                href="/about-us"
                :class="{ active: $page.url === '/about-us' }"
                class="header__link"
                >О НАС</Link
              >
            </li>
              
            <li class="sidemenu__item">
              <Link
                href="/contacts"
                :class="{ active: $page.url === '/contacts' }"
                class="header__link"
                >КОНТАКТЫ</Link
              >
            </li>
              
            <li class="sidemenu__item">
              <Link
                href="/cart"
                :class="{ active: $page.url === '/cart' }"
                class="header__link"
                >КОРЗИНА</Link
              >
            </li>
              
          </ul>
        </div>
      </nav>
    </transition>
  </div>
</template>



<script>
import { Link } from "@inertiajs/vue3";
export default {
  components: { Link },
  data() {
    return {
      navOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>



<style scoped lang="scss">
#sidemenu {
  display: none;
  nav {
    width: 200px;
    // height: calc(100% - #{$headerHeight} - #{$footerHeight});s
    position: fixed;
    width: 100%;
    height: calc(100vh - calc(100vh - 100%));
    background: rgba(27, 27, 27, 0.938);
    top: 0;
    right: 0;
    z-index: 100;
    // box-shadow: 2px 0 3px$grey-6;
    // overflow-y: scroll;
  }

  .sidemenu {
    &__btn {
      display: block;
      width: 50px;
      height: 50px;
      border: none;
      position: relative;
      z-index: 105;
      appearance: none;
      cursor: pointer;
      outline: none;

      span {
        display: block;
        width: 24px;
        height: 3px;
        margin: auto;
        background: var(--primary-color);
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        transition: all 0.4s ease;

        &.top {
          transform: translateY(-8px);
        }

        &.bottom {
          transform: translateY(8px);
        }
      }
      &.active {
        // position:fixed;
        // z-index: 105;
        .top {
          transform: rotate(-45deg);
        }
        .mid {
          transform: translateX(-20px) rotate(360deg);
          opacity: 0;
        }
        .bottom {
          transform: rotate(45deg);
        }
      }
    }

    &__wrapper {
      padding-top: 70px;
    }

    &__list {
      padding-top: 50px;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    &__item {
      a {
        text-align: center;
        text-decoration: none;
        line-height: 1.6em;
        font-size: 18px;
        padding: 0.5em;
        display: block;
        color: white;
        transition: 0.4s ease;

        &:hover {
          background: var(--primary-color);
          color: dimgrey;
        }
      }
    }
  }
}

.translateX-enter-from {
  transform: translateX(200px);
  opacity: 0;
  transition: 0.5s ease;
}

.translateX-enter-active,
.translateX-leave-active {
  transform-origin: top right 0;
  transition: 0.5s ease;
}

.translateX-leave-to {
  transform: translateX(200px);
  transition: 0.5s ease;
  opacity: 0;
}

@media (max-width: 575px) {
  #sidemenu {
    display: block;
  }
}
</style>