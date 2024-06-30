<template>
    <div class="input-wrapper input-wrapper__name">
        <label for="name"></label>
        <input name="name" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="text" required maxlength="60">
        <p class="input-wrapper__text" ref="nameSpan">Имя получателя<span> *</span></p>
    </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
defineProps({
    shoppingCart: Object
});

const mySpan = ref(null);

const moveTextUp = (event) => {
    event.target.nextElementSibling.classList.add('active');
};

const moveTextDown = (event) => {
    if (event.target.value === '') {
        event.target.nextElementSibling.classList.remove('active');
    }
};
</script>



<style scoped lang="scss"></style>