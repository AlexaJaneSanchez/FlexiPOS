<template>
  <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-white p-8 rounded-lg shadow-md">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm flex justify-center p-4">
        <img class="h-10 w-auto" src="/images/Logo.png" alt="Logo" />
      </div>
      <form action="/" method="POST" class="space-y-6">
        <div>
          <label for="email" class="text-center text-xxs text-gray-500">
            Email address
          </label>
          <div class="mt-2">
            <input
              id="email"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="block w-full rounded-md border border-gray-300 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-white"
            />
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="text-center text-xxs text-gray-500">
              Password
            </label>
          </div>
          <div class="mt-1">
            <input
              id="password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
              class="block w-full rounded-md border border-gray-300 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-white"
            />
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center mt-3">
              <input
                id="remember_me"
                name="remember_me"
                type="checkbox"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
              />
              <label for="remember_me" class="ml-2 block text-xs text-gray-900">
                Remember me
              </label>
            </div>
            <div class="text-xs mt-3">
              <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                Forgot password?
              </a>
            </div>
          </div>
        </div>

        <button
          type="button"
          @click="navigateToDashboard"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-32 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Sign in
        </button>
      </form>

      <p class="mt-5 text-center text-xxs text-gray-500">
        Not a member?
        <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
          Start a 14-day free trial
        </a>
      </p>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from '#app'; 

const router = useRouter();

const navigateToDashboard = () => {
  router.push('/dashboard');
};
</script>
