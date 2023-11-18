<script setup lang="ts">
import AppLayout from "../../../Layouts/AppLayout.vue";
import type {PropType} from "vue";
import type Inn from "../../../../types/Inn";
import { Link } from '@inertiajs/vue3';

defineProps({
  inns: {
    type: Array as PropType<Inn[]>,
    required: true,
  },
  paginate: {
    type: Object,
    required: true,
  },
})

</script>

<template>
  <AppLayout :title="$t('Inns administration')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Inns administration') }}
      </h2>
    </template>


    <div class="relative bg-white dark:bg-gray-900 overflow-x-auto shadow-md sm:rounded-lg">
      <div class="flex justify-between items-center p-4">
        <label for="table-search" class="sr-only">{{ $t('Search') }}</label>
        <div class="relative mt-1">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input
            type="text"
            id="table-search"
            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-gray-50 focus:ring-sea-pink-500 focus:border-sea-pink-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sea-pink-500 dark:focus:border-sea-pink-500"
            :placeholder="$t('Search')">
        </div>
        <div>
          <Link :href="route('admin.inns.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-sea-pink-600 hover:bg-sea-pink-500 focus:outline-none focus:border-sea-pink-700 focus:shadow-outline-indigo active:bg-sea-pink-700 transition ease-in-out duration-150">
            {{ $t('Add inn') }}
          </Link>
        </div>
      </div>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            {{ $t('Inn name') }}
          </th>
          <th scope="col" class="px-6 py-3">
            {{ $t('Inn address') }}
          </th>
          <th scope="col" class="px-6 py-3">
            {{ $t('Identification number') }}
          </th>
          <th scope="col" class="px-6 py-3">
            {{ $t('Actions') }}
          </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(inn, index) in inns" :key="inn.id"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ inn.name }}
          </th>
          <td class="px-6 py-4">
            {{ inn.address?.street }}, {{ inn.address?.city }}, {{ inn.address?.post_code }}
          </td>
          <td class="px-6 py-4">
            {{ inn.identification_number }}
          </td>
          <td class="px-6 py-4">
            <Link :href="route('admin.inns.edit', { inn })" class="font-medium text-sea-pink-600 dark:text-sea-pink-500 hover:underline">Edit</Link>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

  </AppLayout>
</template>

<style scoped>

</style>