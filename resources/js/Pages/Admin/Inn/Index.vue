<script setup lang="ts">
import AppLayout from "../../../Layouts/AppLayout.vue";
import type {PropType} from "vue";
import type Inn from "../../../../types/Inn";
import InnRow from "./InnRow.vue";

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

    <div class="flex justify-center items-center mb-4 bg-white p-4 rounded-xl">
      <div class="grid grid-cols-4 w-full">
        <div class="font-bold">{{ $t('Inn name') }}</div>
        <div class="font-bold">{{ $t('Inn address') }}</div>
        <div class="font-bold">{{ $t('Identification number') }}</div>
        <div class="font-bold text-right">{{ $t('Actions') }}</div>
        <InnRow v-for="(inn, index) in inns" :key="inn.id" :inn="inn" :index="index" />
      </div>
    </div>

  </AppLayout>
</template>

<style scoped>

</style>