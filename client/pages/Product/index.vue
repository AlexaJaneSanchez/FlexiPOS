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

        
                    
                    <button @click="AddProducts" type="button" 
    	             class="flex items-center justify-center gap-2 rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                      <PlusIcon class="h-3 w-3" aria-hidden="true" />
                          Add Product
                    </button>



                    </div>
            <div>
                <Alert type="danger" :text="state.error?.message" v-if="state.error" />
                <div class="table-responsive">
                    <Table :columnHeaders="state.columnHeaders" :data="state.products" :isLoading="state.isTableLoading"
                        :sortData="state.sortData" @sort="sort">
                        <template #body
                            v-if="!(state.isTableLoading || (state.products?.data && state.products?.data.length === 0))">
                            <tr v-for="(product, index) in state.products?.data" :key="index">
                                <td>
                                    <span>{{ product.productcategory}}</span>
                                </td>

                                <td>
                                    <span>{{ product.productname}}</span>
                                </td>

                                <td>
                                    <span>{{ product.brandname }}</span>
                                </td>
                                <td>
                                    <span>{{ product.wholesale}}</span>
                                </td>
                                <td>
                                    <span>{{ product.retailunit}}</span>
                                </td>
		
                                <td>
                                    <span>{{ product.retailquantity}}</span>
                                </td>
		
                                <td>
                                    <span>{{ product.reorderpoint}}</span>
                                </td>
		
                                <td>
                                    <span>{{ product.markup}}</span>
                                </td>
	
                                <td>
                                    <span>{{ product.quantityonhand}}</span>
                                </td>

                                <td class="flex">
                                  <FormButtons type="submit" buttonStyle="primary" class="w-full mr-2" @click="editProduct(product)">
                                        Edit
                                    </FormButtons> 
	                        <FormButtons type="submit" buttonStyle="primary" class="w-full" @click="deleteProduct(product.id)">
                                        Delete
                                    </FormButtons> 
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
import { productService } from '@/components/api/admin/ProductService'
import { PlusIcon } from '@heroicons/vue/24/outline';
import { useRouter } from 'vue-router';

const router = useRouter();

const runtimeConfig = useRuntimeConfig();
let currentTablePage = 1;

// Define the structure of the error object
interface ErrorType {
  message: string;
}

const state = reactive({
    columnHeaders: [
        { name: 'PruductCategory' },
        { name: 'Productname' },
        { name: 'BrandName' },
        { name: 'WholeSale' },
        { name: 'RetailUnit' },
        { name: 'RetailQtyPerWholeSaleUnit' },
        { name: 'Reorder' },
        { name: 'Markup' },
        { name: 'QuantityOnhand' },
        { name: '' },
    ],
    error: null as ErrorType | null,
    isTableLoading: false,
    sortData: {
        sortField: 'id',
        sortOrder: 'ascend',
    },
    products: {
        data: [] as any[], // Declare products as an object with a 'data' array
    },
    dataFilter: '',
});


onMounted(() => {
    fetchProducts();
});

function AddProducts() {
    router.push('/admin/dashboard/AddProducts');
}

function editProduct(product: any): any {
    productService.setId(product.id);
    productService.setProductCategory(product.productcategory);
    productService.setProductName(product.productname);
    productService.setBrandName(product.brandname);
    productService.setWholesaleUnit(product.wholesaleunit);
    productService.setRetailUnit(product.retailunit);
    productService.setRetailQtyPerWholesaleUnit(product.retailqtyperwholesaleunit);
    productService.setReorderPoint(product.reorderpoint); 
    productService.setMarkup(product.markup);
    productService.setQuantityOnHand(product.quantityonhand);
    //navigateTo('/admin/products/editProduct/');
}

async function deleteProduct(id: any) {
    const params = {};
    const response = await productService.deleteProduct(params, id);
    fetchProducts();

    if (response != null) {
        alert('Delete Successfully!');
        navigateTo('/admin/products');
    }
}

async function fetchProducts() {
    state.isTableLoading = true;
    state.error = null;
    try {
        const params = {
            page: currentTablePage,
            sortField: state.sortData.sortField,
            sortOrder: state.sortData.sortOrder,
        };

        const response = await productService.getProducts(params);
        // Assuming the API response contains a 'data' field
        state.products = response;
    } catch (error: any) {
        state.error = error as ErrorType;
    }
    state.isTableLoading = false;
}


function previous() {
    currentTablePage--;
    fetchProducts();
}

function next() {
    currentTablePage++;
    fetchProducts();
}

function sort(sortingData: any) {
    currentTablePage = 1;
    state.sortData = {
        sortField: sortingData.column,
        sortOrder: sortingData.sort,
    };
    fetchProducts();
}

function handleFilter(value: any) {
    currentTablePage = 1;
    state.dataFilter = value;
    fetchProducts();
}
</script>