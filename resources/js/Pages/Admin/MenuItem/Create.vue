<template>
  <MainContainer>
    <div>
      <h1>Создать новую позицию меню</h1>
      <form @submit.prevent="create">
        <label for="name">Позиция меню: </label>
        <input id="name" v-model="form.name" type="text" required />

        <label for="ingredients">Состав: </label>
        <input
          id="ingredients"
          v-model="form.ingredients"
          type="text"
          required
        />

        <label for="weight">Вес: </label>
        <input id="weight" v-model.number="form.weight" type="text" required />

        <label for="price">Цена: </label>
        <input id="price" v-model.number="form.price" type="text" required />

        <!-- <label for="category">Категория: </label>
        <input
          id="category"
          v-model.number="form.category_id"
          type="text"
          required
        /> -->

        <label for="img">Изображение</label>
        <input
          id="img"
          type="file"
          @input="form.image_path = $event.target.files[0]"
        />

        <select name="category_id" v-model="form.category_id">
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
          >
            {{ category.name }}
          </option>
        </select>

        <label for="isFavourite">Избранное:</label>
        <input id="isFavourite" type="checkbox" v-model="form.is_favourite" />

        <button type="submit">Создать</button>
      </form>
    </div>
  </MainContainer>
</template>

<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
import { Link, router, useForm } from "@inertiajs/vue3";

defineProps({
  categories: Array,
});
const form = useForm({
  name: "",
  ingredients: "",
  weight: 0,
  price: 0,
  is_favourite: false,
  category: 0,
  image_path: null,
});

function create() {
  router.post("/admin/menu-items", form);
}
</script>