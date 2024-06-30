<template>
  <section class="specials-screen">
    <MainContainer>
      <h2 class="specials-screen__title">Акции и предложения</h2>
      <img class="owl-icon" src="/icons/owl_icon.png" alt="owl icon" />
      <div class="specials-screen__wrapper">
        <div class="specials-screen__special specials-screen__special-delivery">
          <p class="specials-screen__name specials-screen__name-delivery">
            Доставка блюд
          </p>
          <p class="specials-screen__descr specials-screen__descr-delivery">
            Заказывайте на сайте, или по номеру:
          </p>
          <p class="specials-screen__phone">+7-918-85-45-45</p>
          <img
            class="specials-screen__img"
            src="/img/special_delivery.png"
            alt="special image"
          />
        </div>
        <div
          class="specials-screen__special"
          @mouseenter="highlightSpecial"
          @mouseleave="removeHighlight"
        >
          <p class="specials-screen__name">
            Скидка <span class="specials-screen__span">21%</span>
          </p>
          <p class="specials-screen__descr">В кафе действует скидка 21%</p>
          <img
            class="specials-screen__img"
            src="/img/special_discount.png"
            alt="special image"
          />
        </div>
        <div
          class="specials-screen__special"
          @mouseenter="highlightSpecial"
          @mouseleave="removeHighlight"
        >
          <p class="specials-screen__name">
            Десерт в <span class="specials-screen__span">подарок</span>
          </p>
          <p class="specials-screen__descr">
            Бесплатный десерт в честь дня рождения!
          </p>
          <img
            class="specials-screen__img"
            src="/img/special_birthday.png"
            alt="special image"
          />
        </div>
        <div
          class="specials-screen__special"
          @mouseenter="highlightSpecial"
          @mouseleave="removeHighlight"
        >
          <p class="specials-screen__name">
            Вкусные <span class="specials-screen__span">завтраки</span>
          </p>
          <p class="specials-screen__descr">В кафе действует меню завтраков</p>
          <img
            class="specials-screen__img"
            src="/img/special_breakfast.png"
            alt="special image"
          />
        </div>
      </div>
    </MainContainer>
  </section>
</template>


<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";

const highlightSpecial = (event) => {
  const parentElement = event.target;
  parentElement.classList.add("specials-screen__special-active");
  parentElement.children[0].classList.add("specials-screen__name-active");
  parentElement
    .querySelector("span")
    .classList.add("specials-screen__span-active");
  parentElement.children[1].classList.add("specials-screen__descr-active");
  parentElement.children[2].classList.add("specials-screen__img-active");
};

const removeHighlight = (event) => {
  const parentElement = event.target;
  parentElement.classList.remove("specials-screen__special-active");
  parentElement.children[0].classList.remove("specials-screen__name-active");
  parentElement
    .querySelector("span")
    .classList.remove("specials-screen__span-active");
  parentElement.children[1].classList.remove("specials-screen__descr-active");
  parentElement.children[2].classList.remove("specials-screen__img-active");
};
</script>


<style scoped lang="scss">
.specials-screen {
  margin-top: 290px;
  height: 620px;

  &__wrapper {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-top: 30px;
  }

  &__title {
    font-size: 36px;
    text-align: center;
    font-family: "Gabriela";
    font-weight: 400;
    color: var(--text-color);
  }

  &__special {
    position: relative;
    overflow: hidden;
    padding: 70px 0 0 30px;
    width: 285px;
    height: 390px;
    border-radius: 6px;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
    transition: all 0.5s ease-in-out;
    &-delivery {
      background-color: var(--primary-color);
    }
    &-active {
      background-color: var(--primary-color);
    }
  }

  &__name {
    font-family: "Gabriela";
    font-weight: normal;
    font-size: 24px;
    color: var(--text-color);
    transition: all 0.5s ease-in-out;
    &-delivery {
      color: var(--background-color);
    }
    &-active {
      color: var(--background-color);
    }
  }

  &__descr {
    width: 222px;
    margin-top: 30px;
    font-size: 16px;
    color: var(--text-color);
    transition: all 0.5s ease-in-out;
    &-delivery {
      color: var(--background-color);
    }
    &-active {
      color: var(--background-color);
    }
  }

  &__phone {
    font-weight: 600;
    margin-top: 20px;
    font-size: 20px;
    color: var(--background-color);
  }

  &__img {
    position: absolute;
    left: 105px;
    top: 215px;
    transition: all 0.3s ease-in-out;
    &-active {
      left: 95px;
      top: 200px;
    }
  }

  &__span {
    color: var(--primary-color);
    font-family: "Gabriela";
    transition: all 0.5s ease-in-out;
    &-active {
      color: var(--background-color);
    }
  }
}
</style>