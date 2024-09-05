<template>
    <NuxtLayout name="admin">
        <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Payment Transaction</h1>
  
      <form @submit.prevent="handleSubmit" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
          <label for="billName" class="block text-sm font-medium text-gray-700">Bill Name</label>
          <input
            type="text"
            id="billName"
            v-model="form.billName"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
          />
        </div>
  
        <div class="mb-4">
          <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
          <input
            type="number"
            id="amount"
            v-model="form.amount"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
          />
        </div>
  
        <div class="mb-4">
          <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Payment Method</label>
          <select
            id="paymentMethod"
            v-model="form.paymentMethod"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
          >
            <option value="cash">Cash</option>
            <option value="credit">Credit Card</option>
            <option value="bank">Bank Transfer</option>
          </select>
        </div>
  
        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-800"
          >
            Submit
          </button>
        </div>
      </form>
  
      <!-- Success Message -->
      <p v-if="successMessage" class="mt-4 text-green-500">{{ successMessage }}</p>
        </div>
  
 
  
    </NuxtLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'nuxt/app';

const form = ref({
  billName: '',
  amount: '',
  paymentMethod: 'cash'
});

const successMessage = ref('');
const router = useRouter();

function handleSubmit() {
  // Simulate an API call
  console.log('Form Submitted:', form.value);

  // Set success message
  successMessage.value = 'Payment transaction was successful!';

  // Optionally, clear the form
  form.value = {
    billName: '',
    amount: '',
    paymentMethod: 'cash'
  };

  // Optionally, clear the success message after a few seconds
  setTimeout(() => {
    successMessage.value = '';
  }, 3000); // Clear the message after 3 seconds

  // Redirect to another page if needed
  // router.push('/success');
}
</script>

<style scoped>
/* Add any scoped styles here */
</style>
