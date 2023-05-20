<template>
    <div>
      <label for="folder-select">Choose a gallery:</label>
      <select id="folder-select" v-model="selectedFolder">
        <option disabled value="">Please select a folder</option>
        <option v-for="folder in folders" :key="folder" :value="folder">
          {{ folder }}
        </option>
      </select>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  const folders = ref([]);
  const selectedFolder = ref('');

  const fetchFolders = async () => {
    try {
      const response = await axios.get('/images/folders');
      folders.value = response.data;
    } catch (err) {
      console.error("Error while fetching folders:", err);
    }
  };

  onMounted(fetchFolders);

  const emit = defineEmits(['update:foldername']);

  watch(selectedFolder, (newFolder) => {
    emit('update:foldername', newFolder);
  });
  </script>
