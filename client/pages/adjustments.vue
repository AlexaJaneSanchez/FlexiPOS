<template>
<div>
        <NuxtLayout name="admin">
        
    <div>
        <main>
            <!-- Search and Add Product Button Container -->
            <div class="relative flex items-center space-x-4 mt-3">
                <!-- Search Bar -->
                <div class="relative flex flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z" clip-rule="evenodd"/>
                    </svg>
                    <input type="text" placeholder="Search" class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5"/>
                </div>
                
                <!-- Export Buttons -->
                <Formbutton type="button" class="rounded-md border border-gray-900 px-3 py-2 text-center text-xxs font-semibold text-gray-900 hover:text-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                    <DocumentChartBarIcon class="h-4 w-4" aria-hidden="true" />
                    EXCEL
                </Formbutton>
                
                <Formbutton @click="toggleForm" type="button" class="rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                    Create
                </Formbutton>
            </div>

            <!-- Customer Form -->
            <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                    <form @submit.prevent="submitAdjustment">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="flex items-center">
                                <label for="date" class="text-xxs font-medium text-gray-700 w-24">Date</label>
                                <input
                                    id="date"
                                    v-model="adjustments.date"
                                    type="text"
                                    class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                    required
                                />
                            </div>
                            <div class="flex items-center">
                                <label for="reference" class="text-xxs font-medium text-gray-700 w-24">Reference</label>
                                <input
                                    id="reference"
                                    v-model="adjustments.reference"
                                    type="text"
                                    class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                    required
                                />
                            </div>
                            <div class="flex items-center">
                                <label for="warehouse" class="text-xxs font-medium text-gray-700 w-24">Warehouse</label>
                                <input
                                    id="warehouse"
                                    v-model="adjustments.warehouse"
                                    type="text"
                                    class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                />
                            </div>
                            <div class="flex items-center">
                                <label for="totalProduct" class="text-xxs font-medium text-gray-700 w-24">Total Product</label>
                                <input
                                    id="totalProduct"
                                    v-model.number="adjustments.totalProduct"  
                                    type="number"
                                    step="1" 
                                    class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                />
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <button
                                type="submit"
                                class="rounded-md bg-gray-900 px-4 py-2 text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                            >
                                Save
                            </button>
                            <Formbutton
                                @click="toggleForm"
                                type="button"
                                class="rounded-md bg-gray-200 px-4 py-2 text-xxs font-semibold text-gray-700 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300"
                            >
                                Cancel
                            </Formbutton>
                        </div>
                    </form>
                </div>
            </div>

         <!-- View Adjustment Form -->
<div v-if="showViewModal" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h3 class="text-lg font-medium text-gray-900 mb-4 text-center text-white bg-gray-900 rounded-lg">ADJUSTMENT DETAILS</h3>

        <div class="grid grid-cols-1 gap-6 mt-6 ml-12">
            <div class="flex items-center">
                <label class="text-sm font-medium text-gray-700 w-28 mt-6">Date:</label>
                <span class="block text-sm font-semibold mt-6">{{ currentAdjustment.date }}</span>
            </div>
            <div class="flex items-center">
                <label class="text-sm font-medium text-gray-700 w-28">Reference:</label>
                <span class="block text-sm font-semibold">{{ currentAdjustment.reference }}</span>
            </div>
            <div class="flex items-center">
                <label class="text-sm font-medium text-gray-700 w-28">Warehouse:</label>
                <span class="block text-sm font-semibold">{{ currentAdjustment.warehouse }}</span>
            </div>
            <div class="flex items-center">
                <label class="text-sm font-medium text-gray-700 w-28 mb-6">Total Product:</label>
                <span class="block text-sm font-semibold">{{ currentAdjustment.totalProduct }}</span>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <Formbutton
                @click="toggleViewModal"
                type="button"
                class="rounded-md bg-gray-200 px-6 py-3 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300"
            >
                Close
            </Formbutton>
        </div>
    </div>
