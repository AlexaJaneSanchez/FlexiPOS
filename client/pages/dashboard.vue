<template>
    <div>
        <NuxtLayout name="admin">
            <main>
      <div class="px-0">
        <!-- Information Card -->
        <div class="m-4">
          <div class="flex -mx-2">
            <!-- Card 1 -->
            <div class="w-full px-2   sm:w-1/4 xl:w-1/4 mb-2">
              <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                <div class="p-1 rounded-full bg-indigo-600 bg-opacity-75 ml-2">
                  <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.45A1 1 0 007 17h10a1 1 0 00.92-.62L21 9m-7 11a2 2 0 11-4 0m6 0a2 2 0 11-4 0"></path>
                  </svg>
                </div>
                <div class="mx-2">
                  <h4 class="text-lg font-semibold text-gray-700">{{ totalSales }}</h4>
                  <div class="text-gray-500 text-xs">Sales</div>
                </div>
              </div>
            </div>
            <!-- Card 2 -->
            <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
              <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                <div class="p-1 rounded-full bg-orange-600 bg-opacity-75">
                  <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v4H3V3zM3 7l9 5 9-5m-9 5v8M3 11v8m18-8v8M4 21h16"></path>
                  </svg>
                </div>
                <div class="mx-2">
                  <h4 class="text-lg font-semibold text-gray-700">{{ totalOrders }}</h4>
                  <div class="text-gray-500 text-xs">Purchase</div>
                </div>
              </div>
            </div>
            <!-- Card 3 -->
            <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
              <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                <div class="p-1 rounded-full bg-pink-600 bg-opacity-75">
                  <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h6M13 8h-1m1-4h-3a2 2 0 00-2 2v16a2 2 0 002 2h6a2 2 0 002-2V8l-4-4z"></path>
                  </svg>
                </div>
                <div class="mx-2">
                  <h4 class="text-lg font-semibold text-gray-700">{{ totalInvoice }}</h4>
                  <div class="text-gray-500 text-xs">Sales Returns</div>
                </div>
              </div>
            </div>
            <!-- Card 4 -->
            <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
              <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                <div class="p-1 rounded-full bg-pink-600 bg-opacity-75">
                  <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 16V7a2 2 0 00-2-2h-3l-2-2H9L7 5H4a2 2 0 00-2 2v9a2 2 0 002 2h1v-2a2 2 0 012-2h10a2 2 0 012 2v2h1a2 2 0 002-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 10H8"></path>
                  </svg>
                </div>
                <div class="mx-2">
                  <h4 class="text-lg font-semibold text-gray-700">{{ availableProducts }}</h4>
                  <div class="text-gray-500 text-xs">Purchase Returns</div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Second Row of Information Cards -->
          <div class="mt-2">
            <div class="flex -mx-2">
              <!-- Card 6 -->
              <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
                <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                  <div class="p-1 rounded-full bg-indigo-600 bg-opacity-75 ml-2">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h4v4H4zM10 6h4v4h-4zM16 6h4v4h-4zM4 12h4v4H4zM10 12h4v4h-4zM16 12h4v4h-4zM4 18h4v4H4zM10 18h4v4h-4zM16 18h4v4h-4z"></path>
                    </svg>
                  </div>
                  <div class="mx-2">
                    <h4 class="text-lg font-semibold text-gray-700">{{ totalCategories }}</h4>
                    <div class="text-gray-500 text-xs">----</div>
                  </div>
                </div>
              </div>
              <!-- Card 7 -->
              <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
                <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                  <div class="p-1 rounded-full bg-green-600 bg-opacity-75 ml-2">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16 21V19a2 2 0 00-2-2H10a2 2 0 00-2 2v2M6 7v4h12V7a2 2 0 00-2-2H8a2 2 0 00-2 2zM6 11V7a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6a2 2 0 00-2-2v4"></path>
                    </svg>
                  </div>
                  <div class="mx-2">
                    <h4 class="text-lg font-semibold text-gray-700">{{ totalPayments }}</h4>
                    <div class="text-gray-500 text-xs">---</div>
                  </div>
                </div>
              </div>
              <!-- Card 8 -->
              <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
                <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                  <div class="p-1 rounded-full bg-orange-600 bg-opacity-75 ml-2">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8a3 3 0 11-6 0 3 3 0 016 0zm0 6H6v6h12v-6h-6zm0 0H6v6h12v-6h-6z"></path>
                    </svg>
                  </div>
                  <div class="mx-2">
                    <h4 class="text-lg font-semibold text-gray-700">{{ totalUsers }}</h4>
                    <div class="text-gray-500 text-xs">----</div>
                  </div>
                </div>
              </div>
              <!-- Card 9 -->
              <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-2">
                <div class="flex items-center px-3 py-3 shadow-sm rounded-md bg-slate-100">
                  <div class="p-1 rounded-full bg-purple-600 bg-opacity-75 ml-2">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 17l3 3 3-3m-3 4V8m0 9a2 2 0 10-4 0 2 2 0 004 0m0-14h1a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2h1"></path>
                    </svg>
                  </div>
                  <div class="mx-2">
                    <h4 class="text-lg font-semibold text-gray-700">{{ totalActiveSuppliers }}</h4>
                    <div class="text-gray-500 text-xs">----</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Sales Chart -->
         <div class="p-4 mt-10 flex">
          <div class="w-2/3 p-4">
            <div class="w-full h-64">
              <canvas id="salesPurchaseChart" class="w-full h-full"></canvas>
            </div>
          </div>
          
          <!-- Recent Transactions -->
          <div class="w-1/2 p-4">
            <div class="bg-slate-100 p-4 mb-4 rounded-md shadow-md h-64">
              <div class="flex justify-between items-center mb-2">
                <h4 class="text-md font-semibold text-gray-900 ml-2">Recent Transactions</h4>
                <button class="bg-gray-900 text-white px-4 py-2 text-xxs font-semibold rounded-md hover:bg-gray-800">
                  View All
                </button>
              </div>
              <ul class="text-gray-600 text-sm">
                <!-- content goes here -->
                </ul>
              </div>
            </div>
          </div>
      </div>
    </main>
        </NuxtLayout>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto';

const totalSales = ref(0);
const totalOrders = ref(0);
const totalInvoice = ref(0);
const availableProducts = ref(0);
const totalCategories = ref(0);
const totalPayments = ref(0);
const totalUsers = ref(0);
const totalActiveSuppliers = ref(0);

onMounted(() => {
  const ctx = document.getElementById('salesPurchaseChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [
        {
          label: 'Sales',
          data: [1000, 2000, 3000, 4000, 5000, 6000],
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true,
        },
        {
          label: 'Purchases',
          data: [800, 1500, 2500, 3500, 4500, 5500],
          borderColor: 'rgba(255, 159, 64, 1)',
          backgroundColor: 'rgba(255, 159, 64, 0.2)',
          fill: true,
        },
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true,
        },
        tooltip: {
          callbacks: {
            label: function(tooltipItem) {
              return `${tooltipItem.dataset.label}: $${tooltipItem.raw}`;
            }
          }
        }
      }
    }
  });
});
</script>
    