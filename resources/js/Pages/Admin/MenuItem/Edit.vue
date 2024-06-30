<template>
  <MainContainer>
    <div>
      <h1>Изменить позицию меню</h1>
      <form @submit.prevent="update">
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
        <input id="isFavourite" type="checkbox" :checked="props.menuItem.is_favourite" v-model="form.is_favourite" />

        <button type="submit">Изменить</button>
      </form>
    </div>
  </MainContainer>
</template>

<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
import { Link, router, useForm } from "@inertiajs/vue3";

const props = defineProps({
  menuItem: Object,
  categories: Array
});

const form = useForm({
  _method: "put",
  name: props.menuItem.name,
  ingredients: props.menuItem.ingredients,
  weight: props.menuItem.weight,
  price: props.menuItem.price,
  is_favourite: props.menuItem.is_favourite,
  category_id: props.menuItem.category_id,
  image_path: props.menuItem.image_path,
});

function update() {
  router.post(`/admin/menu-items/${props.menuItem.id}`, form);
}
</script>