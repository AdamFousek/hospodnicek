<script setup lang="ts">
import AppLayout from "../Layouts/AppLayout.vue";

</script>

<template>
  <AppLayout :title="$t('Hospodniček - your guide through inns')">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-2xl text-center">Hospodniček</h1>
        </div>
        <div class="col-12">
          <p class="text-gray-700 text-center">
            {{ $t('Your guide through inns') }}
          </p>
        </div>
      </div>
    </div>

    <div class="bg-white">

    </div>
  </AppLayout>
</template>

<style scoped>

</style>