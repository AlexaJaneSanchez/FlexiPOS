<template>
    <div>
        <NuxtLayout name="admin">
        <main>
            <div class=" flex sm:justify-end sm:mt-2 sm:flex-none">
                <button
                    @click="toggleForm"
                    type="button"
                    class="block rounded-md mt-5 bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2"
                >
                    <PlusIcon class="h-3 w-3" aria-hidden="true" />
                    Add Role
                </button>
            </div>

            <!-- Role Form -->
            <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                    <form @submit.prevent="submitRole">
                        <div class="grid grid-cols- 1 gap-4">
                            <div class="flex items-center">
                                <label for="roleName" class="text-xxs font-medium text-gray-700 w-24">Role Name</label>
                                <select
                                    id="roleName"
                                    v-model="role.roleName"
                                    class="block flex-1 rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm px-3 py-2"
                                    required
                                >
                                    <option v-for="option in roleNameOptions" :key="option" :value="option">{{ option }}</option>
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

            <!-- Roles List Table -->
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow-md mt-2 rounded-b-lg">
                    <thead>
                        <tr class="text-left">
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tl-lg">Id</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Role Name</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Access</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900">Employees</th>
                            <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        <tr v-for="role in paginatedRoles" :key="role.id" class="border-t bg-gray-50">
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ role.id }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ role.roleName }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ role.access }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">{{ role.employees.length }}</td>
                            <td class="px-4 py-2 text-xxs text-gray-700">
                                <div class="flex space-x-2">
                                    <button @click="editRole(role.id)" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                                        </svg>
                                    </button>
                                    <button @click="deleteRole(role.id)" class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H2v2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1V5h-2V4a2 2 0 00-2-2H6zm4 12a1 1 0 102 0V8a1 1 0 10-2 0v6zm-3-1a1 1 0 002 0V8a1 1 0 10-2 0v5zm8-1a1 1 0 10-2 0V8a1 1 0 102 0v5z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="roles.length === 0">
                            <td colspan="5" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No roles available.</td>
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
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { PlusIcon } from '@heroicons/vue/24/outline';

const showForm = ref(false);
const role = ref({
    id: 0,
    roleName: '',
});
const roles = ref<Array<{
    id: number,
    roleName: string,
    access: string,
    employees: string[],
}>>([
    { id: 1, roleName: 'Owner', access: 'Back Office and POS.', employees: [] },
    { id: 2, roleName: 'Administrator', access: 'Back Office and POS.', employees: [] },
    { id: 3, roleName: 'Manager', access: 'Back Office and POS.', employees: [] },
    { id: 4, roleName: 'Cashier', access: 'POS only.', employees: [] }
]);

const roleNameOptions = ['Owner', 'Administrator', 'Manager', 'Cashier'];

const currentPage = ref(1);
const itemsPerPage = 10;
let editingIndex = ref<number | null>(null);

const totalPages = computed(() => Math.ceil(roles.value.length / itemsPerPage));

const paginatedRoles = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return roles.value.slice(start, end);
});

function toggleForm() {
    showForm.value = !showForm.value;
    if (!showForm.value) {
        editingIndex.value = null;
        resetRoleForm();
    }
}

function resetRoleForm() {
    role.value = {
        id: 0,
        roleName: '',
    };
}

function submitRole() {
    if (isRoleFormValid()) {
        if (editingIndex.value !== null) {
            // Update the existing role.
            const roleId = roles.value[editingIndex.value].id;
            roles.value[editingIndex.value] = { ...role.value, id: roleId, access: roles.value[editingIndex.value].access, employees: roles.value[editingIndex.value].employees };
            editingIndex.value = null; 
        } else {
            // Add a new role with default access and empty employee list
            const newId = roles.value.length > 0 ? Math.max(...roles.value.map(r => r.id)) + 1 : 1;
            roles.value.push({ ...role.value, id: newId, access: 'Back Office', employees: [] });
        }
        resetRoleForm();
        showForm.value = false;
    }
}

function isRoleFormValid() {
    return role.value.roleName.trim() !== '';
}

function editRole(id: number) {
    const index = roles.value.findIndex(role => role.id === id);
    role.value = { ...roles.value[index] };
    editingIndex.value = index; 
    showForm.value = true; // Open the form for editing.
}

function deleteRole(id: number) {
    const index = roles.value.findIndex(role => role.id === id);
    roles.value.splice(index, 1);
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
