<script setup lang="ts">
import type Inn from "../../../types/Inn";
import type {PropType} from "vue";
import {computed, ref} from "vue";
import {Link} from '@inertiajs/vue3';
import {MapIcon} from "@heroicons/vue/24/outline";
import type OpeningHour from "../../../types/Inn/OpeningHour";

const props = defineProps({
  inn: {
    type: Object as PropType<Inn>,
    required: true,
  },
})

const focus = ref(false);

const mapUrl = computed(() => {
  const latitude = props.inn.address?.latitude
  const longitude = props.inn.address?.longitude

  if (!latitude || !longitude) {
    return ''
  }

  return 'https://mapy.cz/zakladni?source=coor&id='+latitude+'%2C'+longitude+'&x='+latitude+'&y='+longitude+'&z=17'
})


const todayHours: OpeningHour|null = props.inn.today_hours ? props.inn.today_hours[0] : null
</script>

<template>
  <div class="bg-white shadow-xl rounded-xl overflow-hidden pb-4" @mouseenter="focus = true" @mouseleave="focus = false">
    <div class="overflow-hidden">
      <img :src="inn.photo_url !== '' ? inn.photo_url : '/images/inn/default_cover.png'" :alt="inn.name" loading="lazy"
           class="w-full duration-150" :class="{'scale-110': focus}">
    </div>
    <div class="text-xl text-center py-2">
      <Link class="text-sea-pink-900 hover:text-sea-pink-500 underline" :href="route('inns.show', { inn: inn.id })" :id="'inn_link-' + inn.id">{{ inn.name }}</Link>
    </div>
    <div v-if="todayHours" class="flex justify-between px-4 my-2 text-gray-700 text-sm">
      <div class="">{{ $t('day of week ' + todayHours.day_of_week) }}</div>
      <div class="">{{ todayHours.open_from }} - {{ todayHours.open_to }}</div>
    </div>
    <div v-if="mapUrl !== ''" class="flex justify-between px-4 my-2 text-gray-700 text-sm">
      <div class="">{{ $t('Address') }}</div>
      <a class="flex justify-between text-sea-pink-900 hover:text-sea-pink-500" :href="mapUrl" target="_blank">
        <MapIcon class="w-5" />
        {{ inn.address?.street }}, {{ inn.address?.city }}
      </a>
    </div>
    <div class="px-4">
      {{ inn.description }}
    </div>
  </div>
</template>

<style scoped>

</style>