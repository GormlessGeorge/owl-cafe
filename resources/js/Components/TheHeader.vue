<template>
    <header class="header">
        <!-- переделать под линки -->
        <Link href="/"><img class="header__logo" src="/img/logo.png" alt="logo"></Link>

        <nav class="header__nav">
            <ul>
                <li>
                     <Link href="/" :class="{ 'active': $page.url === '/' }" class="header__link">ГЛАВНАЯ</Link>
                </li>

                <li>
                    <Link href="/menu" class="header__link" :class="{ 'active': $page.url === '/menu' }" >МЕНЮ</Link>
                </li>

                <li>
                    <Link href="/about-us" :class="{ 'active': $page.url === '/about-us' }" class="header__link">
                    О НАС</Link>
                </li>
                <li>
                    <Link href="/contacts" :class="{ 'active': $page.url === '/contacts' }" class="header__link">
                    КОНТАКТЫ
                    </Link>
                </li>

                <li class="header__cart-link">
                    <Link href="/cart" :class="{ 'active': $page.url === '/cart' }" class="header__link">КОРЗИНА</Link>
                    <div v-if="cartSize" class="header__cart-amount">
                        <p>{{ cartSize }}</p>
                    </div>
                </li>

            </ul>
        </nav>

        <a class="header__phone" href="tel:89999999">+7-918-85-45-45</a>
    </header>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'


import { usePage } from '@inertiajs/vue3'

const page = usePage()

const cartSize = computed(() => page.props.cart.cartSize)
defineProps({
    iNeedThis: Number,
    linkClass: String
})
</script>


<style scoped lang="scss">
.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease-in-out;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
  transform: translateX(0);
  opacity: 1;
}
.header {
    display: flex;
    height: 175px;
    align-items: center;
    justify-content: space-between;

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
}


.active {
    transition: 0.5s all ease;
    color: var(--primary-color);
}
</style>