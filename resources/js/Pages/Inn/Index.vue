<script setup lang="ts">
import type Inn from "../../../types/Inn";
import AppLayout from '@/Layouts/AppLayout.vue'
import InnItem from '@/Components/Inn/InnItem.vue'
import TextInput from '../../Components/TextInput.vue'
import type {PropType} from "vue";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
  inns: {
    type: Array as PropType<Inn[]>,
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
        search: search.value,
      },
      only: ['inns'],
      preserveState: true,
    })
}

</script>

<template>
  <AppLayout :title="$t('Inns')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Inns') }}
      </h2>
    </template>

    <div class="flex justify-center items-center mb-4">
      <TextInput
        id="search"
        v-model="search"
        type="text"
        class="mt-1 block py-1"
        autocomplete="off"
        :placeholder="$t('Search inn')"
      />
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 items-start">
      <InnItem v-for="inn in inns" :key="inn.id" :inn="inn" />
    </div>
  </AppLayout>
</template>

<style scoped>

</style>