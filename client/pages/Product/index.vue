<template>
    <div>
        <NuxtLayout name="admin">
            <main>
                <div class="relative flex items-center space-x-4 mt-3">
                    <!-- Search Bar -->
                    <div class="relative flex flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z" clip-rule="evenodd"/>
                        </svg>
                        <input type="text" placeholder="Search" class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5"/>
                    </div>
                    
                    <!-- Add Product Button -->
                    <button @click="toggleForm" type="button" class="rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                        <PlusIcon class="h-3 w-3" aria-hidden="true" />
                        Add Product
                    </button>
                </div>
                 <!-- Product Form -->
                 <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <form @submit.prevent="submitProduct">
            <div class="grid grid-cols-1 gap-1 mt-3 mx-2">
                <div class="flex items-center mb-1 ml-7">
                    <label for="categoryNo" class="text-xxs font-medium text-gray-700 w-20 mr-2">Category No.</label>
                    <input
                        id="categoryNo"
                        v-model="product.categoryNo"
                        type="text"
                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                        required
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="productName" class="text-xxs font-medium text-gray-700 w-20 mr-2">Product Name</label>
                    <input
                        id="productName"
                        v-model="product.productName"
                        type="text"
                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                        required
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="brandName" class="text-xxs font-medium text-gray-700 w-20 mr-2">Brand Name</label>
                    <input
                        id="brandName"
                        v-model="product.brandName"
                        type="text"
                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="wholeSale" class="text-xxs font-medium text-gray-700 w-20 mr-2">Whole Sale</label>
                    <input
                        id="wholeSale"
                        v-model="product.wholeSale"
                        type="text"
                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="retailUnit" class="text-xxs font-medium text-gray-700 w-20 mr-2">Retail Unit</label>
                    <input
                        id="retailUnit"
                        v-model="product.retailUnit"
                        type="text"
                        class="block flex rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="retailQuantity" class="text-xxs font-medium text-gray-700 w-20 mr-2">Retail Quantity</label>
                    <input
                        id="retailQuantity"
                        v-model="product.retailQuantity"
                        type="number"
                        class="block flex rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="reorder" class="text-xxs font-medium text-gray-700 w-20 mr-2">Reorder</label>
                    <input
                        id="reorder"
                        v-model="product.reorder"
                        type="number"
                        class="block flex rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="markup" class="text-xxs font-medium text-gray-700 w-20 mr-2">Markup</label>
                    <input
                        id="markup"
                        v-model="product.markup"
                        type="number"
                        class="block flex rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex items-center mb-1  ml-7">
                    <label for="quantityOnHand" class="text-xxs font-medium text-gray-700 w-20 mr-2">Quantity On-Hand</label>
                    <input
                        id="quantityOnHand"
                        v-model="product.quantityOnHand"
                        type="number"
                        class="block flex rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                    />
                </div>
                <div class="flex justify-end gap-2 mt-4">
                            <button
                                type="submit"
                                class="rounded-md bg-gray-900 px-4 py-2 text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                            >
                                Save
                            </button>
                            <button
                                @click="toggleForm"
                                type="button"
                                class="rounded-md bg-gray-200 px-4 py-2 text-xxs font-semibold text-gray-700 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300"
                            >
                                Cancel
                            </button>
                        </div>
            </div>
        </form>
    </div>
</div> 


                <!-- Product Table -->
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-md mt-3 rounded-b-lg">
                        <thead>
                            <tr class="text-left">
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tl-lg">Id</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Category No.</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Product Name</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Brand Name</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Whole Sale</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Retail Unit</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Retail Qty</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Re-order</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Markup</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">On-hand</th>
                                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-100">
                            <tr v-for="(product, index) in paginatedProducts" :key="index" class="border-t bg-gray-50">
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ index + 1 + (currentPage - 1) * itemsPerPage }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.categoryNo }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.productName }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.brandName }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.wholeSale }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.retailUnit }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.retailQuantity }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.reorder }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.markup }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">{{ product.quantityOnHand }}</td>
                                <td class="px-4 py-2 text-xxs text-gray-700">
                                    <div class="flex space-x-2">
                                        <button @click="editProduct(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                                            </svg>
                                        </button>
                                        <button @click="deleteProduct(index + (currentPage - 1) * itemsPerPage)" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="products.length === 0">
                                <td colspan="10" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No products available.</td>
                                <td class="bg-gray-100"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination Controls -->
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xxs text-gray-700 ml-1">Page {{ currentPage }} of {{ totalPages }}</span>
                        <div class="flex space-x-2">
                            <button
                                @click="previousPage"
                                :disabled="currentPage === 1"
                                class="px-4 py-2 text-xxs font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 disabled:bg-gray-100"
                            >
                                Previous
                            </button>
                            <button @click="nextPage" :disabled="currentPage === itemsPerPage" class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 disabled:bg-gray-700">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </NuxtLayout>
    </div>
</template>


<script setup lang="ts">
import { ref, computed } from 'vue';
import { PlusIcon } from '@heroicons/vue/24/outline';

const showForm = ref(false);
const product = ref({
    categoryNo: '',
    productName: '',
    brandName: '',
    wholeSale: '',
    retailUnit: '',
    retailQuantity: 0,
    reorder: 0,
    markup: 0,
    quantityOnHand: 0
});
const products = ref<Array<typeof product.value>>([]);
const currentPage = ref(1);
const itemsPerPage = 10;

const totalPages = computed(() => Math.ceil(products.value.length / itemsPerPage));

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return products.value.slice(start, end);
});

function toggleForm() {
    showForm.value = !showForm.value;
}

function submitProduct() {
    if (product.value.productName.trim() !== '') {
        const newProduct = { ...product.value };
        products.value.push(newProduct);
        resetForm();
    }
    showForm.value = false;
}

function resetForm() {
    product.value = {
        categoryNo: '',
        productName: '',
        brandName: '',
        wholeSale: '',
        retailUnit: '',
        retailQuantity: 0,
        reorder: 0,
        markup: 0,
        quantityOnHand: 0
    };
}

function editProduct(index: number) {
    const prod = products.value[index];
    product.value = { ...prod };
    showForm.value = true;
    products.value.splice(index, 1);
}

function deleteProduct(index: number) {
    products.value.splice(index, 1);
}

function previousPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}

function nextPage() {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
}
</script>
`
`