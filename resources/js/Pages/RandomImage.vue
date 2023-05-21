<template>
    <div class="flex flex-col items-center">
      <select v-model="selectedFolder" class="mb-5 bg-white rounded-lg p-2 shadow">
        <option v-for="folder in folders" :key="folder" :value="folder">
          {{ folder }}
        </option>
      </select>

      <div v-if="loading" class="my-5">
        <LavaLamp />>
        Loading...
      </div>

      <div v-else-if="error" class="my-5 text-red-500">
        {{ error }}
      </div>

      <div v-else>
        <img :src="imageUrl" alt="Random Image" class="w-full h-auto"/>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, onMounted, watch } from 'vue';
  import axios from 'axios';
  import LavaLamp from './Animations/LavaLamp.vue';

  const selectedFolder = ref('default');
  const folders = ref([]);
  const imageUrl = ref("");
  const loading = ref(false);
  const error = ref(null);

  onMounted(async () => {
    loading.value = true;
    try {
      const response = await axios.get(`/images/folders`);
      folders.value = response.data;
    } catch (err) {
      error.value = "Failed to fetch folders";
    } finally {
      loading.value = false;
    }
  });

  watch(selectedFolder, async (newFolder) => {
    loading.value = true;
    try {
      const response = await axios.get(`/images/${newFolder}/random`);
      imageUrl.value = response.data.image;
      error.value = null;
    } catch (err) {
      error.value = "Failed to fetch image";
    } finally {
      loading.value = false;
    }
  }, { immediate: true });

  </script>

  <style scoped>
  /* Add any additional styles here */
  </style>
