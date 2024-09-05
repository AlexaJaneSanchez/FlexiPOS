<template>
    <NuxtLayout name="admin">
        <!-- Search Bar -->
     <div class="relative flex flex-1 mt-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 3a6 6 0 11-6 6 6 6 0 016-6zM2 9a7 7 0 1114 0A7 7 0 012 9zm11.293 4.293a1 1 0 00-1.415-1.414L10 12.586l-1.879-1.878a1 1 0 00-1.415 1.414L8.586 14l-1.879 1.879a1 1 0 001.415 1.415L10 15.414l1.879 1.879a1 1 0 001.415-1.415L11.414 14l1.879-1.879a1 1 0 000-1.415z" clip-rule="evenodd"/>
                        </svg>
                        <input type="text" placeholder="Search" class="block w-70 rounded-md border border-gray-400 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-xs pl-8 pr-2 py-1.5"/>
                    </div>

                    <div class="mt-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-900 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider rounded-tl-md">Id</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">Invoice No.</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">Invoice Date</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium rounded-tr-md">--</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 shadow-sm divide-y divide-gray-200">
            <!-- Example Row  -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">P001</td>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">10</td>
                <td class="pl-6 pr-2 py-4 whitespace-nowrap text-xxs text-gray-900">25.00</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    </div>
   <!--
    <div class="container mx-auto p-4">
      <!-- Supplier Selection 
      <div class="flex items-center justify-center space-x-2 mb-4">
        <!-- Supplier Label 
        <div class="text-center text-xxs font-medium text-gray-700">Supplier:</div>
        
        <!-- Selection Dropdown 
        <select class="text-xxs rounded-md border border-gray-400 px-12 py-2 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300">
        </select>
        
      </div>
      
      <!-- Table 
      <div class="mt-10">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-900 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider rounded-tl-md">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">ProductID</th>
                <th scope="col" class="px-6 py-3 text-left text-xxs font-medium tracking-wider">Quantity</th>
                <th scope="col" class="px-3 py-3 text-left text-xxs font-medium rounded-tr-md">Unit Price</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 shadow-sm divide-y divide-gray-200">
            <!-- Example Row 
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">P001</td>
                <td class="px-6 py-4 whitespace-nowrap text-xxs text-gray-900">10</td>
                <td class="pl-6 pr-2 py-4 whitespace-nowrap text-xxs text-gray-900">25.00</td>
            </tr>
            <!-- Add more rows as needed 
        </tbody>
    </table>
</div>

    </div> -->
    </NuxtLayout>
</template>
