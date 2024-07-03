<template>

    <div class="container">
        <slot></slot>
    </div>
</template>

<style scoped lang="scss">
.container {
    max-width: 1200px;
    margin: 0 auto;
}

@media (max-width: 575px) {
  .container {
    max-width: 320px;
  }
}
</style>