<template>
    <button class="btn" :class="buttonClass">
        <slot></slot>
    </button>
</template>

<script setup>

</script>
<style scoped lang="scss">
.btn {
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
        margin-top: 65px;
        width: 225px;
    }
}
</style>