<script setup lang="ts">
import type {PropType} from "vue/dist/vue";
import type Inn from "../../../types/Inn";

const props = defineProps({
  inn: {
    type: Object as PropType<Inn>,
    required: true,
  },
})
</script>

<template>
<div class="text-2xl">{{ inn.name }}</div>
</template>

<style scoped>

</style>