<template>
    <MainContainer>
      <div>
        <h1>Создать новую категорию</h1>
        <form @submit.prevent="update">
          <label for="name">Имя категории</label>
          <input id="name" v-model="form.name" type="text" required>
  
          <button type="submit">Update</button>
        </form>
        
      </div>
    </MainContainer>
  </template>
  
  <script setup>
  import MainContainer from "@/Layouts/MainContainer.vue";
  import { Link, router, useForm } from "@inertiajs/vue3";
  
  const props = defineProps({
    category: Object
  });
  
  const form = useForm({
    name: props.category.name,
  })
  
  function update() {
      router.put(`/admin/categories/${props.category.id}`, form);
  }
  </script>