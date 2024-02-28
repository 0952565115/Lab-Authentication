<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

var { products } = defineProps(['products']);
</script>

<template>
    <AppLayout title="Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product
            </h2>
        </template>
        <div class="product grid grid-cols-3 gap-4">
        <div v-for="item in products" :key="item.id" class="product-item bg-white p-9 rounded shadow">
            <div class="text-lg font-bold">{{ item.product_name }}</div>
            <div><span class="content">Product ID :</span> {{ item.product_code }}</div>
            <div><span class="content">Price :</span> {{ item.price }} $</div>
            <div><span class="content">Quantity :</span> {{ item.quantity }}</div>
            <div><span class="content">Description :</span>{{ item.description }}</div>
        </div>
    </div>
    </AppLayout>
</template>

<style scoped>
.product {
    margin: 15px;
}

</style>