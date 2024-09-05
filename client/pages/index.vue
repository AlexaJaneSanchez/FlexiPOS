<template>
<div class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-10 w-auto ml-11" src="/public/images/Logo.png" alt="" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                @click="mobileMenuOpen = true">
                <span class="sr-only">Open main menu</span>
                <Bars3Icon class="h-6 w-6" aria-hidden="true" />
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a v-for="item in navigation" :key="item.name" :href="item.href"
            class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end mr-5">
            <router-link to="/login" 
            class="inline-flex items-center justify-center rounded-lg px-4 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
            Log in
        </router-link>
    </div>
</nav>
<Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
    <div class="fixed inset-0 z-50" />
    <DialogPanel
    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
    <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="/public/images/Logo.png" alt="" />
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
        </button>
    </div>
    <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
                <a v-for="item in navigation" :key="item.name" :href="item.href"
                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                {{ item.name }}
            </a>
        </div>
    </div>
</div>
</DialogPanel>
</Dialog>
</header>

<main>
    <!-- Hero section -->
        <div class="relative isolate pt-">
         
          <div class="mx-auto ml-10 max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto">
              <h1 class="mt-10 max-w-lg text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">The point of sale of every sale</h1>
              <p class="mt-6 text-lg leading-8 text-gray-600 text-sm">Discover the future of smooth transaction.</p>
              <p class="mt-2 text-lg leading-8 text-gray-600 text-sm">Get our user-friendly POS system to manage sales, track inventory, and improve your business efficiency.</p>
              <div class="mt-10 flex items-center gap-x-6">
                <a href="#"
                  class="inline-flex items-center justify-center rounded-lg px-4 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">Get started</a>
              </div>
            </div>
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
              <svg viewBox="0 0 800 800" role="img" class="mx-auto w-full max-w-7xl drop-shadow-xl">
                <title>POS image</title>
                <foreignObject width="800" height="800" x="0" y="0">
                  <img src="/images/Background.png" alt="Background" class="object-contain w-full h-full" />
                </foreignObject>
              </svg>
            </div>
          </div>
        </div>
      </main>
    </div>
  </template>
  
  
<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router'; 
import { Dialog, DialogPanel } from '@headlessui/vue';
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';

const mobileMenuOpen = ref(true);
const navigation = [
  { name: 'Home', href: '#' },
  { name: 'Features', href: '#' },
  { name: 'Pricing', href: '#' },
  { name: 'Contacts', href: '#' },
];

const router = useRouter();

const goToLogin = () => {
  router.push('/login');
};
</script>
