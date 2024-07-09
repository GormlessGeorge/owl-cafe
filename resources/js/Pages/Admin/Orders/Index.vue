<template>
  <MainContainer>
    <h1>Панель администратора</h1>
    <div class="orders">
      <div class="order" v-for="order in orders" :key="order.id">
        <p>{{ order.name }}</p>
        <p>{{ order.delivery_type }}</p>
        <p>{{ order.payment_type }}</p>
        <p>{{ order.total_payment }}</p>
        <!-- <p>{{ order.quantity }}</p> -->
        <li v-for="menuItem in order.menu_items" :key="menuItem.id">
          {{ menuItem.name }} (Количество: {{ menuItem.pivot.quantity }})
        </li>
      </div>
    </div>
  </MainContainer>
</template>

<script setup>
import MainContainer from "@/Layouts/MainContainer.vue";
import { Link } from "@inertiajs/vue3";
defineProps({
  orders: Array,
});
</script>

<style scoped lang="scss">
.orders {
  display: flex;
  flex-wrap: wrap;
}
.order {
  height: 300px;
  width: 300px;
  background-color: lightgray;
}
</style>