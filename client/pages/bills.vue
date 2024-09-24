<template>
    <NuxtLayout name="admin">
        
        <div class="relative flex flex-1 mt-8 items-center justify-between">
            <!-- Search Bar -->
             <div class="relative flex flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z" clip-rule="evenodd"/>
                </svg>
                <input type="text" placeholder="Search" class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5"/>
            </div>
            
            <!-- Bills Button --> 
             <button @click="toggleForm" type="button" class="ml-4 rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                <PlusIcon class="h-3 w-3" aria-hidden="true" />
                New bill
            </button>
        </div>
        
        <!-- Bills Form -->
         <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl md-5">
                <form @submit.prevent="submitBill">
                    <div class="space-y-4">
                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="invoiceno" class="text-xxs font-medium text-gray-700">InvoiceNo</label>
                                <input
                                id="invoiceno"
                                v-model="bill.invoiceno"
                                type="text"
                                class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                        <label for="supplier" class="text-xxs font-medium text-gray-700">Supplier</label>
                        <input
                            type="text"
                            id="supplierID"
                            v-model="bill.supplierID"
                            class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                            required
                        />
                    </div>

                        <div class="flex-1 min-w-[120px] max-w-[200px]">
                            <label for="term" class="text-xxs font-medium text-gray-700">Term (days)</label>
                            <input
                                id="term"
                                v-model="bill.term"
                                type="text"
                                class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                required
                            />
                        </div>
                        <div class="flex-1 min-w-[120px] max-w-[200px]">
                            <label for="payment" class="text-xxs font-medium text-gray-700">Payment</label>
                            <select
                                id="payment"
                                v-model="bill.payment"
                                class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                required
                                >
                                <option value="cash">Cash</option>
                                <option value="supplier2">Bank</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr class="border-t-2 border-gray-300 my-4">  <!--Line-->
                    
                    <div class="flex justify-end mt-2 sm:mt-2 sm:flex-none mr-4">
                        <button @click="addBill" type="button" class="rounded-md bg-gray-900 px-3 py-2 text-center text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 flex items-center justify-center gap-2">
                            Add Bill
                        </button>
                    </div>
                    <div class="space-y-4">
                        <!-- First Row -->
                         <div class="flex flex-wrap gap-4 ">
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="billsDetail_ID" class="text-xxs font-medium text-gray-700">billsDetail_ID</label>
                                <input
                                    id="billsDetail_ID"
                                    v-model="bill.billsDetail_ID"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="billsID" class="text-xxs font-medium text-gray-700">BillsID</label>
                                <input
                                    id="billsID"
                                    v-model="bill.billsID"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="productID" class="text-xxs font-medium text-gray-700">ProductID</label>
                                <input
                                    id="productID"
                                    v-model="bill.productID"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="barcode" class="text-xxs font-medium text-gray-700">Barcode</label>
                                <input
                                    id="barcode"
                                    v-model="bill.barcode"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                        </div>
                        <!-- Second Row -->
                         <div class="flex flex-wrap gap-4 mt-4">
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="unit" class="text-xxs font-medium text-gray-700">Unit</label>
                                <input
                                    id="unit"
                                    v-model="bill.unit"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="expirydate" class="text-xxs font-medium text-gray-700">Expiry Date</label>
                                <input
                                    id="expirydate"
                                    v-model="bill.expirydate"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="quantity" class="text-xxs font-medium text-gray-700">Quantity</label>
                                <input
                                    id="quantity"
                                    v-model="bill.quantity"
                                    type="text"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                            <div class="flex-1 min-w-[120px] max-w-[200px]">
                                <label for="costperqty" class="text-xxs font-medium text-gray-700">Cost Per Qty</label>
                                <input
                                    id="costperqty"
                                    v-model="bill.costperqty"
                                    type="text" 
                                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xxs px-2 py-1"
                                    required
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Second Table (inside the form) -->
                     <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 mt-6">
                            <thead class="bg-gray-900 text-white">
                                <tr>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium rounded-tl-md">billsDetail_ID</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">billsID</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">productID</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">barcode</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">unit</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">expiryDate</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">quantity</th>
                                    <th scope="col" class="px-4 py-2 text-left text-xxs font-medium">costPerQty</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100">
                                <tr v-for="(bill, index) in paginatedBills" :key="index" class="border-t bg-gray-50">
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.billsDetail_ID }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.billsID }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.productID }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.barcode }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.unit }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.expirydate }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.quantity }}</td>
                                    <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.costperqty}}</td>
                                </tr>
                                <tr v-if="bills.length === 0">
                                    <td colspan="8" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No bills available.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end mt-6 sm:mt-2 sm:flex-none mr-4">
                        <button
                        type="submit"
                        class="rounded-md bg-gray-900 px-4 mr-3 py-2 text-xxs font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
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
<div class="mt-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-900 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider rounded-tl-md">BillNo</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">InvoiceNo</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">PurchaseOrderNo</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium">SupplierID</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">InvoiceDate</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium">Terms</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium">PreparedBy</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium">isCancelled</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium">CancelledBy</th>
                <th class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100">
            <tr v-for="(bill, index) in paginatedBills" :key="index" class="border-t bg-gray-50">
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.billno }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.invoiceno }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.purchaseorderno }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.supplierID }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.invoicedate }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.term }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.preparedby }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.iscancelled }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">{{ bill.cancelledby }}</td>
                <td class="px-4 py-2 text-xxs text-gray-700">
                    <div class="flex space-x-2">
                        <button @click="editBill(index + (currentPage - 1) * itemsPerPage)" class="text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0l-10 10V16a1 1 0 001 1h3.414l10-10a2 2 0 000-2.828l-1.586-1.586zM5 13l-1.5 1.5V13h1.5zm4.5-4.5L14 4l2 2-4.5 4.5H9.5V8.5z"/>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr v-if="paginatedBills.length === 0">
                <td colspan="10" class="px-4 py-2 text-xxs text-gray-500 text-center bg-gray-100">No bills available.</td>
            </tr>
        </tbody>
    </table>

    <!-- Page Navigation -->
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

    </NuxtLayout>
