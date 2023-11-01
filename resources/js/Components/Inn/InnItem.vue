<script setup lang="ts">
import type Inn from "../../../types/Inn";
import type {PropType} from "vue";
import {ref} from "vue";

const props = defineProps({
  inn: {
    type: Object as PropType<Inn>,
    required: true,
  }
})

const focus = ref(false);
</script>

<template>
  <a class="bg-white shadow-xl rounded-xl overflow-hidden" @mouseenter="focus = true" @mouseleave="focus = false"
     :href="route('inns.show', { inn: inn.id })">
    <div class="overflow-hidden">
      <img :src="inn.photo_url !== '' ? inn.photo_url : '/images/inn/default_cover.png'" :alt="inn.name" loading="lazy"
           class="w-full duration-150" :class="{'scale-110': focus}">
    </div>
    <div class="text-xl text-center py-2">{{ inn.name }}</div>
  </a>
</template>

<style scoped>

</style>