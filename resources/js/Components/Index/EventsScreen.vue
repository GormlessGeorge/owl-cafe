<template>
  <section class="events-screen">
    <MainContainer>
      <div class="events-screen__wrapper">
        <div class="events-screen__images">
          <div class="events-screen__img">
            <img src="/img/events_img_1.png" alt="events image" />
          </div>
          <div class="events-screen__img">
            <img src="/img/events_img_2.png" alt="events image" />
          </div>

          <div class="events-screen__block"></div>
        </div>

        <div class="events-screen__info">
          <h2 class="events-screen__title">Праздники и Мероприятия</h2>
          <img class="owl-icon" src="/icons/owl_icon.png" alt="owl icon" />
          <p class="events-screen__descr">
            В кафе “Сова” мы создаем идеальные условия для небольших торжеств и
            мероприятий. Отметьте день рождения, проведите мини-корпоратив или
            устройте любое другое событие в атмосфере уюта и гостеприимства.
            <br /><br />
            Наша команда поможет вам спланировать и реализовать мероприятие
            предложив индивидуальное меню, декорации и
            развлекательную программу.
            <br /><br />
            Мы заботимся о каждой детали, чтобы ваше событие стало незабываемым
            и оставило теплые воспоминания у вас и ваших гостей.
          </p>
          <Button buttonClass="btn__events">О нашем кафе</Button>
        </div>
      </div>
    </MainContainer>

    <img
      class="events-screen__soup events-screen__soup-left"
      src="/img/soup1.png"
      alt="soup image"
    />
    <img
      class="events-screen__soup events-screen__soup-right"
      src="/img/soup2.png"
      alt="soup image"
    />
  </section>
</template>


<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
</script>


<style scoped lang="scss">
.events-screen {
  min-height: 500px;
  position: relative;
  margin-top: 300px;

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
    text-align: center;
    font-family: "Gabriela";
    font-weight: 400;
    color: var(--text-color);
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
    justify-content: center;
  }

  &__img {
    &:first-child {
      position: absolute;
      width: 273px;
      left: 7%;
      height: 411px;
    }

    &:nth-child(2) {
      position: absolute;
      width: 234px;
      height: 352px;
      left: 77%;
    }
  }

  &__block {
    width: 435px;
    height: 454px;
    // position: absolute;
    border-radius: 6px;
    // top: 0;
    // right: 0;
    z-index: -5;
    background-color: var(--primary-color);
  }

  &__soup {
    display: block;
    position: absolute;
    z-index: -10;

    &-left {
      top: 50%;
      left: 0;
    }

    &-right {
      top: 50%;
      right: 0;
    }
  }
}
@media (max-width: 575px) {
  .events-screen {
    min-height: 455px;
    margin-top: 100px;
    &__wrapper {
      flex-wrap: wrap;
      justify-content: flex-start;
    }

    &__title {
      text-align: center;
      font-size: 20px;
    }

    &__descr {
      font-size: 14px;
    }

    &__info {
        margin-top: 50px;
        width: unset;
    }

    &__images {
      margin-top: 60px;
      margin-left: 5%;
    }

    &__block {
      width: 235px;
      height: 235px;
    }

    &__img {
      &:nth-child(2) {
        
        width: 115px;
        height: 170px;
        left: 75%;
      }

      &:first-child {
        position: absolute;
        width: 135px;
        left: 7%;
        height: 200px;
      }
    }

    &__soup {
      width: 200px;
      &-left {
        top: 100%;
        left: 0;
      }

      &-right {
        top: 100%;
        right: 0;
      }
    }
  }
}
</style>