 <template>
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
</template>

<script setup lang="ts">

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
function toggleForm() {
    showForm.value = !showForm.value;
}
const products = ref<Array<typeof product.value>>([]);

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
</script>