<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import TextInput from '@/Shared/TextInput.vue';
import LoadingButton from '@/Shared/LoadingButton.vue';

export default {
    components: {
        AppLayout,
        Link,
        TextInput,
        LoadingButton,
    },
    props: {
        product: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.product.name,
                base_price: this.product.base_price,
                discount_price: this.product.discount_price,
                description: this.product.description,
            }),
            errors: null,
        }
    },
    methods: {
        updateProduct(product) {
            this.form.patch(route('products.update', product));
        },
        goBack() {
            this.$inertia.get(route('products.index'));
        }
    },
}
</script>

<template>
    <AppLayout title="Stwórz produkt">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-6 mx-4 rounded" @click="goBack()">Go back</button>
        <div v-if="form.errors.length!=0" class="bg-red-500 text-white pr-0 rounded font-bold mb-4 shadow-lg">
            <div v-for="error in form.errors">
                {{ error }}
            </div>
        </div>
        <form @submit.prevent="updateProduct(product)">
            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
                <text-input v-model="form.base_price" :error="form.errors.base_price" class="pb-8 pr-6 w-full lg:w-1/2" label="Base Price" />
                <text-input v-model="form.discount_price" :error="form.errors.discount_price" class="pb-8 pr-6 w-full lg:w-1/2" label="Discount Price" />
                <text-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-1/2" label="Description" />
            </div>
            <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                <loading-button :loading="form.processing" class="bg-indigo-500 hover:bg-indigo-700 rounded font-bold text-white" type="submit">Edit Product</loading-button>
            </div>
        </form>
    </AppLayout>
</template>
