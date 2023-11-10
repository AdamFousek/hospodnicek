<script setup lang="ts">

import {useForm} from "@inertiajs/vue3";
import type {PropType} from "vue/dist/vue";
import type Inn from "../../../../../types/Inn";
import {ref} from "vue";
import FormSection from "../../../../Components/FormSection.vue";
import InputLabel from "../../../../Components/InputLabel.vue";
import TextInput from "../../../../Components/TextInput.vue";
import InputError from "../../../../Components/InputError.vue";
import SecondaryButton from "../../../../Components/SecondaryButton.vue";

const props = defineProps({
  inn: {
    type: Object as PropType<Inn>,
    default: null,
    required: false,
  },
})

const form = useForm({
  name: props.inn?.name || '',
  description: props.inn?.description || '',
  identification_number: props.inn?.identification_number || '',
  photo_url: props.inn?.photo_url || '',
  establishment: props.inn?.establishment || '',
});

const innSet = props.inn || false;

const photoPreview = ref(null);
const photoInput = ref(null);

const sendForm = () => {
  if (photoInput.value) {
    form.photo_url = photoInput.value.files[0]
  }

  const requestRoute = innSet ? route('admin.inns.update', props.inn.id) : route('admin.inns.store')

  form.post(requestRoute, {
    preserveScroll: true,
    onSuccess: () => clearPhotoFileInput(),
  })
}

const clearPhotoFileInput = () => {
  if (photoInput.value?.value) {
    photoInput.value.value = null;
  }
}

const updatePhotoPreview = () => {
  const photo = photoInput.value.files[0];

  if (! photo) return;

  const reader = new FileReader();

  reader.onload = (e) => {
    photoPreview.value = e.target.result;
  };

  reader.readAsDataURL(photo);
}

const selectNewPhoto = () => {
  photoInput.value.click();
};
</script>

<template>
  <FormSection @submitted="sendForm">
    <template #title>
      {{ $t('Inn information') }}
    </template>

    <template #description>
      {{ $t('Provide inn information like name, description or establishment date') }}
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="name" :value="$t('Inn name')" />
        <TextInput
          id="name"
          v-model="form.name"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="off"
        />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="identificationNumber" :value="$t('Inn identification number')" />
        <TextInput
          id="identificationNumber"
          v-model="form.identification_number"
          type="text"
          class="mt-1 block w-full"
          required
        />
        <InputError :message="form.errors.identification_number" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="establishment" :value="$t('Inn establishment')" />
        <TextInput
          id="establishment"
          v-model="form.establishment"
          type="date"
          class="mt-1 block w-full"
        />
        <InputError :message="form.errors.establishment" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="description" :value="$t('Inn description')" />
        <textarea
          id="description"
          v-model="form.description"
          type="text"
          rows="4"
          class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-sea-pink-500 focus:border-sea-pink-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sea-pink-500 dark:focus:border-sea-pink-500"
          :placeholder="$t('Inn short description here...')"
        />

        <InputError :message="form.errors.description" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input
          ref="photoInput"
          type="file"
          class="hidden"
          @change="updatePhotoPreview"
        >

        <InputLabel for="photo" :value="$t('Inn photo')" />

        <!-- Current Profile Photo -->
        <div v-show="!photoPreview && inn" class="mt-2">
          <img :src="inn?.photo_url" :alt="inn?.name" class="">
        </div>

        <!-- New Profile Photo Preview -->
        <div v-show="photoPreview" class="mt-2">
          <img
            :src="photoPreview || form.photo_url"
            class="block max-w-auto max-h-72"
          />
        </div>

        <SecondaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
          {{ $t('Select A New Photo') }}
        </SecondaryButton>

        <InputError :message="form.errors.photo_url" class="mt-2" />
      </div>
    </template>
  </FormSection>
</template>

<style scoped>

</style>