<template>
    <div>
        <NuxtLayout name="admin">
            <main>
              <div class="px-4">
  <!-- Information Card Container -->
  <div class="flex flex-wrap -mx-2 mt-10">
    <!-- Card 1 -->
    <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-4">
      <div class="relative flex items-center justify-between px-4 py-3 shadow-md rounded-xl bg-white border border-gray-200 h-32"> <!-- Adjusted height -->
        <div class="flex items-center">
          <div class="p-2 rounded-md bg-gray-900">
            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.45A1 1 0 007 17h10a1 1 0 00.92-.62L21 9m-7 11a2 2 0 11-4 0m6 0a2 2 0 11-4 0"></path>
            </svg>
          </div>
          <div class="ml-3">
            <h4 class="text-xl font-bold text-gray-800">{{ totalSales }}</h4>
          </div>
        </div>
        <div class="absolute top-4 right-2 text-gray-500 text-xs mr-4">
          Sales
        </div>
      </div>
    </div>
    
    <!-- Card 2 -->
    <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-4">
      <div class="relative flex items-center justify-between px-4 py-3 shadow-md rounded-xl bg-white border border-gray-200 h-32"> <!-- Adjusted height -->
        <div class="flex items-center">
          <div class="p-2 rounded-md bg-gray-900">
            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.45A1 1 0 007 17h10a1 1 0 00.92-.62L21 9m-7 11a2 2 0 11-4 0m6 0a2 2 0 11-4 0"></path>
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 11l-3 3m0 0l-3-3m3 3V4"></path>
            </svg>
          </div>
          <div class="ml-3">
            <h4 class="text-xl font-bold text-gray-800">{{ totalOrders }}</h4>
          </div>
        </div>
        <div class="absolute top-4 right-2 text-gray-500 text-xs mr-4">
          Purchase
        </div>
      </div>
    </div>
    
    <!-- Card 3 -->
    <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-4">
      <div class="relative flex items-center justify-between px-4 py-3 shadow-md rounded-xl bg-white border border-gray-200 h-32"> <!-- Adjusted height -->
        <div class="flex items-center">
          <div class="p-2 rounded-md bg-gray-900">
            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h8M8 10h8M8 14h8M4 4v16h16V4H4z"></path>
            </svg>
          </div>
          <div class="ml-3">
            <h4 class="text-xl font-bold text-gray-800">{{ totalInvoice }}</h4>
          </div>
        </div>
        <div class="absolute top-4 right-2 text-gray-500 text-xs mr-4">
          Invoice
        </div>
      </div>
    </div>
    
    <!-- Card 4 -->
    <div class="w-full px-2 sm:w-1/4 xl:w-1/4 mb-4">
      <div class="relative flex items-center justify-between px-4 py-3 shadow-md rounded-xl bg-white border border-gray-200 h-32"> <!-- Adjusted height -->
        <div class="flex items-center">
          <div class="p-2 rounded-md bg-gray-900">
            <div class="p-1 rounded-md bg-gray-900"> <!-- Reduced padding -->
  <svg class="h-3 w-3 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-2h1m0 0h1v-2h-1m-1 2v-2h-1v2h1zm-1 0v2h-1v-2m6-6h-1v-1h1m0 1v-1h1v1m-1 0h-1v-1h1v1zM4 6h16v2H4V6zm0 4h16v2H4v-2zM4 16h16v2H4v-2z"></path>
  </svg>
</div>
          </div>

          <div class="ml-3">
            <h4 class="text-xl font-bold text-gray-800">{{ availableProducts }}</h4>
          </div>
        </div>
        <div class="absolute top-4 right-2 text-gray-500 text-xs mr-4">
          Products
        </div>
      </div>
    </div>
  </div>

  
      <!-- Parent div with flex layout -->
<div class="flex p-6 mt-10 space-x-6">

<!-- Sales Chart -->
<div class="w-2/3 bg-white rounded-lg shadow-lg p-2">
  <div class="w-full h-72 relative">
    <canvas id="salesPurchaseChart" class="w-full h-full"></canvas>
  </div>
</div>

<div class="w-1/3 bg-white p-4 rounded-lg shadow-md border border-gray-200 h-75"> <!-- Added border and border-gray-200 -->
  <div class="flex justify-between items-center mb-4">
    <h4 class="text-xs font-semibold text-gray-800">Recent Transactions</h4>
    <button class="bg-gray-900 text-white px-4 py-2 text-xxs font-medium rounded-lg hover:bg-indigo-500 transition-all duration-300">
      View All
    </button>
  </div>

  <ul class="text-gray-600 text-sm">
    <!-- content goes here -->
  </ul>
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

onMounted(() => {
  const ctx = document.getElementById('salesPurchaseChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [{
        label: 'Sales',
        data: [30, 50, 70, 40, 60, 80, 90],
        backgroundColor: 'rgba(31, 41, 55, 1)',
        borderColor: 'rgba(31, 41, 55, 1)', // Gray-900
        borderWidth: 2,
        tension: 0.4
      }, {
        label: 'Purchases',
        data: [50, 40, 60, 70, 80, 50, 30],
        backgroundColor: 'rgba(107, 114, 128, 1)',
        borderColor: 'rgba(107, 114, 128, 1)', // Gray-500
        borderWidth: 2,
        tension: 0.4
      }]
    },
    options: {
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
          beginAtZero: true,
          grid: {
            color: 'rgba(200, 200, 200, 0.2)'
          }
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top',
          labels: {
            color: '#333',
            font: {
              size: 14
            }
          }
        }
      }
    }
  });
});

</script>