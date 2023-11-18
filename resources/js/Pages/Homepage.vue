<script setup lang="ts">
import AppLayout from "../Layouts/AppLayout.vue";
import type {PropType} from "vue/dist/vue";
import type Inn from "../../types/Inn";
import SortEnum from "../Enums/SortEnum";
import { NCarousel, NIcon } from 'naive-ui'
import InnItem from "../Components/Inn/InnItem.vue";
import { ArrowBackIosFilled, ArrowForwardIosFilled } from '@vicons/material'
import { useDevice } from "../Composables/useDevice";
import {computed} from "vue";

const props = defineProps({
  inns: {
    type: Array as PropType<Inn[]>,
    required: true,
  },
  sort: {
    type: Number,
    default: SortEnum.DEFAULT,
  },
});

const device = useDevice();
console.log(device)
const itemsInView = computed(() => {
  if (device.isMobile.value) {
    return 1.25
  }

  if (device.isTablet.value) {
    return 2.25
  }

  return 3.5
})
</script>

<template>
  <AppLayout :title="$t('Hospodniček - your guide through inns')">
    <div class="pb-12">
      <div class="flex justify-center">
        <h1 class="text-2xl text-center">Hospodniček</h1>
      </div>
      <div class="flex justify-center">
        <p class="text-gray-700 text-center">
          {{ $t('Your guide through inns') }}
        </p>
      </div>
    </div>

    <div class="bg-white rounded-2xl p-4 mb-4">
        <div class="flex justify-center">
          <h2 class="text-2xl text-center">{{ $t('Inns') }}</h2>
        </div>
        <div class="flex justify-center">
          <p v-if="sort === SortEnum.DEFAULT" class="text-gray-700 text-center">
            {{ $t('List of random inns') }}
          </p>
          <p v-if="sort === SortEnum.DISTANCE" class="text-gray-700 text-center">
            {{ $t('List of the closest inns') }}
          </p>
          <p v-if="sort === SortEnum.RATING" class="text-gray-700 text-center">
            {{ $t('List of the best inns') }}
          </p>
        </div>
    </div>
    <n-carousel
      :slides-per-view="itemsInView"
      :space-between="20"
      :loop="true"
      draggable
      show-arrow
    >
      <template v-for="inn in inns" :key="inn.id">
        <InnItem :inn="inn" />
      </template>

      <template #arrow="{ prev, next }">
        <div class="inline-flex">
          <button type="button" class="custom-arrow--left" @click="prev">
            <n-icon><ArrowBackIosFilled /></n-icon>
          </button>
          <button type="button" class="custom-arrow--right" @click="next">
            <n-icon><ArrowForwardIosFilled /></n-icon>
          </button>
        </div>
      </template>
    </n-carousel>
  </AppLayout>
</template>

<style scoped>

</style>