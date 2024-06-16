<template>
    <header class="header">
        <!-- переделать под линки -->
        <img class="header__logo" src="/img/logo.png" alt="logo">
        <nav class="header__nav">
            <ul>
                <li><a>МЕНЮ</a></li>
                <li><a>ДОСТАВКА</a></li>
                <li><a>О НАС</a></li>
                <li><a>КОНТАКТЫ</a></li>
                <li><a>КОРЗИНА</a></li>
            </ul>
        </nav>

        <a class="header__phone" href="tel:89999999">+7-918-85-45-45</a>
    </header>
</template>

<script setup>


</script>


<style scoped lang="scss">
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

            a {
                cursor: pointer;
                font-size: 18px;
                color: var(--text-color);
                font-weight: 500;
                transition: 0.2s all ease-in-out;

                &:hover {
                    // font-weight: 700;
                    color: var(--primary-color);
                }
            }
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
</style>