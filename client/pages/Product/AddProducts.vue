<template>
    <NuxtLayout name="admin">
      <Head>
        <Title>Add Products</Title>
      </Head>
      <form @submit.prevent="saveProduct">
        <div class="space-y-12 m-10">
          <div class="pb-12">
            <h2 class="block text-base font-semibold leading-7 text-gray-900">Product Information</h2>
            
            <div class="mt-10 grid grid-rows-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">
                <div>
                    <FormLabel for="productcategory" class="block text-sm font-medium leading-6 text-gray-900">Product Category</FormLabel>
                    <div class="mt-2">
                        <FormSelectMultiple v-model="product.productcategory" id="productcategory"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="" disabled>Select a category</option>
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                        <option value="category3">Category 3</option>
                        <!-- Add more categories as needed -->
                        </FormSelectMultiple>
                    </div>


                    <FormLabel for="productName" class="block text-sm font-medium leading-6 text-gray-900">Product Name</FormLabel>
                    <div class="mt-2">
                        <input v-model="product.productname" type="text" name="productname" id="productname" 
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>

                
                    <FormLabel for="brandname" class="block text-sm font-medium leading-6 text-gray-900">Brand Name</FormLabel>
                    <div class="mt-2">
                    <input v-model="product.brandname" type="text" name="brandname" id="brandname"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>

                    <FormLabel for="wholesale" class="block text-sm font-medium leading-6 text-gray-900">Whole Sale</FormLabel>
                    <div class="mt-2">
                        <input v-model="product.wholesale" type="text" name="wholesale" id="wholesale"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>

                    <FormLabel for="retailunit" class="block text-sm font-medium leading-6 text-gray-900">Retail Unit</FormLabel>
                    <div class="mt-2">
                    <input v-model.number="product.retailunit" type="number" name="retailunit" id="retailunit"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        min="0" step="0.01" />
                    </div>

                    <FormLabel for="retailquantity" class="block text-sm font-medium leading-6 text-gray-900">Retail Quantity</FormLabel>
                    <div class="mt-2">
                    <input v-model.number="product.retailquantity" type="number" name="retailquantity" id="retailquantity"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        min="0" step="0.01" />
                    </div>

                    <FormLabel for="reorderpoint" class="block text-sm font-medium leading-6 text-gray-900">Reorder</FormLabel>
                    <div class="mt-2">
                    <input v-model.number="product.reorderpoint" type="number" name="reorderpoint" id="reorderpoint"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        min="0" step="0.01" />
                    </div>

                    <FormLabel for="markup" class="block text-sm font-medium leading-6 text-gray-900">Markup</FormLabel>
                    <div class="mt-2">
                    <input v-model.number="product.markup" type="number" name="markup" id="markup"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        min="0" step="0.01" />
                    </div>

                    <FormLabel for="quantityonhand" class="block text-sm font-medium leading-6 text-gray-900">Quantity Onhand</FormLabel>
                    <div class="mt-2">
                    <input v-model.number="product.quantityonhand" type="number" name="quantityonhand" id="quantityonhand"
                        class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        min="0" step="0.01" />
                    </div>
                </div>
            </div>       
          </div>
        </div>
        
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
    </NuxtLayout>
      
    </template>
  
  <script>
  
  import { productService } from '~/components/api/admin/ProductService';
  
  export default{
    name:"createProduct",
    data(){
      return {
        supplier:{
          productcategory: '',
          productname: '',
          brandname: '',
          wholesale: '',
          retailunit: '',
          retailquantity: '',
          reorderpoint: '',
          markup: '',
          quantityonhand: '',
        }
      }
    },
    methods:{
      async saveProduct() {
    try {
      const products = {
        productcategory: this.product.productcategory,
        productname: this.product.productname,
        brandname: this.product.brandname,
        wholesale: this.product.wholesale,
        retailunit: this.product.retailunit,
        retailquantity: this.product.retailquantity,
        reorderpoint: this.product.reorderpoint,
        markup: this.product.markup,
        quantityonhand: this.product.quantityonhand,
      }
  
      const response = await productService.createProduct(products);
  
      if (response && response.data) {
        console.log('Product created successfully:', response.data);
        alert('Product has been added!');
        navigateTo('/admin/Product');
      } else {
        console.error('Error creating product:', response);
        alert('Product creation failed!');
      }
    } catch (error) {
      console.error('Error saving product:', error.message);
      alert('Error saving product!');
    }
  }
    }
  }
  </script>