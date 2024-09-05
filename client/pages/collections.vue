<template>
    <NuxtLayout name="admin">
        <div class="px-4 py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-6 lg:px-8">
    <div class="flex justify-center space-x-6">
        <!-- Customers Label and Selection Dropdown -->
        <div class="flex items-center space-x-2">
            <div class="text-center text-xxs">Customers:</div>
            <select class="text-xxs rounded-md border border-gray-400 px-20 py-2">
                <!-- <option value="all">All</option>
                <option value="new">New Customers</option>
                <option value="returning">Returning Customers</option> -->
            </select>
        </div>

        <!-- Sales Rep Label and Selection Dropdown 
        <div class="flex items-center space-x-2">
            <div class="text-center text-xxs">Sales Rep:</div>
            <select class="text-xxs rounded-md border border-gray-400 px-20 py-2">
            </select>
        </div> -->

        <!-- Date Label and Date Picker 
        <div class="flex items-center space-x-2">
            <div class="text-center text-xxs">Date:</div>
            <input type="date" class="text-xxs rounded-md border border-gray-400 px-4 py-2">
        </div> -->
    </div>
</div>


           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                <div
                    v-for="(stat, statIdx) in stats"
                    :key="stat.name"
                    class="flex items-center p-3 shadow-sm rounded-md bg-slate-100"
                >
                    <div :class="[
                        statIdx === 0 ? 'bg-green-600' :
                        statIdx === 1 ? 'bg-blue-600' :
                        statIdx === 2 ? 'bg-orange-600' :
                        'bg-red-600',
                        'p-1 rounded-full bg-opacity-75 ml-2'
                    ]">
                        <!-- Use appropriate icons here -->
                        <svg
                            v-if="statIdx === 0"
                            class="h-4 w-4 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 8h12v8H6V8zm0-2v12h12V6H6z"></path>
                        </svg>
                        <svg
                            v-if="statIdx === 1"
                            class="h-4 w-4 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9v-6h-9v6zm0-8h9v-6h-9v6zm-10 0h9v-6H2v6zm0 8h9v-6H2v6z"></path>
                        </svg>
                        <svg
                            v-if="statIdx === 2"
                            class="h-4 w-4 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <svg
                            v-if="statIdx === 3"
                            class="h-4 w-4 text-white"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path>
                        </svg>
                    </div>
                    <div class="ml-2">
                        <h4 class="text-sm font-semibold text-gray-700 ml-2">{{ stat.value }}</h4>
                        <div class="text-gray-500 text-xs mt-3 ml-2">{{ stat.name }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <main class="pb-16 pt-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 sm:px-0">

                <!-- Tabs -->
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <select
                        id="tabs"
                        name="tabs"
                        class="mt-4 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-500 text-xxs"
                        v-model="selectedTabMobile"
                    >
                        <option
                            v-for="tab in tabs"
                            :key="tab.name"
                            :value="tab.name"
                        >
                            {{ tab.name }}
                        </option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="relative">
                        <nav class="flex space-x-8" aria-label="Tabs">
                            <a
                                v-for="tab in tabs"
                                :key="tab.name"
                                :href="tab.href"
                                :class="[
                                    tab.name === selectedTab
                                        ? 'text-gray-900 border-b-2 border-gray-900'
                                        : 'text-gray-500 hover:text-gray-700 border-b-2 border-transparent',
                                    'py-4 px-1 text-xxs font-medium'
                                ]"
                                @click.prevent="selectedTab = tab.name"
                            >
                                {{ tab.name }}
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

    <!-- Table -->
<div v-if="selectedTab === 'To Collect'" class="mt-5">
    <!--Search-->
    <div class="relative flex items-center space-x-2">
    <div class="relative flex flex-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z" clip-rule="evenodd"/>
        </svg>
        <input type="text" placeholder="Search" class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5"/>
    </div>

    <!-- Print Button -->
    <button class="bg-gray-900 text-white rounded-md px-4 py-2 text-xs hover:bg-gray-800">
        Print
    </button>
