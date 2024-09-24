<template>
    <div>
        <NuxtLayout name="admin">
            <main>

                <Head>
                    <Title>Products - {{ runtimeConfig.public.appName }}</Title>
                </Head>
                <!-- Add Button and Description -->
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the products and their details.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <button type="button" @click="toggleForm"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add Product</button>
                    </div>
                </div>
                <!-- Search Bar
                 
                <div class="relative flex items-center space-x-4 mt-3">
                    <div class="relative flex flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="text" placeholder="Search"
                            class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5" />
                    </div>
                </div> -->
                <!-- Product Form -->
                <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <form @submit.prevent="saveProduct">
                            <div class="grid grid-cols-1 gap-1 mt-3 mx-2">
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="productcategory"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Category</label>
                                    <input id="productcategory" v-model="product.productcategory" type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                                        required />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="productname"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Product
                                        Name</label>
                                    <input id="productname" v-model="product.productname" type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                                        required />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="brandname" class="text-xxs font-medium text-gray-700 w-20 mr-2">Brand
                                        Name</label>
                                    <input id="brandname" v-model="product.brandname" type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="wholesaleunit"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Wholesale Unit</label>
                                    <input id="wholesaleunit" v-model="product.wholesaleunit" type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="retailunit" class="text-xxs font-medium text-gray-700 w-20 mr-2">Retail
                                        Unit</label>
                                    <input id="retailunit" v-model="product.retailunit" type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="retailqtyperwholesaleunit"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Retail Qty</label>
                                    <input id="retailqtyperwholesaleunit" v-model="product.retailqtyperwholesaleunit"
                                        type="number"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="reorderpoint"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Reorder
                                        Point</label>
                                    <input id="reorderpoint" v-model="product.reorderpoint" type="number"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="markup"
                                        class="text-xxs font-medium text-gray-700 w-20 mr-2">Markup</label>
                                    <input id="markup" v-model="product.markup" type="number"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex items-center mb-1 ml-7">
                                    <label for="quantityonhand" class="text-xxs font-medium text-gray-700 w-20 mr-2">Qty
                                        on Hand</label>
                                    <input id="quantityonhand" v-model="product.quantityonhand" type="number"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2" />
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="submit"
                                        class="rounded-md bg-gray-900 px-4 py-2 text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                        Save
                                    </button>
                                    <button @click="toggleForm" type="button"
                                        class="rounded-md bg-gray-200 px-4 py-2 text-xxs font-semibold text-gray-700 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div>
                    <Alert type="danger" :text="state.error?.message" v-if="state.error" />
                    <div class="table-responsive">
                        <Table :columnHeaders="state.columnHeaders" :data="state.products"
                            :isLoading="state.isTableLoading" :sortData="state.sortData" @sort="sort">
                            <template #body v-if="!(
                                state.isTableLoading ||
                                (state.products?.data &&
                                    state.products?.data.length === 0)
                            )">
                                <tr v-for="(product, index) in state.products?.data" :key="index">
                                    <td>
                                        <span class="truncate">{{ product.productname }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.productcategory }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.brandname }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.wholesaleunit }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.retailunit }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.retailqtyperwholesaleunit }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.reorderpoint }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.markup }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.isactive }}</span>
                                    </td>
                                    <td>
                                        <span>{{ product.quantityonhand }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">
                                        <div class="flex space-x-2">
                                            <button @click="" class="text-gray-600 hover:text-gray-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z" />
                                                </svg>
                                            </button>
                                            <button @click="deleteProduct(product.productID)"
                                                class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </Table>
                    </div>
                    <Pagination :data="state.products" @previous="previous" @next="next" />
                </div>
            </main>
        </NuxtLayout>
    </div>
</template>


<script setup lang="ts">
import { ref } from 'vue';
import { productService } from '~/components/api/ProductService';

const runtimeConfig = useRuntimeConfig();
let currentTablePage = 1;

interface SortData {
    sortField: string;
    sortOrder: "ascend" | "descend" | null;
}

interface Products {
    data: any[];
}

const state = reactive({
    columnHeaders: [
        { name: "Product Name", sorter: true, key: "productname" },
        { name: "Category", sorter: true, key: "productcategory" },
        { name: "Brand", sorter: true, key: "brandname" },
        { name: "Wholesale Unit", sorter: true, key: "wholesaleunit" },
        { name: "Retail Unit", sorter: true, key: "retailunit" },
        { name: "Retail Qty per Wholesale Unit", sorter: true, key: "retailqtyperwholesaleunit" },
        { name: "Reorder Point", sorter: true, key: "reorderpoint" },
        { name: "Markup", sorter: true, key: "markup" },
        { name: "Is Active", sorter: true, key: "isactive" },
        { name: "Quantity on Hand", sorter: true, key: "quantityonhand" },
        { name: "Actions", key: "actions" },
    ],
    error: null as Error | null,
    isTableLoading: false,
    sortData: { sortField: "", sortOrder: null } as SortData,
    products: { data: [] } as Products,
});

onMounted(() => {
    fetchProducts();
});

async function fetchProducts() {
    state.isTableLoading = true;
    state.error = null;
    try {
        const params = {
            page: currentTablePage,
            sortField: state.sortData.sortField,
            sortOrder: state.sortData.sortOrder,
        };
        const response = await productService.getProducts();
        state.products = response;
    } catch (error: any) {
        state.error = error;
    }
    state.isTableLoading = false;
}

function previous() {
    if (currentTablePage > 1) {
        currentTablePage--;
        fetchProducts();
    }
}

function next() {
    currentTablePage++;
    fetchProducts();
}

function sort(sortingData: { column: string; sort: string }) {
    currentTablePage = 1;
    if (sortingData.sort === 'ascend' || sortingData.sort === 'descend') {
        state.sortData = {
            sortField: sortingData.column,
            sortOrder: sortingData.sort,
        };
    } else {
        console.error('Invalid sort order:', sortingData.sort);
        // You can also set a default sort order here if needed
        state.sortData = {
            sortField: sortingData.column,
            sortOrder: 'ascend', // or 'descend'
        };
    }
    fetchProducts();
}

// Product form data
const product = ref({
    productcategory: '',
    productname: '',
    brandname: '',
    wholesaleunit: '',
    retailunit: '',
    retailqtyperwholesaleunit: '',
    reorderpoint: '',
    markup: '',
    isactive: false,
    quantityonhand: '',
});

// Save product function
async function saveProduct() {
    try {
        const products = {
            productcategory: product.value.productcategory,
            productname: product.value.productname,
            brandname: product.value.brandname,
            wholesaleunit: product.value.wholesaleunit,
            retailunit: product.value.retailunit,
            retailqtyperwholesaleunit: parseInt(product.value.retailqtyperwholesaleunit, 10),
            reorderpoint: parseInt(product.value.reorderpoint, 10),
            markup: parseFloat(product.value.markup).toFixed(2),
            isactive: product.value.isactive,
            quantityonhand: parseInt(product.value.quantityonhand, 10),
        };

        const response = await productService.createProduct(products);

        if (response != null) {
            alert('Product has been added!');
            fetchProducts();
            showForm.value = false;
        } else {
            alert('Product creation failed!');
            fetchProducts();
            showForm.value = false;
        }
    } catch (error: any) {
        console.error(error.message);
    }
}

// Delete product function
async function deleteProduct(productID: number) {
    try {
        const response = await productService.deleteProduct(productID);

        if (response != null) {
            alert('Product has been deleted!');
            fetchProducts(); // Refresh the product list
        } else {
            alert('Product deletion failed!');
        }
    } catch (error: any) {
        console.error(error.message);
    }
}

// // Edit product function
// function editProduct(productID: number) {
//     // Find the product with the matching ID
//     const selectedProduct = state.products.find(p => p.productID === productID);

//     if (selectedProduct) {
//         product.value = { ...selectedProduct };  // Populate the form with selected product data
//         showForm.value = true;
//     } else {
//         console.error(`Product with ID ${productID} not found.`);
//     }
// }

const showForm = ref(false);

function toggleForm() {
    showForm.value = !showForm.value;
}
</script>