</div>


            <!-- Customers List Table -->
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white shadow-md mt-2 rounded-t-lg">
                    <thead>
                        <tr class="text-left">
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tl-lg">Date</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Reference</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Warehouse</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Total Product</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        <tr v-for="(adjustment, index) in paginatedAdjustments" :key="index" class="border-t bg-gray-50">
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ adjustment.date }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ adjustment.reference }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ adjustment.warehouse }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ adjustment.totalProduct }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">
                                <div class="flex space-x-2">
                                    <button @click="viewAdjustment(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 3a7 7 0 00-7 7 7 7 0 007 7 7 7 0 007-7 7 7 0 00-7-7zm0 12a5 5 0 110-10 5 5 0 010 10zm0-8a3 3 0 100 6 3 3 0 000-6z"/>
                                        </svg>
                                    </button>
                                    <button @click="editAdjustment(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                                        </svg>
                                    </button>
                                    <button @click="deleteAdjustment(index + (currentPage - 1) * itemsPerPage)" class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="customers.length === 0">
                            <td colspan="5" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No adjustment available.</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Page Controls -->
                <div class="flex justify-between items-center mt-4">
                    <span class="text-xxs text-gray-700 ml-1">Page {{ currentPage }} of {{ totalPages }}</span>
                    <div class="flex space-x-2">
                        <Formbutton
                            @click="previousPage"
                            :disabled="currentPage === 1"
                            class="px-4 py-2 text-xxs font-semibold text-gray-900 bg-gray-200 rounded-md hover:bg-gray-300 disabled:bg-gray-100"
                        >
                            Previous
                        </Formbutton>
                        <Formbutton
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 disabled:bg-gray-700"
                        >
                            Next
                        </Formbutton>
                    </div>
                </div>
            </div>
        </main>
    </div>

        </NuxtLayout>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { DocumentChartBarIcon } from '@heroicons/vue/24/outline';

const showForm = ref(false);
const showViewModal = ref(false);
const adjustments = ref({
    date: formatDate(new Date()),
    reference: '',
    warehouse: '',
    totalProduct: '',
});
const currentAdjustment = ref({
    date: '',
    reference: '',
    warehouse: '',
    totalProduct: '',
});
const customers = ref<Array<{
    date: string,
    reference: string,
    warehouse: string,
    totalProduct: string,
}>>([]);

const currentPage = ref(1);
const itemsPerPage = 10;
let editingIndex = ref<number | null>(null);

const totalPages = computed(() => Math.ceil(customers.value.length / itemsPerPage));

const paginatedAdjustments = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return customers.value.slice(start, end);
});

function toggleForm() {
    showForm.value = !showForm.value;
    if (!showForm.value) {
        editingIndex.value = null;
        resetAdjustmentForm();
    }
}

function toggleViewModal() {
    showViewModal.value = !showViewModal.value;
}

function resetAdjustmentForm() {
    adjustments.value = {
        date: formatDate(new Date()),
        reference: '',
        warehouse: '',
        totalProduct: '',
    };
}

function submitAdjustment() {
    if (isAdjustmentFormValid()) {
        if (editingIndex.value !== null) {
            // Update the existing adjustment.
            customers.value[editingIndex.value] = { ...adjustments.value };
            editingIndex.value = null;
        } else {
            // Add a new adjustment.
            customers.value.push({ ...adjustments.value });
        }
        resetAdjustmentForm();
        showForm.value = false;
    }
}

function isAdjustmentFormValid() {
    return adjustments.value.date.trim() !== '' &&
           adjustments.value.reference.trim() !== '';
}

function editAdjustment(index: number) {
    adjustments.value = { ...customers.value[index] };
    editingIndex.value = index;
    showForm.value = true;
}

function deleteAdjustment(index: number) {
    customers.value.splice(index, 1);
}

function viewAdjustment(index: number) {
    currentAdjustment.value = customers.value[index];
    showViewModal.value = true;
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

// Format date to 'dd MMM yyyy'
function formatDate(date: Date): string {
    return date.toLocaleDateString('en-US', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
}
</script>
