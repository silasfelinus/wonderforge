<template>
    <div>
      <Frame v-for="(art, index) in arts" :key="index" class="mb-6">
        <Art :src="art.src" :title="art.title" />
      </Frame>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import Frame from './PictureFrame.vue';
  import Art from './Art.vue';

  const arts = ref([]);

  onMounted(async () => {
    try {
      const imageFolders = ['amibot'];
      for (let folderName of imageFolders) {
        const response = await fetch(`/images/${folderName}/random`)
        const imageData = await response.json()
        arts.value.push({
          src: imageData.image,
          title: folderName
        });
      }
    } catch (error) {
      console.error('Error fetching images:', error);
    }
  });
  </script>

  <style scoped>
  .mb-6 {
    margin-bottom: 1.5rem;
  }
  </style>