</template>

<script setup lang="ts">
import { ref, computed, reactive, onMounted } from 'vue';
import { PlusIcon } from '@heroicons/vue/24/outline';
import { billService } from '~/components/api/BillService';



interface SortData {
    sortField: string;
    sortOrder: "ascend" | "descend" | null;
}

interface Bills {
    data: any[];
}

const state = reactive({
    columnHeaders: [
        { name: "BillNo", sorter: true, key: "billno" },
        { name: "InvoiceNo", sorter: true, key: "invoiceno" },
        { name: "PurchaseOrderNo", sorter: true, key: "purchaseorderno" },
        { name: "SupplierID", sorter: true, key: "supplierid" },
        { name: "InvoiceDate", sorter: true, key: "invoicedate" },
        { name: "Terms", sorter: true, key: "term" },
        { name: "PrepairedBy", sorter: true, key: "preparedby" },
        { name: "isCanceleled", sorter: true, key: "iscancelled" },
        { name: "CancelledBy", sorter: true, key: "cancelledby" },
        { name: "Actions", key: "actions" },
    ],
    error: null as Error | null,
    sortData: { sortField: "", sortOrder: null } as SortData,
    bills: { data: [] } as Bills,
});

onMounted(() => {
    fetchBills();
});

async function fetchBills() {
    state.error = null;
    try {
        const params = {
            sortField: state.sortData.sortField,
            sortOrder: state.sortData.sortOrder,
        };
        const response = await billService.getBill();
        state.bills = response;
    } catch (error: any) {
        state.error = error;
    }
}

function sort(sortingData: { column: string; sort: string }) {
    if (sortingData.sort === 'ascend' || sortingData.sort === 'descend') {
        state.sortData = {
            sortField: sortingData.column,
            sortOrder: sortingData.sort,
        };
    } else {
        state.sortData = {
            sortField: sortingData.column,
            sortOrder: 'ascend',
        };
    }
    fetchBills();
}

const bill = ref({
    //first table fields
    billno: '',
    invoiceno: '',
    purchaseorderno: '',
    supplierID: '',
    invoicedate: '',
    payment: '',
    term: '',
    preparedby: '',
    iscancelled: '',
    cancelledby: '',
    //bills form fields
    billsDetail_ID: '',
    billsID: '',
    productID: '',
    barcode: '',
    unit: '',
    expirydate: '',
    quantity: '',
    costperqty: '',
});

const bills = ref([] as typeof bill.value[]); // Initialize bills as an array of bill objects

function addBill() {
    bills.value.push({ ...bill.value });
    // Reset the form fields after adding the bill
    bill.value = {
        billno: '', // Include all required fields even if not used
        invoiceno: '',
        purchaseorderno: '',
        supplierID: '',
        invoicedate: '',
        payment: '',
        term: '',
        preparedby: '',
        iscancelled: '',
        cancelledby: '',
        //bills form fields
        billsDetail_ID: '',
        billsID: '',
        productID: '',
        barcode: '',
        unit: '',
        expirydate: '',
        quantity: '',
        costperqty: '',
    };
}

const currentPage = ref(1);
const itemsPerPage = 10;
let editingIndex = ref<number | null>(null);

const totalPages = computed(() => Math.ceil(bills.value.length / itemsPerPage));

const paginatedBills = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return bills.value.slice(start, end);
});

const billToEdit = ref<number | null>(null);

async function submitBill() {
    try {
        const billDetails = {
            billsDetail_ID: bill.value.billsDetail_ID,
            billsID: bill.value.billsID,
            productID: bill.value.productID,
            barcode: bill.value.barcode,
            unit: bill.value.unit,
            expirydate: bill.value.expirydate,
            quantity: bill.value.quantity,
            costperqty: bill.value.costperqty,
        };

        let response;

        if (billToEdit.value) {
            // Update existing bill.
            response = await billService.updateBill(billToEdit.value, billDetails);
            alert(response ? 'Bill has been updated!' : 'Bill update failed!');
        } else {
            // Create new bill.
            response = await billService.createBill(billDetails);
            alert(response ? 'Bill has been added!' : 'Bill creation failed!');
        }

        fetchBills(); // Refresh the bill list.
        toggleForm(); // Hide the form after save.
    } catch (error: any) {
        console.error('Error submitting bill:', error.message);
        alert('An error occurred while submitting the bill.');
    }
}

function editBill(billID: number) {
    const selectedBill = state.bills.data.find(b => b.billID === billID);

    if (selectedBill) {
        bill.value = { ...selectedBill };  
        billToEdit.value = billID;  
        showForm.value = true;
    } else {
        console.error(`Bill with ID ${billID} not found.`);
    }
}

function previousPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
        fetchBills();
    }
}

function nextPage() {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        fetchBills();
    }
}

const showForm = ref(false);

function toggleForm() {
    showForm.value = !showForm.value;
    if (!showForm.value) {
        bill.value = {
            billno: '',
            invoiceno: '',
            purchaseorderno: '',
            supplierID: '',
            invoicedate: '',
            payment: '',
            term: '',
            preparedby: '',
            iscancelled: '',
            cancelledby: '',
            //second 
            billsDetail_ID: '',
            billsID: '',
            productID: '',
            barcode: '',
            unit: '',
            expirydate: '',
            quantity: '',
            costperqty: '',
        };
        billToEdit.value = null;
    }
}
</script>
