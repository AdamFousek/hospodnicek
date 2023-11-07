<script setup lang="ts">
import type {PropType} from "vue/dist/vue";
import type Inn from "../../../../types/Inn";

defineProps({
  inn: Object as PropType<Inn>,
  index: Number,
})
</script>

<template>
  <div class="bg-gray-50" :class="{'bg-white': index % 2}">
    {{ inn.name }}
  </div>
  <div class="bg-gray-50" :class="{'bg-white': index % 2}">
    {{ inn.address?.street }}, {{ inn.address?.city }}, {{ inn.address?.post_code }}
  </div>
  <div class="bg-gray-50" :class="{'bg-white': index % 2}">
    {{ inn.identification_number }}
  </div>
  <div class="bg-gray-50" :class="{'bg-white': index % 2}">
    {{ inn.name }}
  </div>
</template>

<style scoped>

</style>