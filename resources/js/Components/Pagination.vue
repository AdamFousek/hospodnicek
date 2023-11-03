<script setup lang="ts">
import {Link} from "@inertiajs/vue3";

defineProps({
  pages: {
    type: Array,
    required: true,
  }
})

</script>

<template>
  <nav class="flex justify-center items-center" aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
      <li v-for="(link, index ) in pages" :key="link.label">
        <Link v-if="link.active" href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-sea-pink-800 border border-gray-300 bg-sea-pink-100 hover:bg-sea-pink-100 hover:text-sea-pink-700" v-html="$t(link.label)" />
        <Link v-else-if="link.url" :href="link.url"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-sea-pink-100 hover:text-sea-pink-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              :class="{
                'rounded-l-md': index === 0,
                'rounded-r-md': index === pages.length-1,
              }"
        >
          {{ $t(link.label) }}
        </Link>
        <span v-else class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-gray-300" v-html="$t(link.label)" />
      </li>
    </ul>
  </nav>
</template>

<style scoped>

</style>