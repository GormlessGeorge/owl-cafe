<template>
    <section class="about-screen">
        <MainContainer>
            <div class="about-screen__wrapper">
                <div class="about-screen__info">
                    <h2 class="about-screen__title">Добро пожаловать в кафе <span>“Сова”</span></h2>
                    <img class="owl-icon" src="/icons/owl_icon.png" alt="owl icon">
                    <p class="about-screen__descr">Добро пожаловать в кафе “Сова” – ваш уголок уюта с богатым выбором
                        кавказской и европейской кухни.<br><br>

                        Начните утро с ароматного кофе и завтрака, который зарядит вас энергией.<br><br>

                        Мы ценим каждого гостя и создаем теплую атмосферу гостеприимства. Наш интерьер способствует
                        расслаблению и комфорту.
                    </p>
                    <Button buttonClass="btn__about">О нашем кафе</Button>
                </div>

                <div class="about-screen__images">
                    <div class="about-screen__img"><img src="/img/about_img1.png" alt="about us image"></div>
                    <div class="about-screen__img"><img src="/img/about_img2.png" alt="about us image"></div>
                    <div class="about-screen__block"></div>
                </div>
            </div>
        </MainContainer>

        <img class="about-screen__mushrooms about-screen__mushrooms-left" src="/img/mushrooms.png" alt="mushrooms image">
        <img class="about-screen__mushrooms about-screen__mushrooms-right" src="/img/mushrooms2.png" alt="mushrooms image">
    </section>
</template>


<script setup>
import MainContainer from '@/Layouts/MainContainer.vue';

</script>


<style scoped lang="scss">
.about-screen {
    position: relative;
    margin-top: 200px;
    height: 455px;

    &__wrapper {
        display: flex;
        justify-content: space-between;
    }

    &__info {
        padding-top: 5px;
        width: 600px;
        display: flex;
        flex-direction: column;
    }

    &__title {
        font-size: 36px;
        font-family: 'Gabriela';
        font-weight: 400;

        span {
            font-family: 'Gabriela';
            font-weight: 500;
            color: var(--primary-color);
        }
    }

    &__descr {
        margin-top: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: 400;
    }


    &__images {
        position: relative;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    &__img {
        &:first-child {
            margin-right: 25px;
            margin-top: 25px;
        }

        &:nth-child(2) {
            margin: 22px 22px 0 0;
        }
    }

    &__block {
        width: 435px;
        height: 454px;
        position: absolute;
        border-radius: 6px;
        top: 0;
        right: 0;
        z-index: -5;
        background-color: var(--primary-color);
    }

    &__mushrooms {
        display: block;
        position: absolute;
        z-index: -10;

        &-left {
            left: 0;
        }
        &-right {
            right: 0;
        }
    }
}
</style>