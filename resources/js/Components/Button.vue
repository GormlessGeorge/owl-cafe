<template>
  <button class="btn" :class="buttonClass">
    <slot></slot>
  </button>
</template>

<script setup>
defineProps({
  buttonClass: {
    type: String,
  },
});
</script>

<style scoped lang="scss">
.btn {
  display: block;
  height: 54px;
  font-size: 18px;
  font-weight: 600;
  border-radius: 6px;
  color: var(--background-color);
  background-color: var(--primary-color);
  cursor: pointer;
  border-color: transparent;
  transition: 0.3s all ease-in-out;
  &:hover {
    color: var(--primary-color);
    background-color: var(--background-color);
    border: 2px solid var(--primary-color);
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
  }

  &__hero {
    margin-top: 35px;
    width: 225px;
  }

  &__about {
    width: 225px;
    margin: 35px auto 0 auto;
  }
  &__rec {
    width: 200px;
    margin: 0 auto;
    margin-top: 50px;
  }
  &__events {
    width: 225px;
    margin: 35px auto 0 auto;
  }

  &__cart {
    width: 200px;
    margin-top: 20px;
  }
}

@media (max-width: 575px) {
  .btn {
    height: 44px;
    font-size: 16px;
    &__hero {
      margin-top: 35px;
      width: 180px;
    }
    &__about {
      width: 180px;
    }
    &__rec {
      width: 160px;
    }
  }
}
</style>