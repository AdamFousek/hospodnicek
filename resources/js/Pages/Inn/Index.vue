<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import InnItem from '@/Components/Inn/InnItem.vue'
import InputLabel from '../../Components/InputLabel.vue'
import TextInput from '../../Components/TextInput.vue'
import InputError from '../../Components/InputError.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  inns: Array,
})
</script>

<template>
  <AppLayout :title="$t('Inns')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Inns') }}
      </h2>
    </template>

    <div class="flex justify-center" v-if="false">
      <InputLabel for="search" :value="$t('Search inn')" />
      <TextInput
        id="name"
        v-model="form.search"
        type="text"
        class="mt-1 block w-full"
        required
        autocomplete="name"
      />
      <InputError :message="form.errors.name" class="mt-2" />
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
      <InnItem v-for="inn in inns" :key="inn.id" :inn="inn" />
    </div>
  </AppLayout>
</template>

<style scoped>

</style>