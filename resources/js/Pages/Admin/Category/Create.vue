<template>
  <MainContainer>
    <div>
      <h1>Создать новую категорию</h1>
      <form @submit.prevent="create">
        <label for="name">Имя категории</label>
        <input id="name" v-model="form.name" type="text" required>

        <button type="submit">Create</button>
      </form>
      
    </div>
  </MainContainer>
</template>

<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
import { Link, router, useForm } from "@inertiajs/vue3";



const form = useForm({
  name: '',
})

function create() {
    router.post('/admin/categories', form);
}
</script>