<script setup lang="ts">
import type Inn from "../../../types/Inn";
import AppLayout from '@/Layouts/AppLayout.vue'
import InnItem from '@/Components/Inn/InnItem.vue'
import TextInput from '../../Components/TextInput.vue'
import type {PropType} from "vue";
import {ref, watch} from "vue";
import {router, Link} from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
import {XMarkIcon} from "@heroicons/vue/24/outline";

const props = defineProps({
  inns: {
    type: Array as PropType<Inn[]>,
    required: true,
  },
  paginate: {
    type: Object,
    required: true,
  },
  search: {
    type: String,
    required: false,
    default: '',
  },
})

const search = ref(props.search)

watch(search, (value) => {
  if (value === '' || value.length > 2) {
    searchInns()
  }
})

const searchInns = () => {
    router.reload({
      data: {
        query: search.value,
        page: 1,
      },
      only: ['inns', 'paginate'],
      preserveState: true,
    })
}

console.log(props.paginate);
</script>

<template>
  <AppLayout :title="$t('Inns')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Inns') }}
      </h2>
    </template>

    <div class="flex justify-center items-center mb-4">
      <div class="grid grid-cols-5 w-full md:w-1/2">
        <TextInput
          id="search"
          v-model="search"
          type="text"
          class="w-full col-span-4 py-1"
          autocomplete="off"
          :placeholder="$t('Search inn')"
        />
        <span class="flex justify-start items-center ml-2"
              :class="{
                'text-gray-500': search === '',
                'text-sea-pink-700 hover:text-sea-pink-900 cursor-pointer ': search.length
              }"
              @click="search = ''"><XMarkIcon class="w-5" />{{ $t('clear') }}</span>
      </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 items-start">
      <InnItem v-for="inn in inns" :key="inn.id" :inn="inn" />
    </div>

    <Pagination v-if="inns.length" :pages="paginate.links" class="mt-4" />
  </AppLayout>
</template>

<style scoped>

</style>