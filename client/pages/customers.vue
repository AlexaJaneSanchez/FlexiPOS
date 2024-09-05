<template>
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
                
                <!-- Product Button -->
                 <button @click="toggleForm" type="button" class="rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                    <PlusIcon class="h-3 w-3" aria-hidden="true" />
                    New Customers
                </button>
            </div>
            
            <!-- Customer Form -->
             <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                     <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                         <form @submit.prevent="submitCustomer">
                             <div class="grid grid-cols-1 gap-4">
                                 <div class="flex items-center">
                                     <label for="firstName" class="text-xxs font-medium text-gray-700 w-24">First Name</label>
                                     <input
                                        id="firstName"
                                        v-model="customer.firstName"
                                        type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                        required
                                        />
                                    </div>
                                    <div class="flex items-center">
                                        <label for="lastName" class="text-xxs font-medium text-gray-700 w-24">Last Name</label>
                                        <input
                                        id="lastName"
                                        v-model="customer.lastName"
                                        type="text"
                                        class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                        required
                                         />
                                        </div>
                                        <div class="flex items-center">
                                            <label for="email" class="text-xxs font-medium text-gray-700 w-24">Email</label>
                                            <input
                                                id="email"
                                                v-model="customer.email"
                                                type="text"
                                                class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                            />
                                        </div>
                                        <div class="flex items-center">
                                            <label for="phoneNumber" class="text-xxs font-medium text-gray-700 w-24">Phone Number</label>
                                            <input
                                                id="phoneNumber"
                                                v-model="customer.phoneNumber"
                                                type="text"
                                                class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                            />
                                        </div>
                                        <div class="flex items-center">
                                            <label for="billingAddress" class="text-xxs font-medium text-gray-700 w-24">Billing Address</label>
                                            <input
                                                id="billingAddress"
                                                v-model="customer.billingAddress"
                                                type="text"
                                                class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                            />
                                        </div>
                                        <div class="flex items-center">
                                            <label for="status" class="text-xxs font-medium text-gray-700 w-24">Status</label>
                                            <select
                                                id="status"
                                                v-model="customer.status"
                                                class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-3 py-2"
                                            >
                                                <option value="Active">Active</option>
                                                <option value="Offline">Offline</option>
                                            </select>
                                        </div>
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
                                </form>
                            </div>
                        </div>
                        
                        <!-- Customers List Table -->
                         <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg shadow-md mt-2 rounded-b-lg">
                                <thead>
                                    <tr class="text-left">
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tl-lg">Id</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">First Name</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Last Name</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Email</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Phone Number</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Created Date</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Billing Address</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Status</th>
                                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <tr v-for="(customer, index) in paginatedCustomers" :key="index" class="border-t bg-gray-50">
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ index + 1 + (currentPage - 1) * itemsPerPage }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.firstName }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.lastName }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.email }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.phoneNumber }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.createdDate }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">{{ customer.billingAddress }}</td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">
                                            <span :class="{'text-green-500': customer.status === 'Active', 'text-red-500': customer.status === 'Offline'}">
                                                {{ customer.status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 text-xxs text-gray-700">
                                            <div class="flex space-x-2">
                                            <button @click="editCustomer(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                                                </svg>
                                            </button>
                                            <button @click="deleteCustomer(index + (currentPage - 1) * itemsPerPage)" class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="customers.length === 0">
                                    <td colspan="9" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No customers available.</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- Page -->
                         <div class="flex justify-between items-center mt-4">
                            <span class="text-xxs text-gray-700 ml-1">Page {{ currentPage }} of {{ totalPages }}</span>
                            <div class="flex space-x-2">
                                <button
                                @click="previousPage"
                                :disabled="currentPage === 1"
                                class="px-4 py-2 text-xxs font-semibold text-gray-900 bg-gray-200 rounded-md hover:bg-gray-300 disabled:bg-gray-100"
                                >
                                Previous
                            </button>
                            <button
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 disabled:bg-gray-700"
                            >
                            Next
                        </button>
                    </div>
                </div>
            </div>
         </main>
        </NuxtLayout>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { PlusIcon } from '@heroicons/vue/24/outline';

const showForm = ref(false);
const customer = ref({
    firstName: '',
    lastName: '',
    email: '',
    phoneNumber: '',
    billingAddress: '',
    status: 'Active',
    createdDate: formatDate(new Date())
});
const customers = ref<Array<{
    firstName: string,
    lastName: string,
    email: string,
    phoneNumber: string,
    billingAddress: string,
    status: string,
    createdDate: string
}>>([]);

const currentPage = ref(1);
const itemsPerPage = 10;
let editingIndex = ref<number | null>(null);

const totalPages = computed(() => Math.ceil(customers.value.length / itemsPerPage));

const paginatedCustomers = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return customers.value.slice(start, end);
});

function toggleForm() {
    showForm.value = !showForm.value;
    if (!showForm.value) {
        editingIndex.value = null;
        resetCustomerForm();
    }
}

function resetCustomerForm() {
    customer.value = {
        firstName: '',
        lastName: '',
        email: '',
        phoneNumber: '',
        billingAddress: '',
        status: 'Active',
        createdDate: formatDate(new Date()) 
    };
}

function submitCustomer() {
    if (isCustomerFormValid()) {
        if (editingIndex.value !== null) {
            customers.value[editingIndex.value] = { ...customer.value };
            editingIndex.value = null; 
        } else {
            customers.value.push({ ...customer.value, createdDate: formatDate(new Date()) });
        }
        resetCustomerForm();
        showForm.value = false;
    }
}

function isCustomerFormValid() {
    return customer.value.firstName.trim() !== '' &&
           customer.value.lastName.trim() !== '';
}

function editCustomer(index: number) {
    customer.value = { ...customers.value[index] };
    editingIndex.value = index; 
    showForm.value = true; 
}

function deleteCustomer(index: number) {
    customers.value.splice(index, 1);
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

function formatDate(date: Date): string {
    return date.toLocaleDateString('en-US', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
}
</script>
