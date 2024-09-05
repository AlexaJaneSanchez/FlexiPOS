<template>
    <div>
        <NuxtLayout name="admin">
          
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
                    
                    <!-- Add Product Button -->
                    <button @click="toggleForm" type="button" class="rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                        <PlusIcon class="h-3 w-3" aria-hidden="true" />
                        Add Categories
                    </button>
                </div>

        <!-- Category Form -->
        <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <form @submit.prevent="submitCategory" class="flex flex-col space-y-4">
                    <div class="flex items-center">
                        <label for="categoryName" class="text-xxs font-medium text-gray-700 w-24">Category Name</label>
                        <input
                            id="categoryName"
                            v-model="newCategoryName"
                            type="text"
                            class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                            required
                        />
                    </div>
                    <div class="flex items-center">
                        <label for="categoryStatus" class="text-xxs font-medium text-gray-700 w-24">Status</label>
                        <select
                            id="categoryStatus"
                            v-model="newCategoryStatus"
                            class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs px-4 py-2"
                            required
                        >
                            <option value="Active">Active</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button
                            type="submit"
                            class="rounded-md bg-gray-900 px-4 py-2 text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                        >
                            Add
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

        <!-- Category Table -->
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md mt-2 rounded-b-lg">
                <thead>
                    <tr class="text-left">
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tl-lg">Id</th>
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Category Name</th>
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Status</th>
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Created</th>
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Updated</th>
                        <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    <tr v-for="(category, index) in paginatedCategories" :key="index" class="border-t bg-gray-50">
                        <td class="px-4 py-2 text-xxs text-gray-700">{{ index + 1 + (currentPage - 1) * itemsPerPage }}</td>
                        <td class="px-4 py-2 text-xxs text-gray-700">{{ category.name }}</td>
                        <td class="px-4 py-2 text-xxs text-gray-700">
                            <span :class="{'text-green-500': category.status === 'Active', 'text-red-500': category.status === 'Offline'}">
                                {{ category.status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-xxs text-gray-700">{{ formatTimestamp(category.createdAt) }}</td>
                        <td class="px-4 py-2 text-xxs text-gray-700">{{ formatTimestamp(category.updatedAt) }}</td>
                        <td class="px-4 py-2 text-xxs text-gray-700">
                            <div class="flex space-x-2">
                                <button @click="editCategory(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                                    </svg>
                                </button>
                                <button @click="deleteCategory(index + (currentPage - 1) * itemsPerPage)" class="text-red-600 hover:text-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="categories.length === 0">
                        <td colspan="6" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No categories available.</td>
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
                        class="px-4 py-2 text-xxs font-semibold text-gray-900 bg-gray-200 rounded-md hover:bg-gray-300 disabled:bg-gray-100">
                        Previous
                    </button>
                    <button
                        @click="nextPage"
                        :disabled="currentPage === totalPages"
                        class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 disabled:bg-gray-700">
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
const newCategoryName = ref('');
const newCategoryStatus = ref('Active');
const categories = ref<Array<{ name: string, status: string, createdAt: number, updatedAt: number }>>([]);
const currentPage = ref(1);
const itemsPerPage = 10;
let editingIndex = ref<number | null>(null);

const totalPages = computed(() => Math.ceil(categories.value.length / itemsPerPage));

const paginatedCategories = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return categories.value.slice(start, end);
});

function toggleForm() {
    showForm.value = !showForm.value;
    if (!showForm.value) {
        editingIndex.value = null; 
        newCategoryName.value = ''; 
        newCategoryStatus.value = 'Active'; 
    }
}

function submitCategory() {
    const timestamp = Date.now();
    if (newCategoryName.value.trim() !== '') {
        if (editingIndex.value !== null) {
            // Update the existing category.
            const category = categories.value[editingIndex.value];
            category.name = newCategoryName.value.trim();
            category.status = newCategoryStatus.value;
            category.updatedAt = timestamp; // Update the timestamp.
            editingIndex.value = null;
        } else {
            // Add a new category.
            const newCategory = {
                name: newCategoryName.value.trim(),
                status: newCategoryStatus.value,
                createdAt: timestamp,
                updatedAt: timestamp // Set createdAt and updatedAt to the same timestamp.
            };
            categories.value.push(newCategory);
        }
        newCategoryName.value = '';
        newCategoryStatus.value = 'Active'; 
    }
    showForm.value = false;
}

function editCategory(index: number) {
    const category = categories.value[index];
    newCategoryName.value = category.name;
    newCategoryStatus.value = category.status; 
    editingIndex.value = index; 
    showForm.value = true; 
}

function deleteCategory(index: number) {
    categories.value.splice(index, 1);
}

function formatTimestamp(timestamp: number) {
    return new Date(timestamp).toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
    });
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