</div>

                    
    <table class="min-w-full divide-y divide-gray-200 mt-5">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium text-white bg-gray-900 rounded-tl-lg tracking-wider">Id</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium text-white bg-gray-900  tracking-wider">Invoice No</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium text-white bg-gray-900  tracking-wider">Invoice Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium text-white bg-gray-900  tracking-wider">Balance</th>
                <th scope="col" class="px-4 py-2 text-xxs font-semibold text-white bg-gray-900 rounded-tr-lg text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 divide-y divide-gray-200">
            <template v-if="filteredCandidates.length > 0">
                <tr v-for="candidate in filteredCandidates" :key="candidate.invoiceNo">
                    <td class="px-6 py-4 whitespace-nowrap text-xxs font-medium text-gray-900">{{ candidate.invoiceNo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-500">{{ candidate.invoiceNo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-500">{{ candidate.invoiceDate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-500">{{ candidate.balance }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-xxs text-gray-500 text-center">
    <div class="flex items-center  space-x-2">
        <!-- Document Icon Button -->
        <button @click="handleSalesInvoice(candidate)" class="text-gray-500 hover:text-gray-700">
            <DocumentIcon class="h-5 w-5" aria-hidden="true" />
        </button>
    </div>
</td>
                </tr>
            </template>
            <template v-else>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 text-xxs">No customers to collect.</td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

                    <!-- List for 'Paid' tab -->
                    <ul
                    v-if="selectedTab === 'Paid'"
                        role="list"
                        class="mt-5 divide-y divide-gray-200 border-t border-gray-200 sm:mt-0 sm:border-t-0"
                        >
                        <li v-for="candidate in filteredCandidates" :key="candidate.email">
                            <a href="#" class="group block">
                                <div class="flex items-center px-4 py-5 sm:px-0 sm:py-6">
                                    <div class="flex min-w-0 flex-1 items-center">
                                        <div class="flex-shrink-0">
                                            <img
                                                class="h-12 w-12 rounded-full group-hover:opacity-75"
                                                :src="candidate.imageUrl"
                                                alt=""
                                            />
                                        </div>
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p class="truncate text-xxs font-medium text-purple-600">
                                                    {{ candidate.name }}
                                                </p>
                                                <p class="mt-2 flex items-center text-xxs text-gray-500">
                                                    <EnvelopeIcon
                                                        class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                        aria-hidden="true"
                                                    />
                                                    <span class="truncate">{{ candidate.email }}</span>
                                                </p>
                                            </div>
                                            <div class="hidden md:block">
                                                <p class="text-xxs text-gray-900 flex items-center">
                                                    <span>Paid On -</span>
                                                    <time :datetime="candidate.paymentDate" class="ml-2">{{ candidate.paymentDate }}</time>
                                                    <span class="ml-2 text-xxs text-gray-500">
                                                        via {{ candidate.paymentMethod === 'bank' ? 'Bank' : 'Cash' }}
                                                    </span>
                                                </p>
                                                <div class="flex items-center mt-2">
                                                    <CheckCircleIcon
                                                        class="h-5 w-5 text-green-400"
                                                        aria-hidden="true"
                                                    />
                                                    <span class="ml-2 text-xxs text-gray-500">{{ candidate.status }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <ChevronRightIcon
                                            class="h-5 w-5 text-gray-400 group-hover:text-gray-700"
                                            aria-hidden="true"
                                        />
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>

            <!-- Pagination 
            <nav
                class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0"
                aria-label="Pagination"
            >
                <div class="-mt-px flex w-0 flex-1">
                    <a
                        href="#"
                        class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-xxs font-medium text-gray-500 hover:border-gray-200 hover:text-gray-700"
                    >
                        <ArrowLongLeftIcon
                            class="mr-3 h-5 w-5 text-gray-400"
                            aria-hidden="true"
                        />
                        Previous
                    </a>
                </div>
                <div class="-mt-px flex w-0 flex-1 justify-end">
                    <a
                        href="#"
                        class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-xxs font-medium text-gray-500 hover:border-gray-200 hover:text-gray-700"
                    >
                        Next
                        <ArrowLongRightIcon
                            class="ml-3 h-5 w-5 text-gray-400"
                            aria-hidden="true"
                        />
                    </a>
                </div>
            </nav> -->
        </div> 
         <!-- Customer Details Form -->
         <transition name="fade" @before-enter="beforeEnter" @enter="enter" @leave="leave">
            <div v-if="showCustomerForm" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white p-6 rounded-lg w-full max-w-md mx-4">
                  
                    <div v-if="!showPaymentDetails">
                        <h3 class="text-md font-medium text-white bg-gray-900 px-6 py-2 text-center rounded-md">Collection Details</h3>
                        <form @submit.prevent="handleProceed">
                        <div class="mt-6 flex flex-col ml-10">
                            <!-- Customer details -->
                            <div class="flex items-center mb-2 mt-3">
                                <p class="text-sm font-medium text-gray-700 mr-2">Id:</p>
                                <p class="text-sm text-gray-700">{{ selectedCandidate.name }}</p>
                            </div>
                            <div class="flex items-center mb-2 mt-3">
                                <p class="text-sm font-medium text-gray-700 mr-2">Invoice No:</p>
                                <p class="text-sm text-gray-700">{{ selectedCandidate.invoiceNo }}</p>
                            </div>
                            <div class="flex items-center mb-2 mt-3">
                                <p class="text-sm font-medium text-gray-700 mr-2">Invoice Date:</p>
                                <p class="text-sm text-gray-700">{{ selectedCandidate.invoiceDate }}</p>
                            </div>
                            
                            <div class="flex items-center">
                                <label class="text-sm font-medium text-gray-700 mr-2">Payment Method:</label>
                                <select
                                    v-model="paymentMethod"
                                    @change="handlePaymentMethodChange"
                                    class="text-sm border-gray-300 w-20 bg-gray-100 py-2 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                >
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>
                            
                            <div class="flex items-center mb-4 mt-3">
                                <p class="text-sm font-medium text-gray-700 mr-2">Total Invoice:</p>
                                <p class="text-sm text-gray-700">{{ selectedCandidate.totalInvoice }}</p>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-900"
                                >
                                    Proceed
                                </button>
                                <button
                                    type="button"
                                    @click="showCustomerForm = false"
                                    class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>

                    <!-- Payment Details Form -->
                        <div v-if="showPaymentDetails">
                            <h3 class="text-md font-medium text-white bg-gray-900 px-6 py-2 text-center rounded-md">Payment Details</h3>
                            <div class="mt-6 flex flex-col ml-10">
                                <div class="flex items-center mb-2 mt-3">
                                    <p class="text-sm font-medium text-gray-700 mr-2">Order Number:</p>
                                    <p class="text-sm text-gray-700">{{ orderNumber }}</p>
                                </div>

                                <!-- Cash Details Section -->
                                <div v-if="paymentMethod === 'cash'">
                                    <div class="flex items-center mb-2 mt-3">
                                        <p class="text-sm font-medium text-gray-700 mr-2">Cash Amount:</p>
                                        <p class="text-sm text-gray-700">{{ cashAmount }}</p>
                                    </div>
                                    <div class="flex items-center mb-2 mt-3">
                                        <p class="text-sm font-medium text-gray-700 mr-2">Total Check Amount:</p>
                                        <p class="text-sm text-gray-700">{{ totalCheckAmount }}</p>
                                    </div>
                                    <div class="flex items-center mb-4 mt-3">
                                        <p class="text-sm font-medium text-gray-700 mr-2">Grand Total:</p>
                                        <p class="text-sm text-gray-700">{{ grandTotal }}</p>
                                    </div>
                                </div>

                                <!-- Bank Details Section -->
                                <div v-if="paymentMethod === 'bank'">
                                    <div class="flex items-center mb-2 mt-3 ">
                                    <label class="text-sm font-medium text-gray-700  ">Bank Name:</label>
                                    <select
                                        v-model="bankName"
                                        class="border-gray-300 text-sm ml-7 bg-gray-100 py-2 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    >
                                        <option value="bank-of-america">Bank of America</option>
                                        <option value="chase">Chase</option>
                                        <option value="wells-fargo">Wells Fargo</option>
                                        <option value="citibank">Citibank</option>
                                    </select>
                                </div>
                                    <div class="flex items-center mb-2 mt-3">
                                        <label class="text-sm font-medium text-gray-700 mr-2">Check No:</label>
                                        <input
                                            type="text"
                                            v-model.number="accountNumber"
                                            class="border-gray-300 text-sm bg-gray-100 py-2 rounded-md  ml-8 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                            placeholder="  Enter number"
                                            min="0"
                                        />
                                    </div>
                                        <div class="flex-1">
                                        <label class="text-sm font-medium text-gray-700 mr-2">Due Date:</label>
                                        <input
                                            type="date"
                                            v-model="dueDate"
                                            class="border-gray-300 text-sm bg-gray-100 ml-8 py-2 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                        />
                                    </div>

                                    <div class="flex items-center mb-2 mt-3">
                                        <label class="text-sm font-medium text-gray-700 mr-2">Amount:</label>
                                        <input
                                            type="text"
                                            v-model="bankAmount"
                                            class="border-gray-300 text-sm bg-gray-100 ml-9 py-2 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                        />
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button
                                        type="button"
                                        @click="confirmPayment"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-900"
                                    >
                                        Confirm Payment
                                    </button>
                                    <button
                                        type="button"
                                        @click="showPaymentDetails = false"
                                        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600"
                                    >
                                        Back
                                    </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </transition>
        </main>
        </div>
    </NuxtLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { DocumentIcon, EnvelopeIcon, CheckCircleIcon, ChevronRightIcon, PrinterIcon,} from '@heroicons/vue/20/solid';

const tabs = [
    { name: 'To Collect', href: '#' },
    { name: 'Paid', href: '#' },
];

const candidatesData = ref({
    '1': [
        { invoiceNo: '001', invoiceDate: '2024-01-01', balance: '100', name: 'Customer 1', status: 'To Collect', paymentDate: '', totalInvoice: '100' },
    ],
    '2': [
        { invoiceNo: '002', invoiceDate: '2024-02-01', balance: '200', name: 'Customer 2', status: 'To Collect', paymentDate: '' },
    ],
});

const selectedTab = ref('To Collect');
const selectedCustomer = ref('1');
const showCustomerForm = ref(false);
const showPaymentDetails = ref(false);
const selectedCandidate = ref({});

const paymentMethod = ref('cash');
const orderNumber = ref('12345');
const cashAmount = ref('100');
const totalCheckAmount = ref('100');
const grandTotal = ref('100');

// Bank fields
const bankName = ref('');
const accountNumber = ref('');
const bankAmount = ref('');

const filteredCandidates = computed(() => {
    return (selectedTab.value === 'To Collect'
        ? candidatesData.value[selectedCustomer.value].filter(candidate => candidate.status === 'To Collect')
        : candidatesData.value[selectedCustomer.value].filter(candidate => candidate.status === 'Paid')
    ) || [];
});

function handleSalesInvoice(candidate) {
    selectedCandidate.value = candidate;
    showCustomerForm.value = true;
}

function handleProceed() {
    showPaymentDetails.value = true;
}

function handlePaymentMethodChange() {
    showPaymentDetails.value = false;
}

function confirmPayment() {
    const candidateIndex = candidatesData.value[selectedCustomer.value].findIndex(candidate => candidate.invoiceNo === selectedCandidate.value.invoiceNo);
    if (candidateIndex !== -1) {
        candidatesData.value[selectedCustomer.value][candidateIndex].status = 'Paid';
        candidatesData.value[selectedCustomer.value][candidateIndex].paymentDate = new Date().toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        candidatesData.value[selectedCustomer.value][candidateIndex].paymentMethod = paymentMethod.value; //via Cash or via Bank
    }

    const paymentDetails = {
        orderNumber: orderNumber.value,
        grandTotal: grandTotal.value
    };

    if (paymentMethod.value === 'cash') {
        paymentDetails.cashAmount = cashAmount.value;
        paymentDetails.totalCheckAmount = totalCheckAmount.value;
    } else if (paymentMethod.value === 'bank') {
        paymentDetails.bankName = bankName.value;
        paymentDetails.accountNumber = accountNumber.value;
        paymentDetails.bankAmount = bankAmount.value;
    }

    console.log('Payment confirmed with details:', paymentDetails);
    showPaymentDetails.value = false;
    showCustomerForm.value = false;
}
const stats = [
    {
        name: "To Collect",
        value: "0",
    },
    {
        name: "Total Collections",
        value: "0",
    },
    {
        name: "Total Outstanding Invoices",
        value: "0",
    },
    {
        name: "Total Expenses",
        value: "0",
    },
];
</script>
