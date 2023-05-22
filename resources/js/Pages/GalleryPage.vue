<template>
    <div>
      <Frame v-for="(art, index) in arts" :key="index">
        <Art :src="art.src" :title="art.title" />
      </Frame>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import Frame from './PictureFrame.vue';
  import Art from './Art.vue';
  import RandomImage from './RandomImage.vue';

  const arts = ref([
    { src: '/images/floof/random', title: 'floof' },
    { src: '/images/acrocats/random', title: 'acrocats' },
    { src: '/images/redbubble/random', title: 'redbubble' },
    { src: '/images/amibot/random', title: 'amibot' },
    { src: '/images/wondershed/random', title: 'wondershed' },
  ]);
  </script>
