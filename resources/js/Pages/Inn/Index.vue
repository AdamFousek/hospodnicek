<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import InnItem from '@/Components/Inn/InnItem.vue'

const props = defineProps({
  inns: Array,
})

console.log(props.inns);
</script>

<template>
  <AppLayout :title="$t('Inns')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Inns') }}
      </h2>
    </template>

    <div class="grid grid-cols-3 gap-4">
      <InnItem v-for="inn in inns" :key="inn.id" :inn="inn" />
    </div>
  </AppLayout>
</template>

<style scoped>

</style>