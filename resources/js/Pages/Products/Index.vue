<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AppLayout,
        Link,
    },
    props: {
        products: Array,
    },
    methods: {
        createProduct: function () {
            this.$inertia.get(route('products.create'));
        },
        deleteProduct(product) {
            this.$inertia.delete(route('products.destroy', product));
        },
        editProduct(product) {
            this.$inertia.get(route('products.edit', product));
        },
    },
}
</script>

<template>
    <AppLayout title="Lista produktów">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-6 mx-4 rounded" @click="createProduct(product)">Create Product</button>
        <div class="items-center text-center">
            <div class="w-3/5">
                <table class="border-2 border-stone-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 table-bordered table">
                    <thead class="border-2 border-stone-400 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="border-2 border-stone-400">Name</th>
                            <th class="border-2 border-stone-400">Price</th>
                            <th class="border-2 border-stone-400">Discount Price</th>
                            <th class="border-2 border-stone-400">Description</th>
                            <th class="border-2 border-stone-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="border-2 border-stone-400">{{ product.name }}</td>
                            <td class="border-2 border-stone-400">{{ product.base_price }}</td>
                            <td class="border-2 border-stone-400">{{ product.discount_price }}</td>
                            <td class="border-2 border-stone-400">{{ product.description }}</td>
                            <td>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold rounded" @click="editProduct(product)">Edit</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold" @click="deleteProduct(product)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-if="products.length==0">
                    <p class="text-center">No products</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
