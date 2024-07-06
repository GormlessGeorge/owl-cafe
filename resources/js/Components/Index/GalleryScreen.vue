<template >
  <section class="gallery">
    <MainContainer>
      <div class="gallery__wrapper">
        <img src="/img/hero_background.png" alt="gallery img" />
        <img
          class="mobile-invisible"
          src="/img/hero_background.png"
          alt="gallery img"
        />
        <img
          class="mobile-invisible"
          src="/img/hero_background.png"
          alt="gallery img"
        />
        <img
          class="mobile-invisible"
          src="/img/hero_background.png"
          alt="gallery img"
        />
      </div>

      <a class="gallery__link"
        ><img src="/icons/insta_colored.svg" />
        <p>sova_vld</p></a
      >
    </MainContainer>
  </section>
</template>
<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
</script>

<style scoped lang="scss">
.gallery {
  margin-top: 300px;
  margin-bottom: 110px;
  &__wrapper {
    display: flex;
    flex-direction: row;
    // justify-content: space-between;
    justify-content: space-between;
    img {
      display: block;
      width: 285px;
      height: 285px;
      object-fit: cover;
      border-radius: 10px;
    }
  }
  &__link {
    margin: 0 auto;
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;

    p {
      margin-left: 10px;
      display: block;
      font-weight: 700;
      font-size: 20px;
      color: var(--primary-color);
    }
  }
}
@media (max-width: 575px) {
  .gallery {
    &__wrapper {
      justify-content: center;
    }
    .mobile-invisible {
      display: none;
    }
  }
}
</style>