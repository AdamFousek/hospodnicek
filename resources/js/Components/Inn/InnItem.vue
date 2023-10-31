<script setup lang="ts">
import type Inn from "../../../types/Inn";
import type {PropType} from "vue";

defineProps({
  inn: Object as PropType<Inn>,
})
</script>

<template>
  <a class="bg-gray-100 rounded-xl overflow-hidden" href="#">
    <div class="overflow-hidden">
      <img :src="inn.photo_url" :alt="inn.name" loading="lazy" class="w-full hover:scale-110 duration-150">
    </div>
    <div class="text-lg text-center">{{ inn.name }}</div>
  </a>
</template>

<style scoped>

</style>