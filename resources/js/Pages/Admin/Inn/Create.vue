<script setup lang="ts">
import AppLayout from "../../../Layouts/AppLayout.vue";
import InnForm from "./Partials/InnForm.vue";

</script>

<template>
  <AppLayout :title="$t('Create inn')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Create inn') }}
      </h2>
    </template>

    <InnForm />
  </AppLayout>
</template>

<style scoped>

</style>